<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/data', [DataController::class, 'data']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/menu', [MenuController::class, 'menu']);

Route::get('/register', function () {
    return view('registrasi');
});

Route::get('/change-password', function () {
    return view('changepass');
});

Route::get('/detail', function () {
    return view('pages/detail');
});

Route::get('/profile', function () {
    return view('profile');
});
