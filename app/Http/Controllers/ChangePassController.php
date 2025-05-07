<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangePassController extends Controller
{
    public function changepass()
    {
        return view('pages/changepass');
    }
}
