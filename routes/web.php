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
Route::get('one-to-one-view-insert', 'OneToOneController@IndexInsert')->name('one-to-one-view-insert');
Route::post('one-to-one-android-insert', 'OneToOneController@insertViaAndroid')->name('one-to-one-android-insert');

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

/*
|
| Many to Many
|
*/

Route::get('many-to-many', 'ManyToManyController@manyToMany')->name('many-to-many');
Route::get('many-to-many-inverse', 'ManyToManyController@manyToManyInverse')->name('many-to-many-inverse');
Route::get('many-to-many-insert', 'ManyToManyController@manyToManyInsert')->name('many-to-many-insert');

/*
|
| Relation Polymorphic
|
*/
Route::get('polymorphics', 'PolymorphicController@polymorphic')->name('polymorphics');
Route::get('polymorphics-insert', 'PolymorphicController@polymorphicInsert')->name('polymorphics-insert');


Route::get('/', function () {
    return view('welcome');
});
