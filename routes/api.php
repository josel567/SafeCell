<?php

use Illuminate\Http\Request;

Route::get('/', function(){
    return response()->json(['WelcomeMessage' => 'Welcome to SafeCell API.']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
});

Route::group(['middleware' => 'auth:api'], function() {

    Route::group(['prefix' => 'user'], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('getAll', 'AuthController@user');
        Route::patch('updateUser', 'AuthController@updateUser');
    });

    Route::group(['prefix' => 'device'], function () {
        Route::post('add', 'DeviceController@add');
        Route::patch('update/{id}', 'DeviceController@update');
        Route::delete('remove/{id}', 'DeviceController@remove');
        Route::get('all', 'DeviceController@getAll');
        Route::patch('updateDeviceFcmToken', 'DeviceController@updateDeviceFcmToken');
    });

    Route::group(['prefix' => 'service'], function () {
        Route::post('add', 'ServiceController@add');
        Route::patch('update', 'ServiceController@update');
        Route::delete('delete', 'ServiceController@delete');
    });

});

