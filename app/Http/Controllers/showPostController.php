<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class showPostController extends Controller
{
   
    public function showSinglePost(){

        return view('singlePost');
    }
    public function show($id)
{
    $post = Post::findOrFail($id);
    return view('singlePost', compact('post'));
}

}
