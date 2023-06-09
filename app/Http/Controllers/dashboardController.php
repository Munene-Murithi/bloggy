<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class dashboardController extends Controller
{
    public function showDashboard()
    {
        $posts = Post::with(['user', 'comments'])
                     ->orderBy('created_at', 'desc')
                     ->paginate(2);
                    //  Log::channel('slack')->info('Hello world from larablog');
                    $tags = Tag::all();

    
        return view('dashboard', compact('posts', 'tags'));
    }
    
    
}
