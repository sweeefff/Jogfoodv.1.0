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
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class MetodeController extends Controller
{
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

            $deliveryFee = 10000;
            $calculatedTotal += $deliveryFee;

            if (abs($calculatedTotal - $request->total_harga) > 1) {
                return redirect()->back()->with('error', 'Total harga tidak sesuai');
            }

            session([
                'checkout_items' => $items,
                'checkout_total' => $request->total_harga,
                'delivery_fee' => $deliveryFee
            ]);

            return view('pages.user.metode', [
                'items' => $items,
                'total' => $request->total_harga,
                'deliveryFee' => $deliveryFee
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function process(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        $orderId = 'ORD-' . Str::uuid();
        session(['order_id' => $orderId]);

        $checkoutItems = session('checkout_items', collect());

        if ($checkoutItems->isEmpty()) {
            return Response::json([
                'error' => 'Session checkout kosong. Silakan ulangi proses pembayaran.'
            ], 422);
        }

        $total = $request->amount;
        try {
            DB::beginTransaction();

            // Buat transaksi baru
            $transaksi = Transaksi::create([
                'id_transaksi' => $orderId,
                'id_user' => session('user_id', Auth::id()),
                'total_harga' => $total,
                'status_transaksi' => 'pending',

            ]);

            \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
            \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

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

            DB::commit();
            // Hapus keranjang setelah checkout
            $menuIds = $checkoutItems->pluck('menu.id_menu')->filter()->all(); // Ambil hanya id_menu valid

            Keranjang::where('id_user', session('user_id', Auth::id()))
                ->whereIn('id_menu', $menuIds)
                ->delete();
            session()->forget('checkout_items');


        } catch (\Exception $e) {
            DB::rollBack();
            return Response::json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }

        $itemDetails = [];

        foreach ($checkoutItems as $item) {
            $itemDetails[] = [
                'id' => $item->menu->id_menu,
                'price' => $item->menu->harga,
                'quantity' => $item->jumlah,
                'name' => $item->menu->nama,
            ];
        }

        if (session('delivery_fee', 0) > 0) {
            $itemDetails[] = [
                'id' => 'delivery',
                'price' => session('delivery_fee'),
                'quantity' => 1,
                'name' => 'Biaya Pengiriman'
            ];
        }

        $params = array(
            'transaction_details' => array(
                'order_id' => $orderId,
                'gross_amount' => (int) $total,
            ),
            'item_details' => $itemDetails,
            'customer_details' => array(
                'email' => session('email') ?? auth()->user()->email,
                'name' => session('username') ?? auth()->user()->name,
                'phone' => session('phone') ?? 'N/A'
            ),
        );

        $snapToken = Snap::getSnapToken($params);
        $transaksi->snap_token = $snapToken;
        $transaksi->save();

        return Response::json([
            'snap_token' => $snapToken,
            'order_id' => $orderId
        ]);

    }


    public function callback(Request $request)
    {
        Log::info('Request Notification Masuk');
        Log::info($request->all());

        try {
            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
            \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $notif = new \Midtrans\Notification();

            $transactionStatus = $notif->transaction_status;
            $paymentType = $notif->payment_type;
            $fraudStatus = $notif->fraud_status;
            $orderId = $notif->order_id;

            // Ambil transaksi dari DB
            $transaksi = Transaksi::where('id_transaksi', $orderId)->first();

            if (!$transaksi) {
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
            } elseif ($transactionStatus == 'settlement') {
                $transaksi->status_transaksi = 'lunas';
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
            Log::error("Midtrans callback error: " . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }
    }

    public function success()
    {
        $transaksi = Transaksi::where('id_user', session('user_id', Auth::id()))
            ->where('status_transaksi', 'lunas')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$transaksi) {
            return redirect()->route('home')->with('error', 'Transaksi belum berhasil.');
        }

        return view('pages.user.struk', compact('transaksi'));
    }

}

