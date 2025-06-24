<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('role', 'user')
                        ->orderBy('created_at', 'desc')
                        ->paginate(15);
            
            return view('pages.admin.data-user', compact('users'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat data user: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::where('role', 'user')->findOrFail($id);

            // Prevent deletion of current logged in user
            if (auth()->id() == $user->id) {
                return back()->with('error', 'Anda tidak dapat menghapus akun sendiri');
            }

            // Delete photo if exists
            if ($user->foto && Storage::disk('public')->exists('user/' . $user->foto)) {
                Storage::disk('public')->delete('user/' . $user->foto);
            }

            $user->delete();

            return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
