<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Estas son las rutas de la web

// Estas son las rutas que no necesitan autenticación
Route::get('/', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
});

Route::post('/login', 'loginController@login');
Route::post('/register', 'registerController@register');

// Estas rutas requieren de autenticación
Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', 'dashboardController@index');
    Route::get('/adddevice', 'dashboardController@showAddDevice');
    Route::post('/adddevice', 'dashboardController@addDevice');
    Route::get('/deleteDevice/{id}', 'dashboardController@deleteDevice');
    Route::get('/device/{id}', 'dashboardController@showDeviceDetails');
    Route::get('/addservice/{id}', 'dashboardController@showAddService');
    Route::get('/logout', 'loginController@logout');
    Route::post('/addService', 'dashboardController@addService');
    Route::get('/deleteService/{device_id}/{service_name}', 'dashboardController@deleteService');
    Route::get('/ayuda','dashboardController@ayuda');
    Route::get('/enConstruccion','dashboardController@enConstruccion');
    Route::get('/nosotros','dashboardController@nosotros');

});
