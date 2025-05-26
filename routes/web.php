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

// Auth Routes - Tidak perlu middleware
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Public Routes - Dapat diakses tanpa login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'menu'])->name('menu');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/detail', [DetailController::class, 'detail'])->name('detail');
Route::get('/detailpsn', [DetailpsnController::class, 'detailpsn'])->name('detailpsn');
Route::get('/komentar', [KomentarController::class, 'komentar'])->name('komentar');

// Admin Routes - Hanya admin yang bisa akses
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/order', [OrderController::class, 'order'])->name('admin.order');
    Route::get('/data', [DataController::class, 'data'])->name('admin.data');
    Route::get('/rekap', [RekapController::class, 'rekap'])->name('admin.rekap');

    Route::resource('/tblmenu', TblmenuController::class)->only([
        'index',
        'store',
        'update',
        'destroy'
    ])->names([
                'index' => 'admin.tblmenu.index',
                'store' => 'admin.tblmenu.store',
                'update' => 'admin.tblmenu.update',
                'destroy' => 'admin.tblmenu.destroy'
            ]);
});

// Routes yang memerlukan login - User untuk akses
Route::middleware(['auth', RoleMiddleware::class . ':user'])->prefix('user')->group(function () {
    Route::get('/keranjang', [KeranjangController::class, 'keranjang'])->name('keranjang');
    Route::get('/metode', [MetodeController::class, 'metode'])->name('metode');
    Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->name('riwayat');
    Route::get('/struk', [StrukController::class, 'struk'])->name('struk');
    Route::get('/rating', [RatingController::class, 'rating'])->name('rating');
    Route::get('/', [HomeController::class, 'index'])->name('home');
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});