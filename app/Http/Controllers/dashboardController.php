<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class dashboardController extends Controller
{
    public function showDashboard()
    {
        $posts = Post::with(['user', 'comments'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(5);
    
        return view('dashboard', compact('posts'));
    }
    
    
}
