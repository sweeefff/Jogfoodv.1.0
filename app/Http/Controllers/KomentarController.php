<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function komentar()
    {
        return view('pages.komentar');
    }
}
