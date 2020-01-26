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

Route::middleware(['admincheck'])->group(function () {
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::resource('users', 'admin\UserController');
    Route::resource('categories', 'admin\CategoryController');
    Route::get('/catvisible/{id}', 'admin\CategoryController@Visible');
    Route::get('/catisvisible/{id}', 'admin\CategoryController@inVisible');
    Route::resource('posts', 'admin\PostController');
    Route::get('/postvisible/{id}', 'admin\PostController@Visible');
    Route::get('/postisvisible/{id}', 'admin\PostController@inVisible');
    Route::resource('rates', 'admin\RateController');
});

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');
Route::get('post/view/{id}', 'PostController@show');
Route::get('post/list/{id}', 'PostController@list');

Route::post('/comment/add', 'CommentController@store')->name('commentAdd');