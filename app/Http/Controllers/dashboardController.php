<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class dashboardController extends Controller
{
    public function index (Request $request) {
        $user = Auth::user();
        $acces_token = $_COOKIE["acces_token"];

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
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $acces_token
            ]
        ]);
        try {
            $response = $client->request('GET', $base_uri . "/device/all");
            // Transform response in object
            $devices = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $devices = json_decode($e->getResponse()->getBody()->getContents());
        }

        return view ('dashboard', ['data' => [
            'user' => $user,
            'devices' => $devices['devices']
        ]]);
    }
}
