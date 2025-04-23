<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        return view('pages/data');
    }
}
