<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminActivity;
use App\Models\Menu;
use App\Models\User;


class DashboardController extends Controller
{
    public function dashboard()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        // Statistik total (pastikan modelnya tersedia)
        $totalKuliner = Menu::where('kategori', 'kuliner')->count(); // Ganti 'kuliner' dengan kategori yang sesuai di model Kuliner::count();
        $totalMinuman = Menu::where('kategori', 'minuman')->count(); // Ganti 'minuman' dengan kategori yang sesuai di model Minuman::count();
        $totalSideDish = Menu::where('kategori', 'side dish')->count(); // Ganti 'side dish' dengan kategori yang sesuai di model SideDish::count();
        $totalUser = User::count();
        $topMenus = \App\Models\Menu::withCount([
            'ratings as avg_rating' => function ($q) {
                $q->select(\DB::raw('coalesce(avg(rating),0)'));
            },
            'ratings as total_ulasan'
        ])
            ->orderByDesc('avg_rating')
            ->limit(5)
            ->get();

        return view('pages.admin.dashboard', compact(
            'totalKuliner',
            'totalMinuman',
            'totalSideDish',
            'totalUser',
            'topMenus'
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