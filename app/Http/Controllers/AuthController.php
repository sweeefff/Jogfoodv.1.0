<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Jika user sudah login, redirect sesuai role
        if (Auth::check()) {
            $user = Auth::user();
            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login_type => $request->login,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            
            // Debug: uncomment untuk melihat data user
            // dd($user->toArray());
            
            // Cek apakah ada intended URL (halaman yang dituju sebelum login)
            if ($request->session()->has('url.intended')) {
                return redirect()->intended();
            }
            
            // Jika tidak ada intended URL, redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin!');
            } else {
                return redirect()->route('home')->with('success', 'Login berhasil!');
            }
        }

        return back()->withErrors([
            'login' => 'Login atau password salah',
        ])->withInput($request->only('login'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', 
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showRegister()
    {
        // Jika user sudah login, redirect sesuai role
        if (Auth::check()) {
            $user = Auth::user();
            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        return view('pages.auth.registrasi');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout berhasil.');
    }
}