<?php

namespace App\Http\Controllers;

use App\Device;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    public function add (Request $request) {
        $user = Auth::user();
        $params = $request->all();
        $device = Device::where('id', $params['device_id'])->first();
        $service = Service::where('name', $params['service_name'])->first();

        if (empty($device)) {
            return response()->json([
                'message' => 'No existe un dispositivo con la id proporcionada.',
            ], 400);
        }

        if ($device->user_id != $user->id) {
            return response()->json([
                'message' => 'No existe un dispositivo asociado a tu cuenta de usuario con la id proporcionada.',
            ], 400);
        }

        if (empty($service)) {
            return response()->json([
                'message' => 'No existe un servicio con el nombre proporcionado.',
            ], 400);
        }

        try {
            $device->attach([$service => ['status'=>$params['status']]]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

    }
}
