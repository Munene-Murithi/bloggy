<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewPostController extends Controller
{
    public function showPost(){
        return view ('viewPost');
    }
}
