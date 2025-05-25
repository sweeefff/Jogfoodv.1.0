<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('pages.login');
    }

    // Proses login
public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    // Ambil user berdasarkan username
    $user = \App\Models\User::where('username', $request->username)->first();

    // Cek apakah user ditemukan dan password cocok
    if ($user && \Hash::check($request->password, $user->password)) {
        // Simpan session
        session(['user_id' => $user->id]);
        session(['username' => $user->username]);
        session(['role' => $user->role]);

        // Redirect berdasarkan role
        if ($user->role === 'pages.admin') {
            return redirect()->route('pages.admin.dashboard');
        } else {
            return redirect()->route('pages.home');
        }
    }

    // Jika gagal login
    return back()->withErrors([
        'error' => 'Username atau password salah',
    ])->withInput();
}

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}