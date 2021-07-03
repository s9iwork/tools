<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', 'UserController@getUser');

Route::namespace('Ddg')->group(function () {
    Route::get('ddg/initial_data', 'DataGenerateController@getInitialData');
    // TODO postメソッドにする
    Route::get('ddg/create', 'DataGenerateController@create');
});

Route::namespace('Ams')->group(function () {
    Route::post('ams/calc', 'AmsController@calc');
});
