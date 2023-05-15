<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Post;
    
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
        
            $post = new Post;
            $post->title = $request->title;
            $post->body = $request->body;
        
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('uploads', $filename);
                $post->file = $filename;
            }
        
            $post->save();
        
            return redirect()->route('createPost')->with('success', 'Post created successfully.');
        }
        
    }