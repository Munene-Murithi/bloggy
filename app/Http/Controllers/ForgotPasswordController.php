<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Password;
    use Illuminate\Support\Facades\Hash;



    class ForgotPasswordController extends Controller
    {
        public function showLinkRequestForm()
        {
            return view('email');
        }

        protected function broker()
        {
            return Password::broker();
        }

        public function showResetForm(Request $request, $token)
        {
            return view('reset')->with(
                ['token' => $token, 'email' => $request->email]
            );
        }

        public function sendResetLinkEmail(Request $request)
        {
            $request->validate(['email' => 'required|email']);

            $response = $this->broker()->sendResetLink(
                $request->only('email')
            );

            return $response == Password::RESET_LINK_SENT
                ? back()->with('status', 'We have emailed your password reset link!')
                : back()->withErrors(['email' => __($response)]);
        }
        public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $response = $this->broker()->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        }
    );

    return $response == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', 'Your password has been reset!')
        : back()->withErrors(['email' => [__($response)]]);
}

    }
