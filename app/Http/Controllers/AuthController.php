<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // penting!
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->to('/admin/dashboard');
            }

            return redirect()->to('/user/dashboard');

        }

        return back()->withErrors([
            'email' => 'Login gagal! Email atau password salah.',
        ]);
    }

    public function showRegister()
    {
        return view('pages.auth.registrasi');
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

        return redirect()->route('login')->with('success', 'Registrasi berhasil.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Hapus autentikasi

        $request->session()->invalidate(); // Hancurkan session
        $request->session()->regenerateToken(); // Regenerasi CSRF token

        return redirect('/login'); // Arahkan kembali ke login
    }

}
