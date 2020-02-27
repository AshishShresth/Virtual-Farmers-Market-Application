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

use App\User;




Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function(){
    Route::get('categories' , 'CategoryController@index')->name('categories');
    Route::post('categories' , 'CategoryController@store')->name('save-category');
    Route::get( 'categories/{id}' , 'CategoryController@show');

    Route::get('comments' , 'CommentController@index')->name('comments');
    Route::get('comments/{id}' , 'CommentController@show');

    Route::get('user' , 'UserController@index')->name('users');

    Route::get('posts' , 'PostController@index')->name('posts');
    Route::get('posts/{id}' , 'PostController@show')->name('show-post');
    Route::get('new-post' , 'PostController@newPost')->name('add-post');
    Route::post('new-post' , 'PostController@store')->name('save-post');

} );

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


