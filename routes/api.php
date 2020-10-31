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

Route::get('store', 'APIStoreController@index');
Route::get('store/{id}', 'APIStoreController@show');

Route::get('jobs', 'APIJobController@index');
Route::get('job/{id}', 'APIJobController@show');
Route::post('job/apply/upload/{email}', 'APIJobController@applyUploadDocument');
Route::post('job/apply/mail/{pdfNameToStore}', 'APIJobController@apply');

Route::get('posts', 'APIPostController@index');
Route::get('post/{id}', 'APIPostController@show');
Route::get('post/{featured_image}', 'APIPostController@getImage');
Route::get('post/{featured_document}', 'APIPostController@getDocument');
Route::get('post/{featured_video}', 'APIPostController@getVideo');
