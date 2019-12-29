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

Route::get('/', 'BlogController@index')->name('blog');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');

Route::get('/editor', 'EditorController@index')->name('editor');

Route::resource('posts','PostController');

Route::get('/admin/{id}', 'AdminController@createRolUser')->name('createRolUser');

Route::post('/admin/{id}', 'AdminController@storeRolUser')->name('addRolUser');

Route::get('/admin/remove/{id}', 'AdminController@removeRolUser')->name('removeRolUser');

Route::post('/admin/remove/{id}', 'AdminController@destroyRolUser')->name('destroyRolUser');
