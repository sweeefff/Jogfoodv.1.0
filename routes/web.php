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
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\StrukController;
use App\Http\Controllers\TblmenuController;
use App\Http\Controllers\ChangePassController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialiteController;


// Auth Routes - Tidak perlu middleware
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');

// Public Routes - Dapat diakses tanpa login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.live_search'); // ✅ Live search route
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/detail/{id}', [DetailController::class, 'detail'])->name('detail');
Route::get('/detailpsn', [DetailpsnController::class, 'detailpsn'])->name('detailpsn');
Route::get('/komentar', [KomentarController::class, 'komentar'])->name('komentar');

// Admin Routes - Hanya admin yang bisa akses
Route::middleware([RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/order', [OrderController::class, 'order'])->name('admin.order');
    Route::get('/data', [DataController::class, 'data'])->name('admin.data');
    Route::get('/rekap', [RekapController::class, 'rekap'])->name('admin.rekap');

    // CRUD menu
    Route::resource('/tblmenu', TblmenuController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ])->names([
        'index' => 'pages.admin.tblmenu',
        'store' => 'tblmenu.store',
        'update' => 'tblmenu.update',
        'destroy' => 'tblmenu.destroy'
    ]);

    // ✅ Route Live Search untuk halaman admin
    Route::get('/tblmenu/search', [TblmenuController::class, 'search'])->name('tblmenu.search');
});

// User Routes - Hanya user yang bisa akses
Route::middleware([RoleMiddleware::class . ':user'])->prefix('user')->group(function () {
    // Metode pembayaran
    Route::post('/metode-bayar', [MetodeController::class, 'bayar'])->name('metode.bayar');
    Route::post('/payment/process', [MetodeController::class, 'process'])->name('metode.process');
    Route::get('/payment/snap', [MetodeController::class, 'snap'])->name('metode.snap');
    Route::get('/payment/success', [MetodeController::class, 'success'])->name('metode.success');

<<<<<<< HEAD
    Route::get('/struk/{id_struk}', [StrukController::class, 'show'])->name('struk.show');
    Route::get('/struk/generate/{id_transaksi}', [StrukController::class, 'generate'])->name('struk.generate');
    Route::get('/struk/download/{id_struk}', [StrukController::class, 'download'])->name('struk.download');
=======
<<<<<<< HEAD
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
>>>>>>> cf8f767e449554de9eb9365a6a3a9122e5b417d2


=======
    // Halaman user
>>>>>>> 31bfcd5c2650abb1f1fc63a096bf5bc816225b83
    Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->name('riwayat');


    Route::get('/rating', [RatingController::class, 'rating'])->name('rating');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user.dashboard');
<<<<<<< HEAD
    //Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'remove'])->name('keranjang.destroy');

Route::middleware(['auth', RoleMiddleware::class . ':user'])->prefix('user')->group(function () {

});

=======

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'remove'])->name('keranjang.destroy');
>>>>>>> 31bfcd5c2650abb1f1fc63a096bf5bc816225b83
});