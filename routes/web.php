<?php

use Illuminate\Support\Facades\Route;

/*
|
| One to One
|
*/

Route::get('one-to-one', 'OneToOneController@oneToOne')->name('one-to-one');

Route::get('/', function () {
    return view('welcome');
});
