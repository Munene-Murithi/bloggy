<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Post;
use App\Models\User;


class postController extends Controller
{
    public function showCreatePost()
    {
        return view('createPost');
    }

    public function store(Request $request){

    $request->validate([
        'title' => 'required',
        'body' => 'required',
        'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
    ]);
    $user = Auth::user();

    $post = new Post;
    $post->title = ucfirst($request->title);
    $post->body = ucfirst($request->body);
    $post->user_id = $user->id;


    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('uploads', $filename, 'public');
        $post->file = $filename;
    }

    $post->save();
    $posts = Post::latest()->paginate(10); // Fetch 10 posts per page

    return view('dashboard', ['posts' => $posts])->with('success', 'Post created successfully.');

    // return redirect()->route('dashboard')->with('success', 'Post created successfully.');
    }
    public function destroy(Post $post)
    {
        // Check if the authenticated user is the owner of the post
        if (auth()->user()->id !== $post->user_id) {
            abort(403, 'Unauthorized');
        }

        $post->delete();
    
        return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
    }
    public function showSinglePost(){

        return view('singlePost');
    }

public function show($id)
{
    $post = Post::findOrFail($id);

    $comments = $post->comments()->paginate(5); // Fetch 10 comments per page

    return view('singlePost', ['post' => $post, 'comments' => $comments]);
}
    
}
