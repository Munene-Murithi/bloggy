<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();
        if($posts->count() > 0){

        return response()->json([
            'status' => 200,
            'Posts' => $posts
        ], 200);
    }else{
        return response()->json([
            'status' => 404,
            'Server response' => 'No posts found.'
        ], 404);
    }
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:20',
            'body' => 'required|max:255',
            'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
        if($validator->fails()){

            return response()->json([
                'status' => 422,
                'Status Message' => $validator->messages()
            ], 422);
        }else{
            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'file' => $request->file
            ]);

            if($post){
                return response()->json([
                    'status' => 200,
                    'message' => 'Post created'
                ], 200);
            }else{
                return response()->json([
                    'status' =>500,
                    'message' => 'something went wrong'
                ], 500);
            }
        }

    }

    public function show($id)
{
    try {
        $post = Post::findOrFail($id);
        return response()->json([
            'data' => $post,
            'message' => 'Post found'
        ], 200);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'Post not found'
        ], 404);
    }
}

public function edit($id){
    
    try {
        $post = Post::findOrFail($id);
        return response()->json([
            'data' => $post,
            'message' => 'Post found'
        ], 200);
    } catch (ModelNotFoundException $e) {
        return response()->json([
            'message' => 'Post not found'
        ], 404);
    }
}

public function update(Request $request, int $id){
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:50',
        'body' => 'required|max:255',
        'file' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048'
    ]);
    if($validator->fails()){

        return response()->json([
            'status' => 422,
            'Status Message' => $validator->messages()
        ], 422);
    }else{
        $post = Post::find($id);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
            'file' => $request->file
        ]);

        if($post){
            return response()->json([
                'status' => 200,
                'message' => 'Post updated'
            ], 200);
        }else{
            return response()->json([
                'status' =>500,
                'message' => 'something went wrong'
            ], 500);
        }
    }
}
public function destroy($id)
{
    $post = Post::find($id);
    
    if ($post) {
        $post->delete();
        
        return response()->json([
            'status' => 200,
            'message' => 'Post deleted successfully'
        ], 200);
    } else {
        return response()->json([
            'status' => 404,
            'message' => 'Post not found'
        ], 404);
    }
}


}
