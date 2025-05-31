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
}
