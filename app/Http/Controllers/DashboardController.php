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
        $activities = AdminActivity::latest()->limit(20)->get();

        // Statistik total (pastikan modelnya tersedia)
        $totalKuliner = Menu::where('kategori', 'kuliner')->count(); // Ganti 'kuliner' dengan kategori yang sesuai di model Kuliner::count();
        $totalMinuman = Menu::where('kategori', 'minuman')->count(); // Ganti 'minuman' dengan kategori yang sesuai di model Minuman::count();
        $totalSideDish = Menu::where('kategori', 'side dish')->count(); // Ganti 'side dish' dengan kategori yang sesuai di model SideDish::count();
        $totalUser = User::count();

        return view('pages.admin.dashboard', compact(
            'activities',
            'totalKuliner',
            'totalMinuman',
            'totalSideDish',));
    }

    public function data()
    {
            $admin = User::find(session('user_id', 'admin_name')); // atau Admin::first();        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');

        return view('AdminActivity', compact('user_id'));
    }
}

    function logAdminActivity($activity, $keterangan = null) {
        AdminActivity::create([
            'user_id' => User::find(session('user_id', 'admin'))->name,
            'activity' => $activity,
            'keterangan' => $keterangan,
        ]);
    }    