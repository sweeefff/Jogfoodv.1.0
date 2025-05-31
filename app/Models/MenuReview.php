<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuReview extends Model
{
    use HasFactory;

    protected $table = 'menu_review';

    protected $primaryKey = 'id_review';

    protected $fillable = [
        'id_menu',
        'id_user',
        'rate',
        'review',
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

