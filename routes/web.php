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
use App\Http\Controllers\MetodeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\Auth\RegistrasiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\TblmenuController;
use App\Http\Controllers\ChangePassController;
use App\Http\Controllers\Auth\LoginController;
Route::middleware('role:admin')->get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
});
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
Route::get('/menu', [MenuController::class, 'menu']);
Route::get('/metode', [MetodeController::class, 'metode']);
Route::get('/order', [OrderController::class, 'order']);
Route::get('/profile', [ProfileController::class, 'edit']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/rekap', [RekapController::class, 'rekap']);
Route::put('/profile', [ProfileController::class, 'update']);
Route::get('/rating', [RatingController::class, 'rating']);
Route::get('/riwayat', [RiwayatController::class, 'riwayat']);
Route::get('/struk', [StrukController::class, 'struk']);
Route::get('/tblmenu', [TblmenuController::class, 'tblmenu'])->name('pages.admin.tblmenu');
Route::post('/tblmenu/store', [TblMenuController::class, 'store'])->name('tblmenu.store');
Route::put('/tblmenu/{id}', [TblmenuController::class, 'update'])->name('tblmenu.update');
Route::delete('/tblmenu/{id}', [TblMenuController::class, 'destroy'])->name('tblmenu.destroy');
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Halaman home untuk user
Route::get('/home', function () {
    return view('pages.home');
})->name('pages.home');

// Halaman dashboard untuk admin
Route::get('/admin/dashboard', function () {
    return view('pages.admin.dashboard');
})->name('pages.admin.dashboard');

Route::get('/register', [RegistrasiController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegistrasiController::class, 'registrasi']);

Route::get('/changepass', [ChangePassController::class, 'changepass']);
