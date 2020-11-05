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
    return view('layouts.landingpage');
});

Auth::routes();
Route::get('login/facebook', 'SocialServicesController@redirectToProvider');
Route::get('login/facebook/callback', 'SocialServicesController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth')   ;
Route::get('/team', 'HomeController@team')->middleware('auth')  ;
Route::get('/specialTeam', 'AwardController@specialTeam')->middleware('auth')    ;
Route::get('/podcast', 'HomeController@podcast')->middleware('auth')    ;
Route::get('/trivia', 'HomeController@games')->middleware('auth')   ;
Route::get('/question', 'QuestionController@question')->middleware('auth');
Route::get('/stores', 'StoreController@stores')->middleware('auth')  ;
Route::get('/jobs', 'JobController@jobs')->middleware('auth')  ;
Route::get('/job/{id}', 'JobController@job');
Route::post('/apply/mail', 'JobController@apply');
Route::get('/denounce', 'HomeController@denounce')->middleware('auth')  ;
Route::get('/news', 'PostController@news')->name('news')->middleware('auth');
Route::get('/newsRead/{id}', 'PostController@show')->middleware('auth');
Route::post('/comment', 'PostController@commentPost')->name('comment')->middleware('auth');
Route::get('comment/{id}', 'PostController@delete')->name('commentDelete')->middleware('auth');
Route::post('/likeordislike', 'PostController@likeOrDislikeNews')->name('like')->middleware('auth');


//*******admin routes****** */
Route::resource('adminPost', 'PostController')->middleware('auth')  ;
Route::resource('gamesAdmin', 'QuestionController')->middleware('role:root|Super|Admin');
Route::resource('users', 'UserController')->middleware('role:root|Super|Admin');
Route::resource('categories', 'CategoryController')->middleware('role:root|Super|Admin');
Route::resource('jobsAdmin', 'JobController')->middleware('role:root|Super|Admin');
Route::resource('storesAdmin', 'StoreController')->middleware('role:root|Super|Admin');
Route::resource('awardsAdmin', 'AwardController')->middleware('role:root|Super|Admin');
//*******admin routes****** */





