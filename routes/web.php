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
Route::get('/', function () {
    return redirect(app()->getLocale());
});
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setLocale'], function () {

    Route::get('post/view/{id}', 'PostController@show');
    Route::get('post/list/{id}', 'PostController@list');
    Route::get('mypost/', 'user\PostController@index');
    Route::get('mypost/create/', 'user\PostController@create');
    Route::get('mypost/edit/{id}', 'user\PostController@edit');
    Route::get('/', 'WebController@index')->name('web');
    Auth::routes();

    });


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

//user and admin
Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');

Route::post('mypost/store/', 'user\PostController@store');
Route::post('mypost/update/', 'user\PostController@update');
Route::post('mypost/delete/', 'user\PostController@destroy');

//user and guest

Route::post('/comment/add', 'CommentController@store')->name('commentAdd');