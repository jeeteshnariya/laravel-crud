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
    return phpinfo();
});


// Resource For Posts	
Route::get('posts', 'PostsController@index')->name('posts.index');
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::get('posts/{id}', 'PostsController@show')->name('posts.show');
Route::get('posts/{id}/edit', 'PostsController@edit')->name('posts.edit');



Route::post('posts', 'PostsController@store')->name('posts.store');
Route::put('posts/{id}', 'PostsController@update')->name('posts.update');
Route::delete('posts/{id} ', 'PostsController@destroy')->name('posts.destroy');

Route::post('posts/{id}/comments', 'PostsController@createComment')->name('createComment');