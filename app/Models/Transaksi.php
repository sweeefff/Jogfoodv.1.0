<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_transaksi',
        'id_user',
        'total_harga',
        'status_transaksi',
        'tanggal_transaksi',
        'snap_token',
    ];

    protected $casts = [
        'total_harga' => 'integer',

    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    // Relasi ke detail transaksi (1 transaksi memiliki banyak detail)
    public function detail_transaksi()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id_transaksi');
    }

    public function struk()
    {
        return $this->hasOne(Struk::class, 'id_transaksi', 'id_transaksi');
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_transaksi', 'id_transaksi');
    }
    // Relasi ke status pengiriman

    public function status_pengiriman()
    {
        return $this->hasOne(StatusPengiriman::class, 'id_transaksi', 'id_transaksi');
    }

    // Akses format rupiah
    public function getTotalHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->total_harga, 0, ',', '.');
    }
}
