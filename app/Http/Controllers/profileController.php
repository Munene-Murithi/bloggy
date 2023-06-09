<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;


class ProfileController extends Controller
{
    public function showProfile()
    {
        $posts = Post::where('user_id', Auth::id())->paginate(1);

        return view('profile', compact('posts'));
        // return view("profile");
    }
    
    public function updatePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the uploaded file
        $profilePhoto = $request->file('profile_photo');

        // Generate a unique file name
        $fileName = time() . '_' . uniqid() . '.' . $profilePhoto->getClientOriginalExtension();

        // Define the storage path
        $storagePath = 'storage/uploads/';

        // Move the uploaded file to the storage directory
        $profilePhoto->move(public_path($storagePath), $fileName);

        // Update the profile photo path in the user model
        Auth::user()->update([
            'profile_photo' => $fileName,
        ]);

        return redirect()->back()->with('success', 'Profile photo uploaded successfully.');
    }


}
