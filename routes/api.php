<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('categories', 'Api\CategoryApiController@index');
//this route will get all of the posts in a specific category
Route::get('categories/{id}/posts', 'Api\CategoryApiController@posts');

//routes for authentication
Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'Api\UserController@details');
    Route::get('logout', 'Api\UserController@logout');
});

//route for getting the all the posts
Route::get('posts', 'Api\PostApiController@index');

Route::get('users', 'Api\UserApiController@index');
Route::get('user/{id}/posts', 'Api\UserApiController@posts');
Route::get('user/{id}/bids', 'Api\UserApiController@bids');
Route::get('user/{id}/reports', 'Api\UserApiController@reports');

Route::get('bids', 'Api\BidApiController@index');
Route::get('comments', 'Api\CommentApiController@index');
Route::get('reports', 'Api\ReportApiController@index');


Route::get('bids/{bid}/comments', 'CommentController@index');
Route::middleware('auth:api')->group(function () {

    Route::post('bids/{bid}/comment', 'CommentController@store');
});

