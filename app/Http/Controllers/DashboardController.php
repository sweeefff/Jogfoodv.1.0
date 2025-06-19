<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminActivity;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $activities = AdminActivity::latest()->limit(10)->get();

        return view('pages.admin.dashboard', compact('activities'));
    }
    public function data()
    {
        $admin = User::find(session('user_id', 'admin')); // atau Admin::first();
        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('pages.admin.data', compact('admin'));
    }
}
