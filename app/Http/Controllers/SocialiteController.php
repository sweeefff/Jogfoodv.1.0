<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = \Laravel\Socialite\Facades\Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'username' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(\Illuminate\Support\Str::random(24)),
                    'role' => 'user', // Konsisten dengan 'role' seperti di AuthController
                    'name' => null
                ]
            );

            session()->put('user_id', $user->id);
            session()->put('user_role', $user->role);
            session()->put('username', $user->username);
            session()->put('email', $user->email);
            session()->regenerate();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai admin!');
            } else {
                return redirect()->route('home')->with('success', 'Login berhasil!');
            }

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Google.');
        }
    }


}

