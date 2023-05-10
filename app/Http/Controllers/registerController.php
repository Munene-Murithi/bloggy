<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class registerController extends Controller
{
    public function showRegisterPage() {
        return view('register');
    }

    public function store(Request $request):RedirectResponse{

        $validated = $request->validate([
            'name' => 'required|string|max:255|min:3',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|numeric|min:9 |starts_with : 254,07,01',
            // 'phone' => ['required', "numeric", new validatePhone],
            'password' => ['required','confirmed', Password::min(8)],
            'password_confirmation' => ['required', Password::min(8)]

        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email = $request->phone;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('/home');

    }
    
}
