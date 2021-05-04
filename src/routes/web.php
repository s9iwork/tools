<?php

Route::get('/', 'TopController@getTop')->name('top');

Route::get('/ddg', 'Ddg\DataGenerateController@index')->name('ddg');
