<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
public function data()
{
$admin = auth()->user();
if (!$admin) {
return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
}
return view('pages.admin.data', compact('admin'));
}

public function edit()
{
$admin = auth()->user();
if (!$admin) {
return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
}
return view('pages.admin.edit', compact('admin'));
}

public function update(Request $request)
{
$admin = auth()->user();
if (!$admin) {
return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
}

$request->validate([
'nama' => 'required|string|max:255',
'username' => 'required|string|max:255|unique:users,username,' . $admin->id,
'email' => 'required|email|max:255|unique:users,email,' . $admin->id,
'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
]);

$admin->nama = $request->nama;
$admin->username = $request->username;
$admin->email = $request->email;

if ($request->hasFile('foto')) {
$file = $request->file('foto');
$filename = 'admin_' . $admin->id . '.' . $file->getClientOriginalExtension();
$file->move(public_path('assets/img/profile'), $filename);
$admin->foto = $filename;
}

$admin->save();

// JANGAN redirect ke /user/dashboard!
return redirect()->route('admin.data')->with('success', 'Profil berhasil diperbarui!');
}

public function showChangePass()
{
$admin = auth()->user();
if (!$admin) {
return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
}

return view('pages.admin.changepass', compact('admin'));
}

public function changePass(Request $request)
{
$admin = auth()->user();
if (!$admin) {
return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
}

$request->validate([
'password' => 'required|min:6|confirmed',
]);

$admin->password = bcrypt($request->password);
$admin->save();

return redirect()->route('admin.data')->with('success', 'Password berhasil diubah!');
}
}
