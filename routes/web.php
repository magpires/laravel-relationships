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

/*
|
| One to Nany
|
*/

Route::get('one-to-many', 'OneToManyController@oneToMany')->name('one-to-one');
Route::get('mane-to-one', 'OneToManyController@manyToOne')->name('mane-to-one');
Route::get('one-to-many-two', 'OneToManyController@oneToManyTwo')->name('one-to-many-two');
Route::get('one-to-many-insert', 'OneToManyController@oneToManyInsert')->name('one-to-many-insert');
Route::get('one-to-many-insert-two', 'OneToManyController@oneToManyInsertTwo')->name('one-to-many-insert-two');

/*
|
| Has Many Through
|
*/

Route::get('has-many-through', 'OneToManyController@hasManyThrough')->name('has-many-through');

Route::get('/', function () {
    return view('welcome');
});
