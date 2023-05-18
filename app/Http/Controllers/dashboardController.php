<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class dashboardController extends Controller
{
    public function showDashboard()
    {
        $posts = Post::with('comments')->get();
        

        return view('dashboard', compact('posts'));
        
        $posts = Post::with('user')->get();

        return view('dashboard', compact('posts'));

    }
}
