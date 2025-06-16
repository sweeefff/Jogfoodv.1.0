<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminActivity; // pastikan model sudah ada

class DashboardController extends Controller
{
    public function dashboard()
    {
        $activities = AdminActivity::latest()->limit(10)->get();

        return view('pages.admin.dashboard', compact('activities'));
    }
    public function data()
    {
        $admin = auth()->user(); // atau Admin::first();
        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('pages.admin.data', compact('admin'));
    }
}
