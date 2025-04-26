<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RiwayatController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/data', [DataController::class, 'data']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/struk', [StrukController::class, 'struk']);
Route::get('/order', [OrderController::class, 'order']);
Route::get('/riwayat', [RiwayatController::class, 'riwayat']);