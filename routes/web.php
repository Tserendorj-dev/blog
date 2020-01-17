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

Route::get('/', 'WebController@index')->name('web');

Auth::routes();

Route::get('/dashboard', 'AdminController@index')->name('dashboard')->middleware('admincheck');

Route::resource('categories', 'admin\CategoryController');
Route::resource('users', 'admin\UserController');
Route::resource('rates', 'admin\RateController');
Route::get('/catvisible/{id}', 'admin\CategoryController@Visible');
Route::get('/catisvisible/{id}', 'admin\CategoryController@inVisible');