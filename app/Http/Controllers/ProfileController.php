<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $user = Auth::user();
        return view('pages.user.profile', compact('user'));
    }

    public function edit(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('alert', 'Silakan login terlebih dahulu.');
        }

        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('alert', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'no_hp', 'alamat']);

        // Handle upload foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto && file_exists(public_path('assets/img/profile/' . $user->foto))) {
                unlink(public_path('assets/img/profile/' . $user->foto));
            }
            $file = $request->file('foto');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/img/profile'), $filename);
            $data['foto'] = $filename;
        }

        $user->update($data);

        // Update session data (termasuk foto)
        $request->session()->put('name', $user->name);
        $request->session()->put('email', $user->email);
        $request->session()->put('no_hp', $user->no_hp);
        $request->session()->put('alamat', $user->alamat);
        $request->session()->put('foto', $user->foto);

        if ($request->has('latitude') && $request->has('longitude')) {
            $user->latitude = $request->latitude;
            $user->longitude = $request->longitude;
            $user->save();
        }

        $request->session()->flash('success', 'Profil berhasil diperbarui.');

        // Redirect ke profile dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function profile(Request $request)
    {
        $userId = $request->session()->get('user_id');
        $user = User::find($userId);

        if (!$user) {
            return redirect()->route('login')->with('alert', 'Silakan login terlebih dahulu.');
        }

        return view('pages.user.profile', compact('user'));
    }
}
