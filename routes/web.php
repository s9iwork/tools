<?php

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/ddg', 'DataGenerateController@index')->name('ddg');
