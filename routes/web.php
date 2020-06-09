<?php

use Illuminate\Support\Facades\Route;

/*
|
| One to One
|
*/

Route::get('one-to-one', 'OneToOneController@oneToOne')->name('one-to-one');
Route::get('one-to-one-inverse', 'OneToOneController@oneToOneInverse')->name('one-to-one-inverse');
Route::get('one-to-one-insert', 'OneToOneController@oneToOneInsert')->name('one-to-one-insert');

Route::get('/', function () {
    return view('welcome');
});
