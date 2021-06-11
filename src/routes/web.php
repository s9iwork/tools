<?php

use Illuminate\Support\Facades\Route;

// FIXME Github Actions上ではこけるので確認する
//Route::get('/{any?}', "AppController@index")->where('any', '.*');

Route::get('/', "AppController@index");
Route::get('/ddg', "AppController@index");

