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
    //categories
    Route::get('categories' , 'CategoryController@index')->name('categories');
    Route::post('categories' , 'CategoryController@store')->name('save-category');
    Route::get( 'categories/{id}' , 'CategoryController@show');
    Route::delete('categories/{id}', 'CategoryController@destroy')->name('delete_category');

    //comments
    Route::get('comments' , 'CommentController@index')->name('comments');
    Route::get('comments/{id}' , 'CommentController@show');

    //bids
    Route::get('bids' , 'BidController@index')->name('bids');
    Route::get('bids/{bid}' , 'BidController@show')->name('bids.show');
    //Route::get('place-bids' , 'BidController@create')->name('place-bids');
    Route::post('bids/{post_id}', 'BidController@store')->name('bids.store');

    //Route::delete('bibs/{id}', 'CategoryController@destroy')->name('delete_category');

    Route::get('user' , 'UserController@index')->name('users');

});


Route::resource('posts', 'PostController');

Route::get('users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('admin')->group(function (){
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    //admin password reset routes
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


});


Auth::routes(['verify' => true]);
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/kalimati-price', 'KalimatiPriceController@index')->name('dailyPrice');
Route::any('/search', 'SearchController@search')->name('search');
Route::any('/advance-search-results', 'SearchController@advanceSearch')->name('advance-search');



