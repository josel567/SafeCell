<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class loginController extends Controller
{
    public function login (Request $request) {
        // Si el usuario está logeado redirigimos al dashboard
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token Name')->accessToken;
            setcookie("acces_token", $token);

            return view('dashboard');
        } else {
            // Si no está logeado mostramos el login
            return view('login', ['error_message' => 'Usuario o contraseña inválidos.']);
        }


    }
}
