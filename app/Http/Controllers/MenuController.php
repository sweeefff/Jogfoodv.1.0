<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Pagination\LengthAwarePaginator;

class MenuController extends Controller
{
    // 📌 Search biasa (form submit)
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = $request->input('kategori', 'Makanan');

        $menu = Menu::query()
            ->when($search, function ($query, $search) {
                $query->where('nama', 'like', "%{$search}%")
                      ->orWhere('deskripsi_menu', 'like', "%{$search}%");
            })
            ->where('kategori', $kategori)
            ->paginate(9);

        return view('pages.search-menu', compact('menu', 'search', 'kategori'));
    }

    // ⚡ Live search (AJAX)
    public function search(Request $request)
    {
        $q = $request->input('query'); // AJAX pakai "query"
        $kategori = $request->input('kategori', 'Makanan');

        $results = Menu::query()
            ->where('kategori', $kategori)
            ->where(function($query) use ($q) {
                $query->where('nama', 'like', "%{$q}%")
                      ->orWhere('deskripsi_menu', 'like', "%{$q}%");
            })
            ->get();

        // Kembalikan view partial komponen kartu (HTML)
        return view('components.card.search-results', compact('results'));
    }
}
