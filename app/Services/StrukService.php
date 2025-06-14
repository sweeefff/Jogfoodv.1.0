<?php

namespace App\Services;

use App\Models\Transaksi;
use App\Models\Struk;
use Illuminate\Support\Facades\Mail;
use App\Mail\StrukMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class StrukService
{
    public function generateStruk($id_transaksi)
    {
        $transaksi = Transaksi::with(['detail_transaksi.menu', 'pembayaran'])->findOrFail($id_transaksi);
        $pdf = Pdf::loadView('pages.pdf.struk-pdf', compact('transaksi'));

        $filename = "struk-{$transaksi->id_transaksi}-" . time() . ".pdf";
        $path = "struks/{$filename}";

        Storage::disk('public')->put($path, $pdf->output());

        return Struk::create([
            'id_transaksi' => $transaksi->id_transaksi,
            'file_struk' => $path
        ]);
    }

    public function sendStrukEmail($struk)
    {
        $transaksi = $struk->transaksi;
        $user = $transaksi->user;
        Mail::to($user->email)->send(new StrukMail($transaksi, $struk));
    }
}
