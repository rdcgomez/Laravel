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

Route::resource('/', 'StoreUserController');
Route::get('/mypagedatabase', 'VisitorsController@index')->name('show.all');
Route::get('/mypageupdate/{id}', 'VisitorsController@edit')->name('edit.user');
Route::put('/mypageupdate/{id}', 'VisitorsController@update')->name('update.user');

Route::get('/mypagedatabase/{id}', 'VisitorsController@destroy')->name('delete.user');