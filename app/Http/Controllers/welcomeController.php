<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class welcomeController extends Controller
{
    public function index (Request $request) {
        $user = Auth::user();
        // Si el usuario está logeado redirigimos al dashboard
        if (!empty($user)) {
            return view('dashboard');
        } else {
            // Si no está logeado mostramos el login
            return view('login');
        }


    }
}
