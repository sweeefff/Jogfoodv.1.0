<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StatusPengirimanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $user;
    public $transaksi;
    public $alasan; // tambahkan jika ingin mengirim alasan

    public function __construct($status, $user, $transaksi, $alasan = null)
    {
        $this->status = $status;
        $this->user = $user;
        $this->transaksi = $transaksi;
        $this->alasan = $alasan;
    }

    public function build()
    {
        return $this->subject('Update Status Pengiriman Pesanan Anda')
            ->view('emails.status-pengiriman-email')
            ->with([
                'status_pengiriman' => $this->status,
                'user' => $this->user,
                'transaksi' => $this->transaksi,
                'alasan' => $this->alasan,
            ]);
    }
}
