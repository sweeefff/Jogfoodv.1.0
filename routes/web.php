<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/data', function () {
    return view('data');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/menu', function () {
    return view('menu');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('registrasiform');
});

Route::get('/change-password', function () {
    return view('changepass');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/profile', function () {
    return view('profile');
});
