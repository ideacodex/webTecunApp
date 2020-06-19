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
    return view('layouts.appson');
});

Auth::routes();
Route::get('login/facebook', 'SocialServicesController@redirectToProvider');
Route::get('login/facebook/callback', 'SocialServicesController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth')   ;
Route::get('/team', 'HomeController@team')->middleware('auth')  ;
Route::get('/specialTeam', 'HomeController@specialTeam')->middleware('auth')    ;
Route::get('/podcast', 'HomeController@podcast')->middleware('auth')    ;
Route::get('/trivia', 'HomeController@games')->middleware('auth')   ;
Route::get('/question', 'HomeController@question')->middleware('auth')  ;
Route::get('/stores', 'StoreController@stores')->middleware('auth')  ;
Route::get('/jobs', 'JobController@jobs')->middleware('auth')  ;
Route::get('/denounce', 'HomeController@denounce')->middleware('auth')  ;
Route::get('/news', 'PostController@news')->middleware('auth');
Route::get('/newsRead/{id}', 'PostController@newsRead')->middleware('auth');


//*******admin routes****** */
Route::resource('adminPost', 'PostController')->middleware('auth')  ;
Route::resource('users', 'UserController')->middleware('role:root|Super|Admin');
Route::resource('categories', 'CategoryController')->middleware('role:root|Super|Admin');
Route::resource('jobsAdmin', 'JobController')->middleware('role:root|Super|Admin');
Route::resource('storesAdmin', 'StoreController')->middleware('role:root|Super|Admin');
//*******admin routes****** */





