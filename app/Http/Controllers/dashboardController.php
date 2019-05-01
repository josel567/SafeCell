<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
    public function index (Request $request) {
        $user = Auth::user();

        return view ('dashboard', ['data' => [
            'user' => $user
        ]]);
    }
}
