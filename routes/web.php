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

//*******Jobs Routes****** */
Route::get('/jobs', 'JobController@jobs')->middleware('auth')  ;
Route::get('/job/{id}', 'JobController@job');
Route::post('/apply/mail', 'JobController@apply');
//*******Jobs Routes****** */

//*******Denunce Routes****** */
Route::get('/denounce', 'DenounceController@denounce')->middleware('auth')  ;
Route::post('send/denounce', 'DenounceController@sendMailDenounce')->middleware('auth');
//*******Denunce Routes****** */

//*******Post Routes****** */
Route::get('/news', 'PostController@news')->name('news')->middleware('auth');
Route::get('/newsRead/{id}', 'PostController@show')->middleware('auth');
Route::post('/comment', 'PostController@commentPost')->name('comment')->middleware('auth');
Route::get('comment/{id}', 'PostController@delete')->name('commentDelete')->middleware('auth');
Route::post('/likeordislike', 'PostController@likeOrDislikeNews')->name('like')->middleware('auth');
Route::post('/category/post/{id}', 'PostController@categoryPost')->name('categorypost')->middleware('auth');
//*******Post Routes****** */

//*******Podcast Routes****** */
Route::get('/podcasts', 'PodcastController@podcasts')->name('newspodcast')->middleware('auth');
Route::get('/podcastRead/{id}', 'PodcastController@show')->middleware('auth');
Route::post('/commentpodcast', 'PodcastController@commentPodcast')->name('commentpodcast')->middleware('auth');
Route::get('commentpodcast/{id}', 'PodcastController@deleteCommentPodcast')->name('commentdeletepodcast')->middleware('auth');
Route::post('/likeordislikepodcast', 'PodcastController@likeOrDislikePodcast')->name('likepodcast')->middleware('auth');
Route::post('/category/podcast/{id}', 'PodcastController@categoryPodcast')->name('categorypodcast')->middleware('auth');
//*******Podcast Routes****** */

//*******Settings Routes****** */
Route::get('/adminSetting', 'SettingController@index')->name('setting')->middleware('auth');
Route::get('/adminSetting/crear', 'SettingController@create')->middleware('auth');
Route::post('adminSetting', 'SettingController@store')->name('adminSetting.store')->middleware('auth');
Route::get('/adminSetting/{id}/edit', 'SettingController@edit')->middleware('auth');
Route::put('adminSetting/{id}', 'SettingController@update')->name('adminSetting.update')->middleware('auth');
//*******Settings Routes****** */


//*******admin routes****** */
Route::resource('adminPost', 'PostController')->middleware('auth');
Route::resource('adminPodcast', 'PodcastController')->middleware('auth');
Route::resource('adminPicture', 'PictureController')->middleware('auth');
Route::resource('gamesAdmin', 'QuestionController')->middleware('role:root|Super|Admin');
Route::resource('users', 'UserController')->middleware('role:root|Super|Admin');
Route::resource('categories', 'CategoryController')->middleware('role:root|Super|Admin');
Route::resource('jobsAdmin', 'JobController')->middleware('role:root|Super|Admin');
Route::resource('storesAdmin', 'StoreController')->middleware('role:root|Super|Admin');
Route::resource('awardsAdmin', 'AwardController')->middleware('role:root|Super|Admin');
//*******admin routes****** */





