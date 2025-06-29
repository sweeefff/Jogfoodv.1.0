<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class PengirimanController extends Controller
{
    public function pengiriman()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $pengiriman = \App\Models\Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran'])
            ->where('status_transaksi', '!=', 'Batal')
            ->orderByDesc('created_at')
            ->paginate(10); // PAGINATE 10

        $kurirList = User::where('role', 'kurir')->get();

        return view('pages.admin.pengiriman', compact('pengiriman', 'kurirList'));
    }

    public function updatePengiriman(Request $request, $id)
    {
        // Logika untuk memperbarui status pengiriman berdasarkan ID
        // Validasi dan proses update di sini

        return redirect()->route('admin.pengiriman')->with('success', 'Status pengiriman berhasil diperbarui.');
    }
}
