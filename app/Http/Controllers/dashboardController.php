<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

// Controla la lógica del panel de administración de la web
class dashboardController extends Controller
{
    // Constructor
    public function  __construct()
    {
        // Obtiene el token de las cookies
        $this->acces_token = $_COOKIE["acces_token"];
        $this->base_uri = "";
        // Se establece la url de la api según el entorno de trabajo
        if (env('APP_ENV') == "local") {
            $this->base_uri = "http://dev.safecell/api";
        } else {
            $this->base_uri = "https://safe-cell.herokuapp.com/api";
        }
    }

    // Renderiza la página principal de la web y muestra todos los dispositivos del usuario
    public function index (Request $request) {
        $user = Auth::user();

        // Inicio de la petición a la api
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
        // Fin de la petición

        // Forzamos el valor null, si está por defecto, a valor 0
        if (!isset($devices['devices'])) {
            $devices['devices'] = 0;
        }

        // Devuelve la vista del menú con los datos correspondientes
        return view ('dashboard', ['data' => [
            'user' => $user,
            'devices' => $devices['devices']
        ]]);
    }

    // Muestra el formulario de añadir dispositivo
    public function showAddDevice () {
        $user = Auth::user();
        return view('adddevice', [
                'data' => [
                'user' => $user
            ]
        ]);
    }

    // Añade un dispositivo
    public function addDevice(Request $request) {
        $params = $request->all();
        $user = Auth::user();

        // Inicio de la petición a la api
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
            // Realiza la llamada al metodo deviceController@add
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
        // Fin de la petición

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

    // Borra un dispositivo
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

    // Muestra los detalles de dispositivo
    public function showDeviceDetails ($id) {
        $device = Device::find($id);
        $user = auth::user();

        // Inicio de la petición a la api
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
        // Fin de la peticion

        return view('device', [
           "data" => [
               "user" => $user,
               "device" => $device,
               "serviceStatuses" => $serviceStatuses
           ]
        ]);

    }

    // Muestra añadir servicio
    public function showAddService ($device_id) {
        $user = Auth::user();

        return view('addservice', [
           "data" => [
               "device_id" => $device_id,
               "user" => $user
           ]
        ]);
    }

    // Añade servicio
    public function addService (Request $request) {
        $user = Auth::user();
        $params = $request->all();

        // Inicio de la petición
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
        // Final de la petición

        return view('addservice', [
            "data" => [
                "message" => $response['message'],
                "device_id" => $params['device_id'],
                "user" => $user
            ]
        ]);
    }

    // Borrar servicio
    public function deleteService($device_id, $service_name) {

        // Inicio de la petición
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
        // Fin de la petición

        return redirect('/device/' . $device_id);
    }

    // Muestra enConstruccion
    public function enConstruccion () {
        $user = Auth::user();
        return view('enConstruccion',[
            'data' => [
                'user' => $user
            ]
        ]);
    }

    // Muestra ayuda
    public function ayuda () {
        $user = Auth::user();
        return view('ayuda',[
            'data' => [
                'user' => $user
            ]
        ]);
    }

    // Muestra nosotros
    public function nosotros () {
        $user = Auth::user();
        return view('nosotros',[
            'data' => [
                'user' => $user
            ]
        ]);
    }

}
