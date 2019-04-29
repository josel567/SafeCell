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
            $device = Device::where('imei', $params['imei'])->orWhere('fcm_token', $params['fcm_token'])->first();
            if ($device != null) {
                return response()->json([
                    'added' => 'KO',
                    'message' => "Ya existe un dispositivo con este Imei o token"
                ]);
            }
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
                "message" => "No hay un dispositivo asociado a tu cuenta con esta id."
            ], 403);
        }
    }

    public function remove($id)
    {
        // Obtener Id de usuario
        $userId = Auth::user()->id;
        // Obtener dispositivo con esta id
        $device = Device::find($id);
        // Comprobamos que el dispositivo sea del usuario que hace la request
        if($device->user_id == $userId) {
            try {
                $device->delete();
                return response()->json([
                    "message" => "Dispositivo eliminado correctamente"
                ], 200);
            } catch (\Exception $e) {
                return response()->json([
                    "message" => $e->getMessage()
                ], 400);
            }
        } else {
            return response()->json([
                "message" => "No hay un dispositivo asociado a tu cuenta con esta id."
            ], 403);
        }
    }

    public function getAll(Request $request)
    {
        // Obtener Id de usuario
        $userId = Auth::user()->id;
        try {
            $devices = Device::where('user_id', $userId)->get();
            if (sizeof($devices) == 0) {
                return response()->json([
                    "message" => "Aún no dispones de ningún dispositivo asociado a este usuario."
                ], 200);
            }
            return response()->json([
                "devices" => $devices
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    public function updateDeviceFcmToken(Request $request)
    {
        // Obtenemos los parametros de la request
        $params = $request->all();
        $user = Auth::user();


        $device = Device::where('id' , $params['device_id'])->where('user_id', $user->id)->first();

        try {
            if(!empty($device)) {
                $device->fcm_token = $params['fcm_token'];
                $device->save();
                return response()->json([
                    'updated' => 'OK',
                    'new_device_fcm_token' => $device->fcm_token
                ]);
            } else {
                return response()->json([
                    'updated' => 'KO',
                    'message' => "El dispositivo no existe."
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'updated' => 'KO',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
