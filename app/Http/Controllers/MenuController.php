<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Ratings;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori');

        $menu = Menu::withCount([
            'ratings as avg_rating' => function ($q) {
                $q->select(DB::raw('coalesce(avg(rating),0)'));
            },
            'ratings as total_ulasan'
        ])
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%");
            })
            ->when($kategori, function ($query, $kategori) {
                $query->where('kategori', $kategori);
            })
            ->orderByDesc('avg_rating')
            ->paginate(9);

        return view('pages.menu', compact('menu', 'search', 'kategori'));
    }

    public function search(Request $request)
    {
        $q = $request->input('query');

        $results = Menu::query()
            ->where(function ($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%");
            })
            ->get();

        return view('components.card.search-results', compact('results'));
    }
    public function beliSekarang(Request $request, $id)
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }

        $menu = Menu::findOrFail($id);
        $jumlah = $request->input('jumlah', 1);

        $item = new \stdClass();
        $item->id = $menu->id_menu;
        $item->menu = $menu;
        $item->jumlah = $jumlah;

        $items = collect([$item]);
        $subtotal = $menu->harga * $jumlah;
        $deliveryFee = 10000;
        $tax = 0.1;
        
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
