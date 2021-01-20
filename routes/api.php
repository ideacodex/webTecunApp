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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('users', 'APIUserController')->except(['destroy'])->middleware('auth:api');
Route::post('users', 'APIUserController@store');

Route::get('categories', 'APICategoryController@index');
Route::get('category/{id}', 'APICategoryController@show');

Route::get('award', 'APIAwardController@index');
Route::get('award/image/{url_image}', 'APIAwardController@getImage');
Route::get('award/carousel', 'APIAwardController@carousel');

Route::post('stores', 'APIStoreController@index')->middleware('auth:api');

Route::post('jobs', 'APIJobController@jobs')->middleware('auth:api');;
Route::post('job/{id}', 'APIJobController@show')->middleware('auth:api');;
Route::post('job/apply/upload/{email}', 'APIJobController@applyUploadDocument')->middleware('auth:api');;
Route::post('job/apply/mail/{pdfNameToStore}', 'APIJobController@apply')->middleware('auth:api');;

/* ********************Post************************************ */
Route::get('news', 'APIPostController@news')->middleware('auth:api');
Route::get('post/{id}', 'APIPostController@newsRead')->middleware('auth:api');
Route::post('commentpost', 'APIPostController@commentPost')->middleware('auth:api');
Route::post('commentpost/{id}', 'APIPostController@delete')->middleware('auth:api');
Route::post('likeordislikenews', 'APIPostController@likeOrDislikeNews')->middleware('auth:api');
Route::get('categorypost/{id}', 'APIPostController@categoryPost');
/* ********************Post************************************ */

/* ********************Podcast************************************ */
Route::get('podcasts', 'APIPodcastController@podcasts')->middleware('auth:api');
Route::get('podcast/{id}', 'APIPodcastController@podcastRead')->middleware('auth:api');
Route::post('commentpodcast', 'APIPodcastController@commentPodcast')->middleware('auth:api');
Route::post('commentpodcast/{id}', 'APIPodcastController@delete')->middleware('auth:api');
Route::post('likeordislikepodcast', 'APIPodcastController@likeOrDislikePodcast')->middleware('auth:api');
Route::get('categoryPodcast/{id}', 'APIPodcastController@categoryPodcast')->middleware('auth:api');
/* ********************Podcast************************************ */

Route::get('question', 'APIGamesController@question')->middleware('auth:api');
Route::get('score', 'APIGamesController@score')->middleware('auth:api');
Route::post('scoreuser', 'APIGamesController@scoreUser')->middleware('auth:api');

Route::resource('contacts', 'ApiContactController')->middleware('auth:api');
Route::resource('pictures', 'ApiPictureController');
Route::post('ldap', 'LdapController@ldapApi');
Route::post('device/token', 'SettingController@saveNotificationToken')->middleware('auth:api');


Route::resource('favorite', 'APIFavoriteController')->middleware('auth:api');
Route::get('allCompany', 'ProccessController@allCompany')->middleware('auth:api');
Route::post('mailVacation', 'ProccessController@mailVacation')->middleware('auth:api');
Route::post('mailConstancy', 'ProccessController@mailConstancy')->middleware('auth:api');