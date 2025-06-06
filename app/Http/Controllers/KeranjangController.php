<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $userId = session('user_id');
        $items = Keranjang::with('menu')
            ->where('id_user', $userId)
            ->get();

        return view('pages.user.keranjang', compact('items'));
    }

    public function store($id)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $userId = session('user_id');

        $item = Keranjang::where('id_user', $userId)
            ->where('id_menu', $id)
            ->first();

        if ($item) {
            $item->increment('jumlah');
        } else {
            Keranjang::create([
                'id_user' => $userId,
                'id_menu' => $id,
                'jumlah' => 1,
            ]);
        }
        session()->flash('success', 'Produk ditambahkan ke keranjang');
        return redirect()->back();

    }

    public function remove($idKeranjang)
    {
        $item = Keranjang::findOrFail($idKeranjang);
        if ($item->id_user === session('user_id')) {
            $item->delete();
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk dihapus dari keranjang');
    }
}

