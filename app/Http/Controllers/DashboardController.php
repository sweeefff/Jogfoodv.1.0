<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminActivity;
use App\Models\Menu;
use App\Models\User;
use App\Models\Transaksi;
use App\Http\Controllers\OrderController;
use App\Models\Rating;


class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Statistik total (pastikan modelnya tersedia)
        $totalMakanan = Menu::where('kategori', 'makanan')->count();
        $totalMinuman = Menu::where('kategori', 'minuman')->count();
        $totalSideDish = Menu::where('kategori', 'side dish')->count();
        $totalUser = User::where('role', 'user')->count();
        $totalKurir = User::where('role', 'kurir')->count();
        $totalPesanan = Transaksi::count();
        $totalPendapatan = Transaksi::whereIn('status_transaksi', ['Lunas', 'Selesai'])->sum('total_harga');
        $topMenus = \App\Models\Menu::withCount([
            'ratings as avg_rating' => function ($q) {
                $q->select(\DB::raw('coalesce(avg(rating),0)'));
            },
            'ratings as total_ulasan'
        ])
            ->orderByDesc('avg_rating')
            ->limit(5)
            ->get();

        // Data untuk chart - menggunakan OrderController method
        $orderController = new OrderController();
        $yearlyData = $orderController->getRevenueData('year');
        $monthlyData = $orderController->getRevenueData('month');
        $dailyData = $orderController->getRevenueData('day');

        // Convert data untuk JavaScript
        $chartData = [
            'yearly' => [
                'labels' => array_column($yearlyData, 'label'),
                'data' => array_column($yearlyData, 'value')
            ],
            'monthly' => [
                'labels' => array_column($monthlyData, 'label'),
                'data' => array_column($monthlyData, 'value')
            ],
            'daily' => [
                'labels' => array_column($dailyData, 'label'),
                'data' => array_column($dailyData, 'value')
            ]
        ];

        return view('pages.admin.dashboard', compact(
            'totalMakanan',
            'totalMinuman',
            'totalUser',
            'totalKurir',
            'totalPesanan',
            'totalPendapatan',
            'topMenus',
            'chartData'
        ));

    }

    public function data()
    {
        $admin = User::find(session('user_id', 'admin_name')); // atau Admin::first();        if (!$admin) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');

        return view('AdminActivity', compact('user_id'));
    }
}

function logAdminActivity($activity, $keterangan = null)
{
    AdminActivity::create([
        'user_id' => User::find(session('user_id', 'admin'))->name,
        'activity' => $activity,
        'keterangan' => $keterangan,
    ]);
}