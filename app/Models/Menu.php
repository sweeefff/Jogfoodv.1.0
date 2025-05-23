<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu'; // jika nama tabel kamu bukan jamak dari model (default Laravel)

    protected $primaryKey = 'id_menu'; // karena kamu pakai nama primary key custom

    public $timestamps = false; // jika tabel tidak punya kolom created_at dan updated_at

    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi_menu',
        'harga',
        'gambar_menu'
    ];

    // Optional: Scope untuk filter berdasarkan kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }
}