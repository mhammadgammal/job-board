<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;

class AuthController extends Controller
{
    //

    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request)
    {
        // dd($request->all());
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();
        auth()->guard()->login($user);

        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $creds = $request->only('email', 'password');
        if (auth()->guard()->attempt($creds)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    public function logout()
    {
        auth()->guard()->logout();

        return redirect('/');
    }
}
