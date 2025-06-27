<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatusPengiriman extends Model
{
    protected $table = 'status_pengiriman'; // Nama tabel di database

    protected $primaryKey = 'id_status'; // Primary key kustom (bukan id)

    public $timestamps = false; // Karena pakai kolom tanggal_update manual

    protected $fillable = [
        'id_user',
        'id_transaksi',
        'status_pembayaran',
        'status_pengiriman',
        'nama_penerima',
        'foto_penerima',
        'id_kurir',
        'alasan',
        'tanggal_transaksi',
        'tanggal_dikirim',
        'tanggal_diterima',
        'tanggal_update',
    ];

    // Relasi ke User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke Transaksi
    public function transaksi(): BelongsTo
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }
}
