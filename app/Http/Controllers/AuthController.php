<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public  function logout(){
        Auth::logout();
        return to_route('auth.login');

    }
    public function login(){
        return view('auth.login');
    }

    public function dologin (Request $request){

        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {   //si la connexion passe
            $request->session()->regenerate();

            return redirect()->intended('');
        }
        return to_route('auth.login')->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'The pro  vided credentials do not match our records.',
        ]);

    }
}
