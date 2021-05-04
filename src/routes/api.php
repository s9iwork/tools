<?php

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

Route::namespace('Ddg')->group(function(){
	Route::get('ddg/initial_data', 'DataGenerateController@getInitialData');
	Route::get('ddg/create', 'DataGenerateController@create');
});
