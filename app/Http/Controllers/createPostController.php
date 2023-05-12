<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class createPostController extends Controller
{
    public function showCreatePost(){
        return view('createPost');
    }
}
