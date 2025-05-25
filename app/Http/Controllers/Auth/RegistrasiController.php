<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegistrasiController extends Controller
{
    public function showRegisterForm()
    {
        return view('pages/registrasi'); // pastikan file view ini ada
    }

    public function registrasi(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:5|unique:user,username',
            'email' => 'required|email|unique:user,email',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/', // Huruf kapital
                'regex:/[@$!%*?&]/' // Simbol
            ],
            'password_confirmation' => 'required|same:password',

        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'remember_token' => null
        ]);

        Session::flash('success', 'Registrasi berhasil! Silakan login.');
        return redirect()->route('login');
    }
}

