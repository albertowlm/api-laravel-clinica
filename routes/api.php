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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', 'Api\AuthController@login');
Route::post('refresh-token', 'Api\AuthController@refreshToken');

Route::post('user','Api\UsersController@store');

Route::group(['middleware' => ['jwt.auth','tenant'] ], function (){
   Route::post('logout', 'Api\AuthController@logout');
   Route::resource('health-care',
       'Api\HealthCaresController',['except' => ['create','edit']]);
    Route::resource('clinic',
        'Api\ClinicsController',['except' => ['create','edit']]);
    Route::resource('clinic-health-care',
        'Api\ClinicHealthCaresController',['except' => ['create','edit']]);
});