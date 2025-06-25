<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class KurirController extends Controller
{
    public function index()
    {
        $kurirs = User::where('role', 'kurir')->get();
        return view('pages.admin.data-kurir', compact('kurirs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required',
            'no_hp' => 'nullable',
        ]);

        $data = $request->only(['username', 'name', 'email', 'password', 'role', 'no_hp']);
        
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('kurir', 'public');
        }

        User::create($data);

        return redirect()->route('kurir.index')->with('success', 'Kurir berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $kurir = User::findOrFail($id);
        
        // Hapus foto jika ada
        if ($kurir->foto && \Storage::disk('public')->exists($kurir->foto)) {
            \Storage::disk('public')->delete($kurir->foto);
        }

        $kurir->delete();

        return redirect()->route('kurir.index')->with('success', 'Kurir berhasil dihapus');
    }
}