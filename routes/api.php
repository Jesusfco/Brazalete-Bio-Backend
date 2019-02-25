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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('login', 'Auth\LoginController@loginApi');
Route::post('checkAuth', 'Auth\LoginController@checkToken');

Route::post('sms/saveLocation', 'SMS\SMSController@saveLocation');
Route::get('sms/saveLocation', 'SMS\SMSController@saveLocation');



Route::namespace('Api')->group(function () { 

    Route::prefix('location')->group(function () {

        Route::post('store', 'LocationController@saveLocation');
        Route::post('lastLocation', 'LocationController@getLastLocation');
        Route::post('date', 'LocationController@getLocationByDate');

    });

    Route::prefix('assosiations')->group(function () {
        Route::post('myAssosiations', 'AssosiationsController@getMyAssosiations');
    });

});
