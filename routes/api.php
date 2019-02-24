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

Route::post('location/store', 'Api\LocationController@saveLocation');

