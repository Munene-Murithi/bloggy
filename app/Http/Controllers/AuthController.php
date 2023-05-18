<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $remember = $request->input('remember') ? true : false;

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            
            if ($remember) {
                $cookie = cookie('remember', 'true', 60 * 24 * 30);
                return redirect()->intended('/dashboard')->withCookie($cookie);
            }

            //  when "remember" is not checked
            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['message' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        // Destroy the "remember" cookie
        Cookie::queue(Cookie::forget('remember'));

        return redirect('/dashboard');
    }
}
