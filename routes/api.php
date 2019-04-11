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
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');
    Route::group(['prefix' => 'device'], function () {
        Route::post('add', 'DeviceController@add');
        Route::patch('update/{id}', 'DeviceController@update');
        Route::delete('remove/{id}', 'DeviceController@remove');
        Route::get('all', 'DeviceController@getAll');
    });
});

