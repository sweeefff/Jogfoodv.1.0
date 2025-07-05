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
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\UserController;

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
// Google Auth
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.search');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/detail/{id}', [DetailController::class, 'detail'])->name('detail');
Route::post('/menu/beli-sekarang/{id}', [MenuController::class, 'beliSekarang'])->name('menu.beli_sekarang');
Route::get('/menu/{id}', [DetailController::class, 'detail'])->name('detail');


// Admin Routes - Hanya admin yang bisa akses
Route::middleware([RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    //CRUD Data Kurir
    Route::get('/kurir', [KurirController::class, 'kurir'])->name('admin.kurir');
    Route::post('/kurir', [KurirController::class, 'store'])->name('kurir.store');
    Route::delete('/kurir/{id}', [KurirController::class, 'destroy'])->name('kurir.destroy');

    // Data User
    Route::resource('/users-resource', UserController::class)->parameters(['users-resource' => 'id'])->names([
        'index' => 'users.index',
        'destroy' => 'users.destroy',
    ]);

    // CRUD menu
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
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
    Route::get('/tblmenu/search', [TblmenuController::class, 'search'])->name('tblmenu.search');

    // Profile
    Route::get('/data', [DataController::class, 'data'])->name('admin.data');
    Route::get('/edit', [DataController::class, 'edit'])->name('admin.edit');
    Route::put('/update', [DataController::class, 'update'])->name('admin.update');

    // Order
    Route::get('/order', [OrderController::class, 'index'])->name('admin.order');
    Route::post('/order/update-tanggal/{id}', [OrderController::class, 'updateTanggal'])->name('admin.order.update-tanggal');
    Route::get('/order/export', [OrderController::class, 'export'])->name('admin.order.export');

    //Penugasan Kurir
    Route::get('/pengiriman', [PengirimanController::class, 'pengiriman'])->name('admin.pengiriman');
    Route::post('/pengiriman/tugaskan/{id}', [PengirimanController::class, 'updatePengiriman'])->name('admin.pengiriman.tugaskan');
    
});

// User Routes - Hanya user yang bisa akses
Route::middleware([RoleMiddleware::class . ':user'])->prefix('user')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('user.dashboard');
    // Metode pembayaran
    Route::post('/metode-bayar', [MetodeController::class, 'bayar'])->name('metode.bayar');
    Route::post('/payment/process', [MetodeController::class, 'process'])->name('metode.process');
    Route::get('/payment/snap', [MetodeController::class, 'snap'])->name('metode.snap');
    Route::get('/payment/success', [MetodeController::class, 'success'])->name('metode.success');
    Route::patch('/transaksi/{id}/batal', [MetodeController::class, 'batal'])->name('transaksi.batal');

    //Struk
    Route::get('/struk/{id_struk}', [StrukController::class, 'show'])->name('struk.show');
    Route::get('/struk/generate/{id_transaksi}', [StrukController::class, 'generate'])->name('struk.generate');
    Route::get('/struk/download/{id_struk}', [StrukController::class, 'download'])->name('struk.download');

    // Profile
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    //Keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/keranjang/hapus/{id}', [KeranjangController::class, 'remove'])->name('keranjang.destroy');

    //Detail Pesanan
    Route::get('/detailpsn', [DetailpsnController::class, 'detailpsn'])->name('detailpsn');
    Route::get('/bayar/{id_transaksi}', [DetailpsnController::class, 'bayar'])->name('detailpsn.bayar');

    //Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->name('riwayat');
    Route::get('/rating', [RatingController::class, 'rating'])->name('rating');

    Route::post('/beli-sekarang/{id}', [MenuController::class, 'beliSekarang'])->name('menu.beli_sekarang');

    // Rating
    Route::get('/user/rating/{id_menu}/{id_detail}', [RatingController::class, 'index'])->name('rating.form');
    Route::post('/user/rating/{id_menu}/{id_detail}', [RatingController::class, 'store'])->name('rating.store');
});

// Kurir Routes - Hanya kurir yang bisa akses
Route::middleware([RoleMiddleware::class . ':kurir'])->prefix('kurir')->group(function () {
    //  Dashboard kurir
    Route::get('/dashboard', [KurirController::class, 'kurirDashboard'])->name('kurir.dashboard');
    Route::get('/order', [KurirController::class, 'kurirOrder'])->name('kurir.order');

    //Update Status
    Route::get('/kurir/update/{id}', [KurirController::class, 'kurirShowUpdate'])->name('kurir.showUpdate');
    Route::put('/kurir/update/{id}', [KurirController::class, 'kurirUpdateStatus'])->name('kurir.updateStatus');
    Route::put('/order/{id}/selesai', [KurirController::class, 'kurirSelesaikanOrder'])->name('kurir.selesaikan');

    // Profile Kurir
    Route::get('/data', [KurirController::class, 'kurirData'])->name('kurir.data');
    Route::get('/edit', [KurirController::class, 'kurirEdit'])->name('kurir.edit');
    Route::put('/update', [KurirController::class, 'kurirUpdate'])->name('kurir.update');
});
