<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_menu',
        'id_user',
        'id_detail',
        'rating',
        'komentar',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu', 'id_menu');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}

