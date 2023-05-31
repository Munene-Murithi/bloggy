<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

use Session;

class LoginController extends Controller
{
    public function showLogin()
    {
        // show register page
        return view('login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', '=', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $request->session()->put('email', $user->email);
            Auth::login($user);

            // Log successful login to Slack
            Log::channel('slack')->info("Successful login: $user->email");

            return redirect("dashboard");
        } else {
            // Log failed login to Slack
            Log::channel('slack')->warning("Failed login attempt: $credentials[email]");

            return redirect('login')->withInput($request->only('email'))->withErrors([
                'email' => 'Invalid email or password.',
            ]);
        }
    }
}
