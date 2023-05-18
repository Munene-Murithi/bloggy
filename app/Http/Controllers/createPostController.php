<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\User;


class createPostController extends Controller
{
    public function showCreatePost()
    {
        return view('createPost');
    }

    public function store(Request $request)
{
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

    return redirect()->route('createPost')->with('success', 'Post created successfully.');
}

}
