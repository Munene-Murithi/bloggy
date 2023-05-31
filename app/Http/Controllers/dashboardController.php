<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Post;
use App\Models\Comment;


class dashboardController extends Controller
{
    public function showDashboard()
    {
        $posts = Post::with(['user', 'comments'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(2);
                    //  Log::channel('slack')->info('Hello world from larablog');

    
        return view('dashboard', compact('posts'));
    }
    
    
}
