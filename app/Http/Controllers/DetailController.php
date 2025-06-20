<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DetailController extends Controller
{
    public function detail($id)
    {
        $menu = Menu::findOrFail($id);
        $ratings = \App\Models\Ratings::with('user')->where('id_menu', $id)->latest()->get();
        $avgRating = \App\Models\Ratings::where('id_menu', $id)->avg('rating');
        return view('pages.detail', compact('menu', 'ratings', 'avgRating'));
    }
}