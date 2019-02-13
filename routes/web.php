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
    return redirect('login');    return view('welcome');
});

Route::get('/login', 'VisitorController@login');
Route::post('/login', 'VisitorController@signin');
Route::get('/logout', 'VisitorController@logout');

Route::get('/resetPassword', 'VisitorController@resetPassword');
Route::post('/resetPassword', 'VisitorController@sentTokenReset');

Route::get('/resetPassword/{token}', 'VisitorController@resetPassword2');
Route::post('/resetPassword/{token}', 'VisitorController@updatePassword');

Route::get('/app', 'VisitorController@redirectAnalisis');

Route::namespace('Admin')->group(function () {

    Route::prefix('app/usuarios')->group(function () {
        
        Route::get('/', 'UsersController@list');
        Route::get('crear', 'UsersController@create');
        Route::post('crear', 'UsersController@store');
        Route::get('destroy/{id}', 'UsersController@destroy');
        Route::get('editar/{id}', 'UsersController@edit');
        Route::post('editar/{id}', 'UsersController@update');

    });
    
    Route::prefix('app/asosiaciones')->group(function () {
        
        Route::get('/', 'UserAssosiationsController@list');
        Route::get('/sugest', 'UserAssosiationsController@sugest');
        Route::get('crear/{id}', 'UserAssosiationsController@create');
        Route::post('crear/{id}', 'UserAssosiationsController@store');
        Route::get('destroy/{id}', 'UserAssosiationsController@destroy');        
        
    });

});