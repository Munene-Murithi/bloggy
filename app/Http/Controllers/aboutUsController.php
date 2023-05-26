<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class aboutUsController extends Controller
{
    public function showAbout(){
        return('hello world');
        // return view ('aboutUs');
    }
}
