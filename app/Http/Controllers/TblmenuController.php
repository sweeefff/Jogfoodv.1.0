<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TblmenuController extends Controller
{
    public function tblmenu()
    {
        return view('pages/tblmenu');
    }
}
