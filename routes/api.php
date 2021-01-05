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


Route::post('register','ApiAuthController@register');
Route::post('login','ApiAuthController@login');


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::post('logout','ApiAuthController@logout');
    
    Route::get('tasks', 'ApiTaskController@index');
    Route::get('tasks/{id}', 'ApiTaskController@show');
    Route::post('tasks', 'ApiTaskController@store');
    Route::put('tasks/{id}', 'ApiTaskController@update');
    Route::delete('tasks/{id}', 'ApiTaskController@destroy');
});
