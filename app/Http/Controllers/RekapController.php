<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use PDF;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $query = Pesanan::with(['pelanggan', 'makanan'])->orderBy('created_at', 'desc');

        // Filter tanggal (jika ada)
        if ($request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        $pesanan = $query->paginate(10);

        $totalPendapatan = $query->where('status', 'Selesai')->sum('total');
        $jumlahPesanan   = $query->count();

        return view('rekap', [
            'pesanan'         => $pesanan,
            'totalPendapatan' => $totalPendapatan,
            'jumlahPesanan'   => $jumlahPesanan,
        ]);
    }

    public function exportPdf(Request $request)
    {
        $query = Pesanan::with(['pelanggan', 'makanan'])->orderBy('created_at', 'desc');

        if ($request->tanggal) {
            $query->whereDate('created_at', $request->tanggal);
        }

        $pesanan = $query->get();
        $totalPendapatan = $pesanan->where('status', 'Selesai')->sum('total');
        $jumlahPesanan = $pesanan->count();

        $pdf = PDF::loadView('rekap_pdf', [
            'pesanan' => $pesanan,
            'totalPendapatan' => $totalPendapatan,
            'jumlahPesanan' => $jumlahPesanan,
            'tanggal' => $request->tanggal
        ]);

        return $pdf->download('rekap-pesanan.pdf');
    }
}
