<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    //

    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    public function signup(Request $request) {
        User::create($request->all());
        return redirect('/');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login() {}

    public function logout() {}
}
