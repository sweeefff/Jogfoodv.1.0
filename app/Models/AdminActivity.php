<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $fillable = ['id_user', 'activity', 'keterangan']; // Tambah keterangan
    public $timestamps = true;

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}