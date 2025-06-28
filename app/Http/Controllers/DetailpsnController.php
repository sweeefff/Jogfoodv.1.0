<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class DetailpsnController extends Controller
{
    public function detailpsn()
    {
        // Update status_transaksi menjadi 'kadaluwarsa' jika sudah expired
        $expiredTime = now()->subHour(); // expired 1 jam setelah snap_token_created_at
        Transaksi::where('status_transaksi', 'pending')
            ->whereNotNull('snap_token_created_at')
            ->where('snap_token_created_at', '<', $expiredTime)
            ->update(['status_transaksi' => 'kadaluwarsa']);

        // Hapus transaksi kadaluwarsa lebih dari 1 bulan
        $deleteTime = now()->subMonth();
        Transaksi::where('status_transaksi', 'kadaluwarsa')
            ->where('updated_at', '<', $deleteTime)
            ->delete();

        $riwayat = Transaksi::with([
            'detail_transaksi.menu',
            'pembayaran',
            'status_pengiriman',
            'user',
            'struk',
        ])
            ->where('id_user', session('user_id', Auth::id()))
            ->get();

        return view('pages.user.detailpsn', compact('riwayat'));
    }
    public function bayar($id_transaksi)
    {
        $transaksi = Transaksi::with('detail_transaksi.menu')->findOrFail($id_transaksi);
        $items = $transaksi->detail_transaksi;

        $subtotal = $items->sum('subtotal');
        $tax = 0.1;
        $taxAmount = $subtotal * $tax;
        $deliveryFee = 10000;
        $total = $subtotal + $taxAmount + $deliveryFee;

        return view('pages.user.metode', compact(
            'transaksi',
            'items',
            'id_transaksi',
            'subtotal',
            'tax',
            'taxAmount',
            'deliveryFee',
            'total'
        ));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $riwayat = Transaksi::with([
            'detail_transaksi.menu',
            'pembayaran',
            'status_pengiriman',
            'user',
            'struk',
        ])
            ->where('id_user', session('user_id', Auth::id()))
            ->where(function ($query) use ($search) {
                $query->where('id_transaksi', 'like', '%' . $search . '%')
                    ->orWhereHas('detail_transaksi.menu', function ($q) use ($search) {
                        $q->where('nama', 'like', '%' . $search . '%');
                    });
            })
            ->get();

        return view('pages.user.detailpsn', compact('riwayat'));
    }

}
