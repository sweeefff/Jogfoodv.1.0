<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatusPengirimanMail;
use App\Models\StatusPengiriman;
use App\Models\Transaksi;

class PengirimanController extends Controller
{
    public function pengiriman(Request $request)
    {
        $query = Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran', 'status_pengiriman.kurir'])
            ->where('status_transaksi', '!=', 'Batal');

        // Filter search nama customer
        if ($request->filled('search')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        // Filter status pengiriman
        if ($request->filled('status')) {
            $query->whereHas('status_pengiriman', function ($q) use ($request) {
                $q->where('status_pengiriman', $request->status);
            });
        }

        $pengiriman = $query->orderByDesc('created_at')->paginate(10)->appends($request->all());

        $kurirList = User::where('role', 'kurir')->get();

        return view('pages.admin.pengiriman', compact('pengiriman', 'kurirList'));
    }

    public function updatePengiriman(Request $request, $id)
    {
        $request->validate([
            'kurir' => 'required|exists:users,id',
        ]);

        $pengiriman = StatusPengiriman::where('id_transaksi', $id)->first();
        if ($pengiriman) {
            $pengiriman->id_kurir = $request->kurir;
            $pengiriman->status_pengiriman = 'dikirim';
            $pengiriman->tanggal_update = now();
            $pengiriman->save();

            $transaksi = $pengiriman->transaksi;
            $user = $transaksi->user;

            if ($user && $user->email) {
                Mail::to($user->email)->send(new StatusPengirimanMail(
                    'dikirim',
                    $user,
                    $transaksi,
                    null
                ));
            }
        }

        return redirect()->route('admin.pengiriman')->with('success', 'Kurir telah berhasil ditugaskan!');
    }

}
