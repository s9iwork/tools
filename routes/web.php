<?php

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/ddg', 'DataGenerateController@index')->name('ddg');
Route::get('/util', 'UtilityController@index')->name('util');
