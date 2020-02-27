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

//route for getting the all the posts
Route::get('posts', 'Api\PostApiController@index');

Route::get('users', 'Api\UserApiController@index');
Route::get('user/{id}/posts', 'Api\UserApiController@posts');
Route::get('user/{id}/bids', 'Api\UserApiController@bids');
Route::get('user/{id}/reports', 'Api\UserApiController@reports');

Route::get('bids', 'Api\BidApiController@index');
Route::get('comments', 'Api\CommentApiController@index');
Route::get('reports', 'Api\ReportApiController@index');



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

