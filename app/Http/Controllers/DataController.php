<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        return view('pages/admin/data');
    }
    
    public function edit()
    {
        // Ambil data admin dari database, misal pakai Auth atau model Admin
        $admin = auth()->user(); // atau Admin::first();
        return view('pages.admin.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        // Validasi dan update data admin
        $admin = auth()->user(); // atau Admin::first();
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        // ...update field lain sesuai kebutuhan...
        $admin->save();

        return redirect()->route('admin.data')->with('success', 'Profil berhasil diperbarui!');
    }
}
