<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating()
    {
        return view('pages/rating');
    }
}
