<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class DetailController extends Controller
{
    public function detail($id)
    {
        $menu = Menu::findOrFail($id);
        return view('pages.detail', compact('menu'));
    }
}