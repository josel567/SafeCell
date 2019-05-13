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
            $base_uri = "http://dev.safecell/api";
        } else {
            $base_uri = "https://safe-cell.herokuapp.com/api";
        }
        $client = new Client([
            'base_uri' => $base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest'
            ]
        ]);
        try {
            $response = $client->request('POST', $base_uri . "/auth/signup", [
                'form_params' => [
                    "name" => $params['name'],
                    "email" => $params['email'],
                    "password" => $params['password'],
                    "password_confirmation" => $params['password_confirmation']
                ]
            ]);
            // Transform response in object
            $response = json_decode($response->getBody()->getContents());


        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        }


        if ($response->message == "Successfully created user!") {
            // Registro OK
            return view('register', ['success_message' => 'Cuenta creada correctamente. Ya puedes iniciar sesión.']);
        } else {
            // Registro KO
            return view('register', ['error_message' => 'Error al crear la cuenta. Revisa los datos.']);
        }
    }
}
