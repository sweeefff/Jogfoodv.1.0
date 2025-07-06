<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;

class AuthController extends Controller
{
    //Login
    public function showLogin()
    {
        // Jika user sudah login, redirect sesuai role
        if (session('user_id')) {
            $user = User::find(session('user_id'));
            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } elseif ($user->role === 'user') {
                return redirect('/user/dashboard');
            } elseif ($user->role === 'kurir') {
                return redirect('/kurir/dashboard');
            }
        }

        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'login' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->login)
                ->orWhere('email', $request->login)
                ->first();

            if ($user && Hash::check($request->password, $user->password)) {
                $request->session()->put('user_id', $user->id);
                $request->session()->put('user_role', $user->role);
                $request->session()->put('username', $user->username);
                $request->session()->put('email', $user->email);
                $request->session()->put('name', $user->name);
                $request->session()->put('no_hp', $user->no_hp);
                $request->session()->put('alamat', $user->alamat);
                $request->session()->put('latitude', $user->latitude);
                $request->session()->put('longitude', $user->longitude);
                $request->session()->put('foto', $user->foto);
                $request->session()->regenerate();

                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin!');
                } elseif ($user->role === 'user') {
                    return redirect()->route('home')->with('success', 'Login berhasil!');
                } elseif ($user->role === 'kurir') {
                    return redirect()->route('kurir.dashboard')->with('success', 'Login berhasil sebagai kurir!');
                }
            }

            return back()->with('error', 'Username atau password salah')
                ->withInput($request->only('login'));

        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors([
                'login' => 'Terjadi kesalahan pada sistem, silakan coba lagi nanti.',
            ])->withInput($request->only('login'));
        }
    }
    //Register
    public function register(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                'min:5',
                'max:20',
                'alpha_dash',
                'unique:users'
            ],
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\d\W]).+$/'
            ],
            'g-recaptcha-response' => 'required|captcha',
        ], [
            // Custom error messages
            'username.required' => 'Username wajib diisi.',
            'username.min' => 'Username minimal harus 5 karakter.',
            'username.unique' => 'Username sudah digunakan.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama dengan password.',
            'password.regex' => 'Password harus mengandung huruf kapital, dan angka/simbol.',

            'g-recaptcha-response.required' => 'Captcha wajib diverifikasi.',
            'g-recaptcha-response.captcha' => 'Captcha tidak valid.',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'name' => null,
            'no_hp' => null,
            'alamat' => null,
            'foto' => null,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showRegister()
    {
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

    //logout
    public function logout(Request $request)
    {
        $request->session()->forget(['user_id', 'user_role']);
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout berhasil.');
    }

    //Forgot Password
    public function showForgotForm()
    {
        return view('pages.auth.token-email');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('error', 'Email tidak ditemukan.');
        }


        $token = Str::random(60);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );

        $resetLink = url('/reset-password/' . $token . '?email=' . urlencode($user->email));

        Mail::to($user->email)->send(new ResetPasswordMail($resetLink));

        return back()->with('status', 'Link reset password telah dikirim ke email Anda.');
    }

    //Reset Password
    public function showResetForm(Request $request, $token)
    {
        return view('pages.auth.forgot', ['token' => $token, 'email' => $request->email]);

    }


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|confirmed|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $record = DB::table('password_resets')->where([
            ['email', '=', $request->email],
            ['token', '=', $request->token],
        ])->first();

        if (!$record) {
            return back()->withErrors(['email' => 'Token tidak valid atau sudah kedaluwarsa.']);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email', $request->email)->delete();

        return redirect('/login')->with('status', 'Password berhasil diubah.');
    }

}