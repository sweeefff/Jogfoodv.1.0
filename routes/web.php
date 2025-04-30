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
use App\Http\Controllers\DetailController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\DetailpsnController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TblmenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AboutController;

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
Route::get('/detail', [DetailController::class, 'detail']);
Route::get('/register', [RegistrasiController::class, 'register']);
Route::get('/detailpsn', [DetailpsnController::class, 'detailpsn']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/komentar', [KomentarController::class, 'komentar']);
Route::get('/metode', [MetodeController::class, 'metode']);
Route::get('/rekap', [RekapController::class, 'rekap']);
Route::get('/rating', [RatingController::class, 'rating']);
Route::get('/tblmenu', [TblmenuController::class, 'tblmenu']);
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/about', [AboutController::class, 'about']);