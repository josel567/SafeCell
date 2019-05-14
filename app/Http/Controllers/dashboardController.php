<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class dashboardController extends Controller
{
    public function  __construct()
    {
        $this->acces_token = $_COOKIE["acces_token"];
        $this->base_uri = "";
        if (env('APP_ENV') == "local") {
            $this->base_uri = "http://dev.safecell/api";
        } else {
            $this->base_uri = "https://safe-cell.herokuapp.com/api";
        }
    }

    public function index (Request $request) {
        $user = Auth::user();

        $client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $this->acces_token
            ]
        ]);
        try {
            $response = $client->request('GET', $this->base_uri . "/device/all");
            // Transform response in object
            $devices = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $devices = json_decode($e->getResponse()->getBody()->getContents());
        }

        if (!isset($devices['devices'])) {
            $devices['devices'] = 0;
        }

        return view ('dashboard', ['data' => [
            'user' => $user,
            'devices' => $devices['devices']
        ]]);
    }

    public function showAddDevice () {
        $user = Auth::user();
        return view('adddevice', [
                'data' => [
                'user' => $user
            ]
        ]);
    }

    public function addDevice(Request $request) {
        $params = $request->all();
        $user = Auth::user();

        $client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $this->acces_token
            ]
        ]);
        // Seteando el IMEI
        $imei = "";
        if (isset($params['imei'])) {
            $imei = $params['imei'];
        }
        // Token aleatorio que despues sera substituido por el real
        function generateRandomToken($length = 10) {
            return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }
        $fcm_token = generateRandomToken(10);
        try {
            $response = $client->request('POST', $this->base_uri . "/device/add", [
                'form_params' => [
                    "alias" => $params['alias'],
                    "imei" => $imei,
                    "brand" => $params['brand'],
                    "model" => $params['model'],
                    "fcm_token" => $fcm_token
                ]
            ]);
            // Transform response in object
            $response = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        }

        if ($response['added'] == "OK") {
            return view('adddevice', [
                "data" => [
                    "user" => $user,
                ],
                "success_message" => "Dispositivo añadido correctamente!"
            ]);
        } else {
            return view('adddevice', [
                "data" => [
                    "user" => $user,
                ],
                "error_message" => "Error al añadir dispositivo."
            ]);
        }

    }

    public function deleteDevice ($id) {

        $client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $this->acces_token
            ]
        ]);
        try {
            $response = $client->request('DELETE', $this->base_uri . "/device/remove/" . $id);
            // Transform response in object
            $response = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        }

        return redirect('/dashboard');
    }

    public function showDeviceDetails ($id) {
        $device = Device::find($id);
        $user = auth::user();

        $client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $this->acces_token
            ]
        ]);
        try {
            $response = $client->request('GET', $this->base_uri . "/service/getStatuses/". $device->id);
            // Transform response in object
            $serviceStatuses = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $serviceStatuses = json_decode($e->getResponse()->getBody()->getContents());
        }

        return view('device', [
           "data" => [
               "user" => $user,
               "device" => $device,
               "serviceStatuses" => $serviceStatuses
           ]
        ]);

    }

    public function showAddService ($device_id) {
        $user = Auth::user();

        return view('addservice', [
           "data" => [
               "device_id" => $device_id,
               "user" => $user
           ]
        ]);
    }

    public function addService (Request $request) {
        $user = Auth::user();
        $params = $request->all();
        $client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $this->acces_token
            ]
        ]);
        try {
            $response = $client->request('POST', $this->base_uri . "/service/add", [
                'form_params' => [
                    "device_id" => $params['device_id'],
                    "service_name" => $params['service_name'],
                    "is_active" => $params['is_active']
                ]
            ]);
            // Transform response in object
            $response = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents(), true);
        }
        return view('addservice', [
            "data" => [
                "message" => $response['message'],
                "device_id" => $params['device_id'],
                "user" => $user
            ]
        ]);
    }

    public function deleteService($device_id, $service_name) {

        $client = new Client([
            'base_uri' => $this->base_uri,
            'headers' => [
                'Content-Type' => 'application/json',
                'X-Requested-With' => 'XMLHttpRequest',
                'Authorization' => 'Bearer ' . $this->acces_token
            ]
        ]);
        try {
            $response = $client->request('DELETE', $this->base_uri . "/service/delete", [
                'form_params' => [
                    "device_id" => $device_id,
                    "service_name" => $service_name
                ]
            ]);
            // Transform response in object
            $response = json_decode($response->getBody()->getContents(), true);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        }

        return redirect('/device/' . $device_id);
    }
    public function enConstruccion () {
        $user = Auth::user();
        return view('enConstruccion',[
            'data' => [
                'user' => $user
            ]
        ]);
    }

    public function ayuda () {
        $user = Auth::user();
        return view('ayuda',[
            'data' => [
                'user' => $user
            ]
        ]);
    }
    public function nosotros () {
        $user = Auth::user();
        return view('nosotros',[
            'data' => [
                'user' => $user
            ]
        ]);
    }

}
