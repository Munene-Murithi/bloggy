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
    public function destroy(Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment
        if (auth()->user()->id !== $comment->user_id) {
            abort(403, 'Unauthorized');
        }

        // Delete the comment
        $comment->delete();

        // Redirect or return a response as desired
        return redirect()->back()->with('success', 'Comment deleted successfully.');

    }
    public function edit(Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment
        if (auth()->user()->id !== $comment->user_id) {
            abort(403, 'Unauthorized');
        }

        return view('editComment', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
{
    // Check if the authenticated user is the owner of the comment
    if (auth()->user()->id !== $comment->user_id) {
        abort(403, 'Unauthorized');
    }

    $request->validate([
        'body' => 'required',
    ]);

    $comment->body = ucfirst($request->body);
    $comment->save();

    $postId = $comment->post->id; // Get the ID of the related post

    return redirect()->route('singlePost', $postId)->with('success', 'Comment updated successfully.');
}


}