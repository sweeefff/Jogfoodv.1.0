<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetodeController extends Controller
{
    public function metode(){
        return view('pages/metode');
    }
}
