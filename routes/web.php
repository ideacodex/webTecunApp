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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/team', 'HomeController@team');
Route::get('/specialTeam', 'HomeController@specialTeam');
Route::get('/podcast', 'HomeController@podcast');
Route::get('/trivia', 'HomeController@games');
Route::get('/question', 'HomeController@question');
Route::get('/stores', 'HomeController@stores');
Route::get('/jobs', 'HomeController@jobs');
Route::get('/denounce', 'HomeController@denounce');
Route::get('/news', 'HomeController@news');





