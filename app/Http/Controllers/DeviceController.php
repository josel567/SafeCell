<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        $params = $request->all();

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
    }
}
