<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function () {

    Route::post('login', 'Api\AuthController@login');
    Route::post('refresh-token', 'Api\AuthController@refreshToken');

    Route::post('user', 'Api\UsersController@store');
    Route::post('logout', 'Api\AuthController@logout')->middleware('jwt.auth')->name('api/logout');

    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::resource('health-care',
            'Api\HealthCaresController',
            [
                'except' => [
                    'create',
                    'edit'
                ]
            ]
        );
    });


    Route::group(['middleware' => ['jwt.auth', 'tenant']], function () {


        Route::resource('clinic',
            'Api\ClinicsController', ['except' => ['create', 'edit']]);
        Route::resource('clinic-health-care',
            'Api\ClinicHealthCaresController', ['except' => ['create', 'edit']]);
    });

});
