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

Route::get('stores', 'APIStoreController@index');

Route::get('jobs', 'APIJobController@jobs');
Route::get('job/{id}', 'APIJobController@show');''
Route::post('job/apply/upload/{email}', 'APIJobController@applyUploadDocument');
Route::post('job/apply/mail/{pdfNameToStore}', 'APIJobController@apply');

Route::get('news', 'APIPostController@news');
Route::get('post/{id}', 'APIPostController@newsRead');
Route::post('commentpost', 'APIPostController@commentPost');
Route::get('commentpost/{id}', 'APIPostController@delete');
Route::post('likeordislikenews', 'APIPostController@likeOrDislikeNews');
Route::get('categorypost/{id}', 'APIPostController@categoryPost');

Route::get('podcast/{featured_image}', 'APIPodcastController@getImage');
Route::get('podcast/{featured_document}', 'APIPodcastController@getDocument');
Route::get('podcasts', 'APIPodcastController@podcasts');
Route::get('podcast/{id}', 'APIPodcastController@podcastRead');
Route::post('commentpodcast', 'APIPodcastController@commentPodcast');
Route::get('commentpodcast/{id}', 'APIPodcastController@delete');
Route::post('likeordislikenews', 'APIPodcastController@likeOrDislikePodcast');
Route::get('categoryPodcast/{id}', 'APIPodcastController@categoryPodcast');