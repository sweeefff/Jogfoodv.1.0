<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topMenus = \App\Models\Menu::withCount([
                'ratings as avg_rating' => function($q) {
                    $q->select(\DB::raw('coalesce(avg(rating),0)'));
                },
                'ratings as total_ulasan'
            ])
            ->where('kategori', 'makanan') // Tambahkan filter kategori makanan
            ->orderByDesc('avg_rating')
            ->limit(5)
            ->get();

        // Ambil 1 minuman terbaik
        $topDrink = \App\Models\Menu::withCount([
                'ratings as avg_rating' => function($q) {
                    $q->select(\DB::raw('coalesce(avg(rating),0)'));
                },
                'ratings as total_ulasan'
            ])
            ->where('kategori', 'minuman')
            ->orderByDesc('avg_rating')
            ->first();

        // Ambil 1 side dish terbaik
        $topSideDish = \App\Models\Menu::withCount([
                'ratings as avg_rating' => function($q) {
                    $q->select(\DB::raw('coalesce(avg(rating),0)'));
                },
                'ratings as total_ulasan'
            ])
            ->where('kategori', 'side dish')
            ->orderByDesc('avg_rating')
            ->first();

        return view('pages.home', compact('topMenus', 'topDrink', 'topSideDish'));
    }
}
