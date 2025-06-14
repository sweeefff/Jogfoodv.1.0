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
        ])
            // Jika ingin semua status, hapus where('status', 'selesai')
            ->where('id_user', session('user_id', Auth::id()))
            // ->orderByDesc('created_at')
            ->get();

        return view('pages.user.detailpsn', compact('riwayat'));
    }
    
}
