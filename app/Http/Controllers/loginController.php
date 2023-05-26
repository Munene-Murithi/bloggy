<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class loginController extends Controller
{
    //
        public function showLogin(){
        // show register page
        return view('login');

    }

    public function authenticate(Request $request): RedirectResponse{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);

    $user = User::where('email', '=', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        $request->session()->put('email', $user->email);
        Auth::login($user);

        return redirect("dashboard");
    } else {
        return redirect('login')->withInput($request->only('email'))->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    }



 
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
 
        //     return redirect('/home');
        // }
 
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');
    }
}