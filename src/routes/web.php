<?php

Route::get('/', function () {
    return view('top');
})->name('top');

Route::get('/ddg', 'Ddg\DataGenerateController@index')->name('ddg');
