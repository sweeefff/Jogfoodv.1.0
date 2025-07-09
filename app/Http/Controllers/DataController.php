<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function data()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $admin = User::find(session('user_id', 'admin'));
        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('pages.admin.data', compact('admin'));
    }

    public function edit()
    {
        $admin = User::find(session('user_id', 'admin'));
        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('pages.admin.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        $admin = User::find(session('user_id', 'admin'));
        if (!$admin) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
            'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->no_hp = $request->no_hp;
        $admin->alamat = $request->alamat;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($admin->foto && $admin->foto !== 'default.avif') {
                Storage::disk('public')->delete($admin->foto);
            }

            // Upload foto baru
            $file = $request->file('foto');
            $filename = 'admin_' . $admin->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('admin', $filename, 'public');

            // Simpan hanya nama file tanpa path 'admin/'
            $admin->foto = $filename;
        }

        $admin->save();

        return redirect()->route('admin.data')->with('success', 'Profil berhasil diperbarui!');
    }
}