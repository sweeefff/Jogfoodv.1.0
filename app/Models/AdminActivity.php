<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminActivity extends Model
{
    protected $fillable = ['admin_name', 'activity', 'ip_address'];
}

// Saat login sukses
use Illuminate\Support\Facades\Auth;

AdminActivity::create([
    'admin_name' => Auth::user()->nama,
    'activity' => 'login',
    'ip_address' => request()->ip(),
]);
AdminActivity::create([
    'admin_name' => Auth::user()->nama,
    'activity' => 'logout',
    'ip_address' => request()->ip(),
]);
