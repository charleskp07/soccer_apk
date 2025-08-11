<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request) {
        if (Auth::attempt([
            'email'=> $request->email,
            'password'=> $request->password,
        ])) {
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                'error'=>'E-mail ou mot de passe invalides.',
            ])->withInput();
        }
        
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
