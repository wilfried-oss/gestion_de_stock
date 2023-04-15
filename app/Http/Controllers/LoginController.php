<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function welcome()
    {
        $user = Auth::user();

        return view('welcome', compact('user'));
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function loginPerform(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'email' => 'Adresse email ou mot de passe incorrect',
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
