<?php

namespace App\Http\Controllers;

use App\Device;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Controla las acciones relacionadas con los servicios
class ServiceController extends Controller
{
    // Añade un servicio a un dispositivo
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
            ->first();

       if (!empty($serviceAlreadyAdded)) {
            return response()->json([
                'message' => "Ese servicio ya está asociado al dispositivo.",
            ], 400);
        }
        try {
           // Asocia el servicio a un dispositivo y añade el estado
            $device->services()->attach($service->id, ['is_active'=>$params['is_active']]);
            return response()->json([
                'message' => "Servicio añadido correctamente.",
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    // Actualiza un servicio
    public function update (Request $request) {
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

        if (empty($serviceAlreadyAdded)) {
            return response()->json([
                'message' => "Este servicio no está asociado al dispositivo.",
            ], 400);
        }
        try {
            $device->services()->updateExistingPivot($service->id, ['is_active'=>$params['is_active']]);
            return response()->json([
                'message' => "Servicio actualizado correctamente.",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }

    }

    // Borrar un servicio
    public function delete (Request $request) {
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

        if (empty($serviceAlreadyAdded)) {
            return response()->json([
                'message' => "Este servicio no está asociado al dispositivo.",
            ], 400);
        }
        try {
            $device->services()->detach($service->id);
            return response()->json([
                'message' => "Servicio eliminado correctamente.",
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 400);
        }
    }

    // Coge los estados de los servicios
    public function getStatuses ($id) {
        $user = Auth::user();
        $device = Device::where('id', $id)->first();

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

        $services = $device->services;

        $services_statuses = [];

        foreach ($services as $service) {
            array_push($services_statuses, [
                "name" => $service->name,
                "status" => $service->pivot->is_active
            ]);
        }

        if(sizeof($services_statuses) == 0) {
            return response()->json([
                'message' => 'No hay servicios activos para este dispositivo.',
            ], 200);
        } else {
            return response()->json([
                'services' => $services_statuses,
            ], 200);
        }
    }
}
