<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signIn()
    {
        return view('auth.sign_in');
    }

    public function signUp()
    {
        return view('auth.sign_up');
    }

    public function signOut()
    {
        auth()->logout();

        return back();
    }
}
