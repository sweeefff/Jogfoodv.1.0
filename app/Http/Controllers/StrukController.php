<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Services\StrukService;
use App\Models\Struk;
use Barryvdh\DomPDF\Facade\Pdf;

class StrukController extends Controller
{
    protected $strukService;

    public function __construct(StrukService $strukService)
    {
        $this->strukService = $strukService;
    }
    public function show($id_struk)
    {
        $struk = Struk::with(['transaksi.user', 'transaksi.detail_transaksi.menu', 'transaksi.pembayaran'])->findOrFail($id_struk);
        $transaksi = $struk->transaksi;
        $pembayaran = $transaksi->pembayaran; // Ambil relasi pembayaran

        return view('pages.user.struk', compact('struk', 'transaksi', 'pembayaran'));
    }



    public function generate($id_transaksi)
    {
        $struk = $this->strukService->generateStruk($id_transaksi);
        $this->strukService->sendStrukEmail($struk);

        // Redirect ke tampilan struk setelah email terkirim
        return redirect()->route('struk.show', ['id_struk' => $struk->id_struk])
            ->with('success', 'Struk berhasil dibuat dan dikirim ke email!');
    }


    public function download($id_struk)
    {
        $struk = Struk::findOrFail($id_struk);
        return response()->download(storage_path('app/public/' . $struk->file_struk));
    }

    public function exportPDF($id)
    {
        $transaksi = Transaksi::with(['user', 'detail_transaksi.menu', 'pembayaran'])->findOrFail($id);
        $pembayaran = $transaksi->pembayaran;
        $pdf = Pdf::loadView('pages.pdf.struk-pdf', compact('transaksi', 'pembayaran'))->setPaper('a4', 'portrait');
        return $pdf->download('Bukti-Pembayaran-' . $transaksi->id_transaksi . '.pdf');
    }

}
