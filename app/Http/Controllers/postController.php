<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\HarmfulWord;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;



class postController extends Controller
{
    public function showCreatePost()
    {
        $tags = Tag::all();
        return view('createPost', compact('tags'));
        // return view('createPost');
    }

    public function store(Request $request){

        try {
            $validator = Validator::make($request->all(), [
                'title' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $harmfulWords = HarmfulWord::pluck('word')->toArray();
        
                        foreach ($harmfulWords as $word) {
                            if (Str::contains($value, $word)) {
                                $fail('Please use proper language in your title.');
                                break;
                            }
                        }
                    },
                ],
                'body' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        $harmfulWords = HarmfulWord::pluck('word')->toArray();
        
                        foreach ($harmfulWords as $word) {
                            if (Str::contains($value, $word)) {
                                $fail('Please use proper language in your body.');
                                break;
                            }
                        }
                    },
                ],
                'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);
        
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }
           
            // Validation passed, proceed to submit the post
        
            // Code to submit the post goes here
        
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
    Log::info('New post created', ['post_id' => $post->id, 'title' => $post->title]);


    // if ($request->has('tags')) {
    //     $post = new Post;
    //     $post->tags()->attach($request->tags);
    // }

    $posts = Post::latest()->paginate(2); // Fetch 10 posts per page

    

    return view('dashboard', ['posts' => $posts])->with('success', 'Post created successfully.');
        

    
        } catch (ValidationException $exception) {
            $message = 'Post could not be submitted: ' . $exception->getMessage();
        
            // Redirect back with the errors
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
    

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
public function edit(Post $post)
{
    // Check if the authenticated user is the owner of the post
    if (auth()->user()->id !== $post->user_id) {
        abort(403, 'Unauthorized');
    }

    return view('editPost', compact('post'));
}

public function update(Request $request, Post $post)
{
    // Check if the authenticated user is the owner of the post
    if (auth()->user()->id !== $post->user_id) {
        abort(403, 'Unauthorized');
    }

    try {
        $validator = Validator::make($request->all(), [
            'title' => [
                'required',
                function ($attribute, $value, $fail) {
                    $harmfulWords = HarmfulWord::pluck('word')->toArray();

                    foreach ($harmfulWords as $word) {
                        if (Str::contains($value, $word)) {
                            $fail('Please use proper language in your title.');
                            break;
                        }
                    }
                },
            ],
            'body' => [
                'required',
                function ($attribute, $value, $fail) {
                    $harmfulWords = HarmfulWord::pluck('word')->toArray();

                    foreach ($harmfulWords as $word) {
                        if (Str::contains($value, $word)) {
                            $fail('Please use proper language in your body.');
                            break;
                        }
                    }
                },
            ],
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $post->title = ucfirst($request->title);
        $post->body = ucfirst($request->body);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
            $post->file = $filename;
        }

        $post->save();
        Log::info('Post edited', ['post_id' => $post->id, 'title' => $post->title]);


        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    } catch (ValidationException $exception) {
        $message = 'Post could not be updated: ' . $exception->getMessage();

        // Redirect back with the errors
        return redirect()->back()->withErrors($validator)->withInput();
    }
}

}
