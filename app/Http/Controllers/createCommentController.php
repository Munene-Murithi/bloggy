<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class createCommentController extends Controller
{
    public function showCreateComment(){
        return view('createComment');
    }
}
