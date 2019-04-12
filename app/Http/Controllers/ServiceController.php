<?php

namespace App\Http\Controllers;

use App\Device;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        // Compruebo si ya existe el servicio para este dispositivo
        $serviceAlreadyAdded = DB::table('device_service')
            ->select('*')
            ->where('device_id', $device->id)
            ->where('service_id', $service->id)
            ->get();

        if (!empty($serviceAlreadyAdded)) {
            return response()->json([
                'message' => "Ese servicio ya está asociado al dispositivo.",
            ], 400);
        }
        try {
            $device->services()->attach($service->id, ['is_active'=>$params['is_active']]);
            return response()->json([
                'message' => "Servicio añadido correctamente.",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

    }
}
