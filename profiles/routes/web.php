<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::get('/', 'UserProfileController@index')->name('listing');
	Route::get('/create', 'UserProfileController@create')->name('create');
 	Route::post('/store', 'UserProfileController@store')->name('store');
 	Route::get('/edit/{id}', 'UserProfileController@edit')->name('edit');
 	Route::any('/update', 'UserProfileController@update')->name('update');
 	Route::any('/delete/{id}', 'UserProfileController@destroy')->name('delete');
