<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function riwayat()
    {
        $userId = session('user_id', Auth::id());

        // Ambil semua transaksi user beserta detail_transaksi dan menu
        $riwayat = Transaksi::with(['detail_transaksi.menu'])
            ->where('id_user', $userId)
            ->orderByDesc('created_at')
            ->get();

        return view('pages.user.riwayat', compact('riwayat'));
    }
}
