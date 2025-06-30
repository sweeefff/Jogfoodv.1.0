<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function riwayat()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $userId = session('user_id', Auth::id());

        // Ambil semua transaksi user beserta detail_transaksi dan menu
        $riwayat = Transaksi::with(['detail_transaksi.menu', 'status_pengiriman', 'pembayaran'])
            ->where('id_user', $userId)
            ->orderByDesc('created_at')
            ->get();

        return view('pages.user.riwayat', compact('riwayat'));
    }
}
