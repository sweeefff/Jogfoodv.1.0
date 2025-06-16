<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->get('kategori', 'Makanan'); // default: Makanan jika tidak ada parameter
        $menu = Menu::where('kategori', $kategori)->get();

        return view('pages.menu', compact('menu', 'kategori'));
    }
    public function beliSekarang(Request $request, $id)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $menu = \App\Models\Menu::findOrFail($id);
        $jumlah = $request->input('jumlah', 1);

        // Buat objek mirip keranjang untuk 1 item saja
        $item = new \stdClass();
        $item->id = $menu->id_menu;
        $item->menu = $menu;
        $item->jumlah = $jumlah;

        $items = collect([$item]);
        $subtotal = $menu->harga * $jumlah;
        $deliveryFee = 10000;
        $tax = 0.1;

        // Simpan ke session checkout
        session([
            'checkout_items' => $items,
            'checkout_total' => $subtotal,
        ]);

        return view('pages.user.metode', [
            'items' => $items,
            'total' => $subtotal,
            'deliveryFee' => $deliveryFee,
            'tax' => $tax,
        ]);
    }
}
