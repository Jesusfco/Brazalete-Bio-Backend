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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/resetPassword', 'VisitorController@resetPassword');
Route::post('/resetPassword', 'VisitorController@sentTokenReset');

Route::get('/resetPassword/{token}', 'VisitorController@resetPassword2');
Route::post('/resetPassword/{token}', 'VisitorController@updatePassword');