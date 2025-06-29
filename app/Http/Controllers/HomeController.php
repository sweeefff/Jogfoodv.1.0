<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $topMenus = \App\Models\Menu::withCount([
            'ratings as avg_rating' => function ($q) {
                $q->select(\DB::raw('coalesce(avg(rating),0)'));
            },
            'ratings as total_ulasan'
        ])
            ->orderByDesc('avg_rating')
            ->limit(5)
            ->get();

        return view('pages.home', compact('topMenus'));
    }
}
