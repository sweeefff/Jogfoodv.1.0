<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Struk extends Model
{
    protected $table = 'struk';
    protected $primaryKey = 'id_struk';
    public $timestamps = false;
    
    protected $fillable = [
        'id_struk',
        'id_transaksi',
        'file_struk',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }
}

