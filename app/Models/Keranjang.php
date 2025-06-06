<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $primaryKey = 'id_keranjang';

    protected $fillable = ['id_user', 'id_menu', 'jumlah'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
