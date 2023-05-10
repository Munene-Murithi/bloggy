<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class loginController extends Controller
{
    public function showLogin(){
        return view('login');
    }

    public function login(Request $request)
{
    // Validate the user's login credentials
    $validated = $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);
    
}

}
