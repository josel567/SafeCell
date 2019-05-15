<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
// Controla las acciones relacionadas con el login y logout
class loginController extends Controller
{
    public function login (Request $request) {
        // Si el usuario está logeado redirigimos al dashboard
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Token Name')->accessToken;
            setcookie("acces_token", $token);

            return redirect()->action('dashboardController@index');
        } else {
            // Si no está logeado mostramos el login
            return view('login', ['info_message' => 'Usuario o contraseña inválidos.']);
        }

    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}
