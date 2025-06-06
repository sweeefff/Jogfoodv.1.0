<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu';

    protected $primaryKey = 'id_menu';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi_menu',
        'harga',
        'gambar_menu'
    ];
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_menu');
    }

}