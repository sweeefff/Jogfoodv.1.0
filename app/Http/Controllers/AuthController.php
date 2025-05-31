<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        // Jika user sudah login, redirect sesuai role
        if (session('user_id')) {
            $user = User::find(session('user_id'));
            if ($user->user_role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/user/dashboard');
            }
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        // Cek user berdasarkan username atau email
        $user = User::where('username', $request->login)
            ->orWhere('email', $request->login)
            ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            // Manual session set
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_role', $user->role);
            $request->session()->regenerate();

            // Redirect by role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin!');
            } else {
                // Redirect ke home publik
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
            'user_role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showRegister()
    {
        // Jika user sudah login, redirect sesuai role
        if (session('user_id')) {
            $user = User::find(session('user_id'));
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/user/dashboard');
            }
        }

        return view('pages.auth.registrasi');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_id', 'user_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil.');
    }
}