<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    public $timestamps = false;

    protected $fillable = [
        'id_transaksi',
        'id_menu',
        'jumlah',
        'subtotal'
    ];

    protected $casts = [
        'jumlah' => 'integer',
        'subtotal' => 'decimal:0'
    ];

    // Relasi ke transaksi
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    // Relasi ke menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function getSubtotalFormattedAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 0, ',', '.');
    }

    public function hitungSubtotal()
    {
        if ($this->menu) {
            $this->subtotal = $this->jumlah * $this->menu->harga;
        }
        return $this->subtotal;
    }

    public function scopeByTransaksi($query, $idTransaksi)
    {
        return $query->where('id_transaksi', $idTransaksi);
    }
}
