<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request)
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

    public function login() {}

    public function logout()
    {
        auth()->guard()->logout();

        return redirect('/');
    }
}
