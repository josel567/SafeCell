<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class registerController extends Controller
{
    public function register (Request $request) {
        $params = $request->all();
        $base_uri = "";
        if (env('APP_ENV') == "local") {
            $base_uri = "192.168.5.160:8000/api";
        } else {
            $base_uri = "https://safe-cell.herokuapp.com/api";
        }

        $client = new Client([
            'base_uri' => $base_uri,
        ]);

        $response = $client->request('POST', $base_uri . "/auth/signup", [
            'form_params' => [
                "name" => $params['name'],
                "email" => $params['email'],
                "password" => $params['password'],
                "password_confirmation" => $params['password_confirmation']
            ]
        ]);

        dd($response->getBody()->getContents());
    }
}
