<?php
use Illuminate\Http\Request;

// Estas son las rutas de la api
// Todas estas rutas tienen el prefijo '/api'

// Ruta de bienvenida
Route::get('/', function(){
    return response()->json(['WelcomeMessage' => 'Welcome to SafeCell API.']);
});

// Ruta de registro y login
// Estas rutas tienen el prefijo '/auth'
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});

// Estas rutas pasan a través del middleware => auth:api, y se ejecutan tras la comprobación de la autenticación
Route::group(['middleware' => 'auth:api'], function() {

    // Rutas relacionadas con el usuario
    Route::group(['prefix' => 'user'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('getAll', 'AuthController@user');
        Route::patch('updateUser', 'AuthController@updateUser');
        Route::delete('deleteUser', 'AuthController@deleteUser');
    });

    // Rutas relacionadas con los dispositivos
    Route::group(['prefix' => 'device'], function () {
        Route::post('add', 'DeviceController@add');
        Route::patch('update/{id}', 'DeviceController@update');
        Route::delete('remove/{id}', 'DeviceController@remove');
        Route::get('all', 'DeviceController@getAll');
        Route::patch('updateDeviceFcmToken', 'DeviceController@updateDeviceFcmToken');
        Route::post('updateDeviceLocation', 'DeviceController@updateDeviceLocation');
        Route::get('getDeviceLocation/{id}', 'DeviceController@getDeviceLocation');
        Route::get('getDeviceIdByImei/{imei}', 'DeviceController@getDeviceIdByImei');
    });

    // Rutas relacionadas con los servicios
    Route::group(['prefix' => 'service'], function () {
        Route::post('add', 'ServiceController@add');
        Route::patch('update', 'ServiceController@update');
        Route::delete('delete', 'ServiceController@delete');
        Route::get('getStatuses/{id}', 'ServiceController@getStatuses');
    });

});

