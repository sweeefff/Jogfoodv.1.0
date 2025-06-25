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


}
