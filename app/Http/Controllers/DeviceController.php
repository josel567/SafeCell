<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function add(Request $request)
    {
        // Obtenemos los datos de usuario
        $user = Auth::user();
        // Obtenemos los parametros de la request
        $params = $request->all();

        try {
            $device = Device::create([
                "user_id" => $user->id,
                "alias" => $params['alias'],
                "imei" => $params['imei'],
                "brand" => $params['brand'],
                "model" => $params['model'],
                "fcm_token" => $params['fcm_token'],
            ]);

            return response()->json([
                'added' => 'OK',
                'device' => $device
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'added' => 'KO',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        // Obtener Id de usuario
        $userId = Auth::user()->id;
        // Obtener parametros de la request
        $params = $request->all();
        // Obtener dispositivo con esta id
        $device= Device::find($id);
        // Comprobamos que el dispositivo sea del usuario que hace la request
        if($device->user_id == $userId) {
            try {
                $device->alias = $params['alias'];
                $device->imei = $params['imei'];
                $device->brand = $params['brand'];
                $device->model = $params['model'];
                $device->save();

                return response()->json([
                    "message" => "Dispositivo actualizado correctamente"
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    "message" => $e->getMessage()
                ], 400);
            }
        } else {
            return response()->json([
                "message" => "Este dispositivo no está vinculado con este usuario"
            ], 403);
        }
    }
}
