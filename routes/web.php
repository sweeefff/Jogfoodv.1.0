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

Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback'])->name('google.callback');

// Public Routes - Dapat diakses tanpa login
Route::get('/', [HomeController::class, 'index'])->name('home');

// Search biasa (form submit)
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Live search (AJAX)
Route::get('/menu/search', [MenuController::class, 'search'])->name('menu.search');

Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/detail/{id}', [DetailController::class, 'detail'])->name('detail');
Route::get('/detailpsn', [DetailpsnController::class, 'detailpsn'])->name('detailpsn');
Route::get('/komentar', [KomentarController::class, 'komentar'])->name('komentar');

Route::post('/menu/beli-sekarang/{id}', [MenuController::class, 'beliSekarang'])->name('menu.beli_sekarang');


// Admin Routes - Hanya admin yang bisa akses
Route::middleware([RoleMiddleware::class . ':admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/order', [OrderController::class, 'order'])->name('admin.order');
    Route::get('/data', [DataController::class, 'data'])->name('admin.data');
    Route::get('/pengiriman', [PengirimanController::class, 'pengiriman'])->name('admin.pengiriman');
    Route::get('/user', [UserController::class, 'index'])->name('admin.user');
    Route::get('/kurir', [KurirController::class, 'kurir'])->name('kurir.index');
    // ✅ Route ini untuk menampilkan halaman daftar kurir
    Route::get('/kurir', [KurirController::class, 'index'])->name('admin.kurir');
    // ✅ Route ini untuk menyimpan data kurir (dipakai oleh form tambah kurir)
    Route::post('/kurir', [KurirController::class, 'store'])->name('kurir.store');
    // ✅ Route ini untuk menghapus kurir (dipakai oleh modal hapus)
    Route::delete('/kurir/{id}', [KurirController::class, 'destroy'])->name('kurir.destroy');

    //  Untuk Data User dibagian admin 
    Route::resource('/users-resource', UserController::class)->parameters(['users-resource' => 'id'])->names([
        'index' => 'users.index',
        'store' => 'users.store',
        'show' => 'users.show',
    ]);
    
    // Route tambahan untuk UserController
    Route::get('users/role/{role}', [UserController::class, 'getUsersByRole'])->name('admin.users.role');
    Route::post('users/{id}/toggle-status', [UserController::class, 'toggleStatus'])->name('admin.users.toggle-status');
    Route::get('users/search', [UserController::class, 'search'])->name('admin.users.search');
    Route::get('users/statistics', [UserController::class, 'getStatistics'])->name('admin.users.statistics');
    Route::post('users/bulk-delete', [UserController::class, 'bulkDelete'])->name('admin.users.bulk-delete');

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

    // Route Live Search untuk halaman admin
    Route::get('/tblmenu/search', [TblmenuController::class, 'search'])->name('tblmenu.search');
    Route::get('/edit', [DataController::class, 'edit'])->name('admin.edit');
    Route::put('/update', [DataController::class, 'update'])->name('admin.update');
    Route::get('/changepass', [DataController::class, 'showChangePass'])->name('admin.changepass');
    Route::post('/changepass', [DataController::class, 'changePass'])->name('admin.changepass.update');
    Route::get('/rekap', [RekapController::class, 'rekap'])->name('admin.rekap');
    Route::post('/order/update-tanggal/{id}', [OrderController::class, 'updateTanggal'])->name('admin.order.update-tanggal');
    Route::get('/order/export', [OrderController::class, 'export'])->name('admin.order.export');
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
    Route::get('/bayar/{id_transaksi}', [DetailpsnController::class, 'bayar'])->name('metode.bayar');

    //Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'riwayat'])->name('riwayat');
    Route::get('/rating', [RatingController::class, 'rating'])->name('rating');

    Route::post('/beli-sekarang/{id}', [\App\Http\Controllers\MenuController::class, 'beliSekarang'])->name('menu.beli_sekarang');

    // Rating
    Route::get('/user/rating/{id_menu}/{id_detail}', [RatingController::class, 'index'])->name('rating.form');
    Route::post('/user/rating/{id_menu}/{id_detail}', [RatingController::class, 'store'])->name('rating.store');
});

// Kurir Routes - Hanya kurir yang bisa akses
Route::middleware([RoleMiddleware::class . ':kurir'])->prefix('kurir')->group(function () {
    Route::get('/dashboard', [KurirController::class, 'kurirDashboard'])->name('kurir.dashboard');
    Route::get('/order', [KurirController::class, 'kurirOrder'])->name('kurir.order');
    Route::get('/kurir/order/{id}/update', [KurirController::class, 'kurirShowUpdate'])->name('kurir.showUpdate');
    Route::put('/order/{id}/update-status', [KurirController::class, 'kurirUpdateStatus'])->name('kurir.updateStatus');
    Route::put('/order/{id}/selesai', [KurirController::class, 'kurirSelesaikanOrder'])->name('kurir.selesaikan');


    Route::get('/data', [KurirController::class, 'kurirData'])->name('kurir.data');
    Route::get('/edit', [KurirController::class, 'kurirEdit'])->name('kurir.edit');
    Route::put('/update', [KurirController::class, 'kurirUpdate'])->name('kurir.update');
});
