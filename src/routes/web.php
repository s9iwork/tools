<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', 'TopController@getTop')->name('top');

Route::get('/{any?}', function () {
	return view('index');
})->where('any', '.+');

