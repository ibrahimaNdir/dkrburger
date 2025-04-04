<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

{

    public  function logout(){
        Auth::logout();
        return to_route('auth.login');

    }
    public function login(){
        return view('auth.login');
    }

    public function dologin ( Request $request){

        $credentials =   $request->validate(
            [
                'email' => 'required|email',
                'password' => 'min:4|max:255',

            ]
        );
        if (Auth::attempt($credentials)) {   //si la connexion passe
            $request->session()->regenerate();

            return redirect()->intended('admin/produits');
        }
        return to_route('auth.login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The pro  vided credentials do not match our records.',
        ]);

    }
    //
}
