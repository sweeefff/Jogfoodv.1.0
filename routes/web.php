<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\DetailpsnController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\TblmenuController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/about', [AboutController::class, 'about']);
Route::get('/data', [DataController::class, 'data']);
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::get('/detail', [DetailController::class, 'detail']);
Route::get('/detailpsn', [DetailpsnController::class, 'detailpsn']);
Route::get('/', [HomeController::class, 'index']);
Route::get('/keranjang', [KeranjangController::class, 'keranjang']);
Route::get('/komentar', [KomentarController::class, 'komentar']);
Route::get('/login', [LoginController::class, 'login']);
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/metode', [MetodeController::class, 'metode']);
Route::get('/order', [OrderController::class, 'order']);
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/about', [AboutController::class, 'about']);
Route::get('/rekap', [RekapController::class, 'rekap']);
Route::get('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/rating', [RatingController::class, 'rating']);
Route::get('/register', [RegistrasiController::class, 'registrasi']);
Route::get('/riwayat', [RiwayatController::class, 'riwayat']);
Route::get('/struk', [StrukController::class, 'struk']);
Route::get('/tblmenu', [TblmenuController::class, 'tblmenu']);
