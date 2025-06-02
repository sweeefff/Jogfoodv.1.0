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
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'username' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(Str::random(24)),
                    'role' => 'user',
                    'name' => null

                ]
            );

            Auth::login($user);

            // // ✅ UX redirect: kalau belum isi nama, arahkan ke form profil
            // if (is_null($user->name)) {
            //     return redirect()->route('profile.edit')
            //         ->with('alert', 'Silakan lengkapi nama kamu terlebih dahulu.');
            // }

            return redirect()->intended(route('user.dashboard'));

        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Gagal login dengan Google.');
        }
    }
}

