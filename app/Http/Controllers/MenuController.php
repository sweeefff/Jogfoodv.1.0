<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori'); // Tidak ada default 'Makanan'

        $menu = Menu::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%");
            })
            ->when($kategori, function ($query, $kategori) {
                $query->where('kategori', $kategori);
            })
            ->paginate(9);

        return view('pages.menu', compact('menu', 'search', 'kategori'));
    }

    // ⚡ Live search (AJAX)
    public function search(Request $request)
    {
        $q = $request->input('query'); // AJAX pakai "query"

        $results = Menu::query()
            ->where(function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%");
            })
            ->get();

        // Kembalikan view partial komponen kartu (HTML)
        return view('components.card.search-results', compact('results'));
    }
    public function beliSekarang(Request $request, $id)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $menu = Menu::findOrFail($id);
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
