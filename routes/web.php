<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('', 'Web\LoginController@index');




Route::group(['prefix' => 'clinic'], function (){
    Route::get('', 'Web\ClinicsController@index')->name('clinic/list');
    Route::get('store', 'Web\ClinicsController@store')->name('clinic/store');
    Route::get('update', 'Web\ClinicsController@update')->name('clinic/update');

});
Route::group(['prefix' => 'health-care'], function (){
    Route::get('', 'Web\HealthCaresController@index')->name('health-care/list');
    Route::get('store', 'Web\HealthCaresController@store')->name('health-care/store');
    Route::get('update', 'Web\HealthCaresController@update')->name('health-care/update');

});
Route::group(['prefix' => 'clinic-health-care'], function (){
    Route::get('', 'Web\ClinicHealthCaresController@index')->name('clinic-health-care/list');
    Route::get('store', 'Web\ClinicHealthCaresController@store')->name('clinic-health-care/store');
});


Route::group(['prefix' => 'login'], function (){
    Route::get('', 'Web\LoginController@index')->name('login');
    Route::get('/store', 'Web\LoginController@store')->name('login/store');


});
