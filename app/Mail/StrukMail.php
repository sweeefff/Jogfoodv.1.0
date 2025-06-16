<?php

namespace App\Mail;

use App\Models\Transaksi;
use App\Models\Struk;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class StrukMail extends Mailable
{
    use Queueable, SerializesModels;

    public Transaksi $transaksi;
    public ?Struk $struk;

    public int $subtotal;
    public int $diskon;
    public int $ongkir;
    public int $pajak_persen;
    public int $pajak;
    public int $total;

    /**
     * Create a new message instance.
     */
    public function __construct(Transaksi $transaksi, Struk $struk = null)
    {
        $this->transaksi = $transaksi;
        $this->struk = $struk;

        // Pastikan collection aman, tidak null
        $items = $transaksi->detailTransaksi ?? collect();

        $this->subtotal = $items->sum(function ($item) {
            return $item->jumlah * $item->menu->harga;
        });

        $this->diskon = 0; // misalnya, sesuaikan jika ada diskon
        $this->ongkir = 10000; // contoh ongkir tetap
        $this->pajak_persen = 10;
        $this->pajak = ($this->subtotal - $this->diskon) * ($this->pajak_persen / 100);
        $this->total = ($this->subtotal - $this->diskon) + $this->pajak + $this->ongkir;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bukti Pembayaran - Order #' . $this->transaksi->id_transaksi,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.struk-email',
            with: [
                'transaksi' => $this->transaksi,
                'struk' => $this->struk,
                'subtotal' => $this->subtotal,
                'diskon' => $this->diskon,
                'ongkir' => $this->ongkir,
                'pajak_persen' => $this->pajak_persen,
                'pajak' => $this->pajak,
                'total' => $this->total,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     */
}
