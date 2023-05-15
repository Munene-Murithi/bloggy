<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class aboutUsController extends Controller
{
    public function showAbout(){
        return view ('aboutUs');
    }
}
