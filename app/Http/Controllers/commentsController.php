<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class commentsController extends Controller
{
    public function showCreateComment(){
        return view('createComment');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required',
        ]);

        $comment = new Comment();
        $comment->post_id = $request->post_id;
        $comment->body = ucfirst($request->body);
        $comment->user_id = Auth::id(); // Set the authenticated user ID
        $comment->save();
    
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
}