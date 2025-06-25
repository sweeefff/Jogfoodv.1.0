<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Config;
use App\Models\Transaksi;
use App\Models\Keranjang;
use Carbon\Carbon;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use App\Services\StrukService;
use App\Models\Pembayaran;
use App\Models\StatusPengiriman;
use Illuminate\Support\Facades\Log;

class MetodeController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function bayar(Request $request)
    {
        try {
            $request->validate([
                'selected_items' => 'required|string',
                'total_harga' => 'required|numeric'
            ]);

            $selectedItems = json_decode($request->selected_items, true);

            if (empty($selectedItems)) {
                return redirect()->back()->with('error', 'Tidak ada item yang dipilih');
            }

            $items = collect();
            foreach ($selectedItems as $selectedItem) {
                $keranjangItem = Keranjang::with('menu')->find($selectedItem['id']);

                if ($keranjangItem) {
                    $keranjangItem->jumlah = $selectedItem['quantity'];
                    $items->push($keranjangItem);
                }
            }

            if ($items->isEmpty()) {
                return redirect()->back()->with('error', 'Item tidak ditemukan');
            }

            $calculatedTotal = $items->sum(function ($item) {
                return $item->menu->harga * $item->jumlah;
            });

            // Tidak perlu validasi total_harga dari request, cukup simpan subtotal
            $subtotal = $calculatedTotal;
            $deliveryFee = 10000;
            $tax = 0.1;
            // Total final akan dihitung di halaman metode

            session([
                'checkout_items' => $items,
                'checkout_total' => $subtotal,
            ]);

            return view('pages.user.metode', [

                'items' => $items,
                'total' => $subtotal,
                'deliveryFee' => $deliveryFee,
                'tax' => $tax,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function process(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'payment_method' => 'required|string',
            'pajak' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'biaya_pengiriman' => 'required|numeric',
        ]);

        $orderId = 'ORD-' . Str::uuid();
        session(['order_id' => $orderId]);

        $checkoutItems = session('checkout_items', collect());

        if ($checkoutItems->isEmpty()) {
            return Response::json([
                'error' => 'Session checkout kosong. Silakan ulangi proses pembayaran.'
            ], 422);
        }

        // Hitung total harga di backend agar selalu konsisten
        $subtotal = (int) round($request->subtotal);
        $pajak = (int) round($request->pajak);
        $biayaPengiriman = (int) round($request->biaya_pengiriman);
        $total = $subtotal + $pajak + $biayaPengiriman;

        $paymentMethod = $request->payment_method;

        try {
            DB::beginTransaction();

            $transaksi = Transaksi::create([
                'id_transaksi' => $orderId,
                'id_user' => session('user_id', Auth::id()),
                'total_harga' => $total,
                'status_transaksi' => 'pending',
            ]);

            foreach ($checkoutItems as $item) {
                $checkoutItems = $checkoutItems->filter(fn($item) => $item->menu);
                if (!$item->menu)
                    continue;

                $transaksi->detail_transaksi()->create([
                    'id_menu' => $item->menu->id_menu,
                    'jumlah' => $item->jumlah,
                    'subtotal' => $item->menu->harga * $item->jumlah
                ]);
            }

            Pembayaran::create([
                'id_transaksi' => $orderId,
                'metode_pembayaran' => $paymentMethod,
            ]);

            StatusPengiriman::create([
                'id_user' => session('user_id', Auth::id()),
                'id_transaksi' => $orderId,
                'status_pembayaran' => $paymentMethod === 'cod' ? 'belum dibayar' : 'dibayar',
                'status_pengiriman' => 'menunggu',
                'tanggal_pengiriman' => null,
                'tanggal_transaksi' => now(),
                'tanggal_update' => now(),
            ]);

            DB::commit();

            if ($paymentMethod === 'cod') {
                $menuIds = $checkoutItems->pluck('menu.id_menu')->filter()->all();
                Keranjang::where('id_user', session('user_id', Auth::id()))
                    ->whereIn('id_menu', $menuIds)
                    ->delete();
                session()->forget('checkout_items');

                session(['last_order_id' => $orderId]);
                return Response::json([
                    'redirect' => route('metode.success')
                ]);
            }

        } catch (\Exception $e) {
            DB::rollBack();
            return Response::json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }

        // Persiapan untuk pembayaran Midtrans
        $itemDetails = [];
        foreach ($checkoutItems as $item) {
            $itemDetails[] = [
                'id' => (string) $item->menu->id_menu,
                'price' => (int) round($item->menu->harga),
                'quantity' => (int) $item->jumlah,
                'name' => (string) $item->menu->nama,
            ];
        }

        // Tambahkan biaya pengiriman dan pajak sebagai item terpisah
        if ($biayaPengiriman > 0) {
            $itemDetails[] = [
                'id' => 'DELIVERY',
                'price' => $biayaPengiriman,
                'quantity' => 1,
                'name' => 'Biaya Pengiriman',
            ];
        }

        if ($pajak > 0) {
            $itemDetails[] = [
                'id' => 'TAX',
                'price' => $pajak,
                'quantity' => 1,
                'name' => 'Pajak',
            ];
        }

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $total,
            ],
            'item_details' => $itemDetails,
            'customer_details' => [
                'email' => session('email'),
                'name' => session('name'),
                'phone' => session('no_hp'),
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);

            $transaksi->snap_token = $snapToken;
            $transaksi->save();

            return Response::json([
                'snap_token' => $snapToken,
                'order_id' => $orderId
            ]);

        } catch (\Exception $e) {
            Log::error('Midtrans Error: ' . $e->getMessage(), [
                'params' => $params,
                'trace' => $e->getTraceAsString()
            ]);

            return Response::json([
                'error' => 'Gagal memproses pembayaran: ' . $e->getMessage()
            ], 500);
        }
    }


    public function callback(Request $request)
    {
        try {
            $notif = new \Midtrans\Notification();

            $transactionStatus = $notif->transaction_status;
            $paymentType = $notif->payment_type;
            $fraudStatus = $notif->fraud_status;

            $orderId = $notif->order_id;
            $transaksi = Transaksi::where('id_transaksi', $orderId)->first();

            if (!$transaksi) {
                Log::error('Transaksi tidak ditemukan', ['order_id' => $orderId]);
                return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
            }

            // Update status berdasarkan status Midtrans
            if ($transactionStatus == 'capture') {
                if ($paymentType == 'credit_card') {
                    if ($fraudStatus == 'challenge') {
                        $transaksi->status_transaksi = 'challenge';
                    } else {
                        $transaksi->status_transaksi = 'lunas';
                    }
                }
            } elseif ($transactionStatus == 'settlement' || ($transactionStatus == 'capture' && $fraudStatus != 'challenge')) {
                $transaksi->status_transaksi = 'lunas';

                // Hapus item dari keranjang
                $detailTransaksis = $transaksi->detail_transaksi;
                $menuIds = $detailTransaksis->pluck('id_menu');

                Keranjang::where('id_user', $transaksi->id_user)
                    ->whereIn('id_menu', $menuIds)
                    ->delete();

                // Update status pengiriman
                $statusPengiriman = StatusPengiriman::where('id_transaksi', $orderId)->first();
                if ($statusPengiriman) {
                    $statusPengiriman->status_pembayaran = 'dibayar';
                    $statusPengiriman->save();
                }
            } elseif ($transactionStatus == 'pending') {
                $transaksi->status_transaksi = 'pending';
            } elseif ($transactionStatus == 'deny') {
                $transaksi->status_transaksi = 'gagal';
            } elseif ($transactionStatus == 'expire') {
                $transaksi->status_transaksi = 'kadaluwarsa';
            } elseif ($transactionStatus == 'cancel') {
                $transaksi->status_transaksi = 'dibatalkan';
            }

            $transaksi->save();

            return response()->json(['message' => 'Notification handled'], 200);

        } catch (\Exception $e) {
            Log::error('Midtrans Callback Error', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function success(Request $request, StrukService $strukService)
    {
        $orderId = $request->input('order_id');
        $transaksi = Transaksi::where('id_transaksi', $orderId)->first();

        if (!$transaksi) {
            return redirect()->route('keranjang.index')->with('error', 'Transaksi belum berhasil.');
        }

        // Update status menjadi lunas jika belum lunas
        if ($transaksi->status_transaksi !== 'lunas' && ($transaksi->pembayaran->metode_pembayaran ?? '') !== 'cod') {
            $transaksi->status_transaksi = 'lunas';
            $transaksi->save();
        }

        // Generate dan kirim struk otomatis
        $struk = $strukService->generateStruk($transaksi->id_transaksi);
        $strukService->sendStrukEmail($struk);

        // Redirect ke halaman struk user (bisa download PDF)
        return redirect()->route('struk.show', ['id_struk' => $struk->id_struk])
            ->with('success', 'Transaksi berhasil! Struk telah dikirim ke email Anda.');
    }

    public function batal($id)
    {
        $transaksi = Transaksi::where('id_transaksi', $id)
            ->where('id_user', session('user_id', Auth::id()))
            ->where('status_transaksi', 'pending')
            ->first();

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan atau tidak bisa dibatalkan.');
        }

        $transaksi->status_transaksi = 'dibatalkan';
        $transaksi->updated_at = now();
        $statusPengiriman = StatusPengiriman::where('id_transaksi', $id)->first();
        if ($statusPengiriman) {
            $statusPengiriman->status_pengiriman = 'dibatalkan';
            $statusPengiriman->save();
        }
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil dibatalkan.');
    }
}

