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

//*******User Routes****** */
Route::get('user/setting', 'UserController@View');
Route::post('updateUser', 'UserController@updateUser');
//*******User Routes****** */

//*******LDAP Routes****** */
Route::get('ingresar', 'LdapController@index')->name('ingresar');
Route::post('ldap', 'LdapController@ldap');
Route::get('pctec', 'LdapController@pctec');
Route::get('tecun', 'LdapController@test');
//*******LDAP Routes****** */

//*******Register Routes****** */
Route::get('login/facebook', 'SocialServicesController@redirectToProvider');
Route::get('login/facebook/callback', 'SocialServicesController@handleProviderCallback');
//*******Register Routes****** */

//*******Home Routes****** */
Route::get('/team', 'HomeController@team')->middleware('auth')  ;
Route::get('/specialTeam', 'AwardController@specialTeam')->middleware('auth')    ;
Route::get('/podcast', 'HomeController@podcast')->middleware('auth')    ;
//*******Home Routes****** */

//*******Jobs Routes****** */
Route::get('/jobs', 'JobController@jobs')->middleware('auth')  ;
Route::get('/job/{id}', 'JobController@job');
Route::post('/apply/mail', 'JobController@apply');
//*******Jobs Routes****** */

//*******Denunce Routes****** */
//Route::get('/denounce', 'DenounceController@denounce')->middleware('auth')  ;
//Route::post('send/denounce', 'DenounceController@sendMailDenounce')->middleware('auth');
//*******Denunce Routes****** */

//*******Post Routes****** */
Route::get('/home', 'PostController@news')->name('home')->middleware('auth')   ;
Route::get('/news', 'PostController@news')->name('news')->middleware('auth');
Route::get('/newsRead/{id}', 'PostController@show')->middleware('auth');
Route::post('/comment', 'PostController@commentPost')->name('comment')->middleware('auth');
Route::get('comment/{id}', 'PostController@delete')->name('commentDelete')->middleware('auth');
Route::post('/likeordislike', 'PostController@likeOrDislikeNews')->name('like')->middleware('auth');
Route::get('/category/post/{id}', 'PostController@categoryPost')->name('categorypost')->middleware('auth');
//*******Post Routes****** */

//*******Podcast Routes****** */
Route::get('/podcasts', 'PodcastController@podcasts')->name('newspodcast')->middleware('auth');
Route::get('/podcastRead/{id}', 'PodcastController@show')->middleware('auth');
Route::post('/commentpodcast', 'PodcastController@commentPodcast')->name('commentpodcast')->middleware('auth');
Route::get('commentpodcast/{id}', 'PodcastController@deleteCommentPodcast')->name('commentdeletepodcast')->middleware('auth');
Route::post('likeordislikepodcast', 'PodcastController@likeOrDislikePodcast')->name('likepodcast')->middleware('auth');
Route::get('/category/podcast/{id}', 'PodcastController@categoryPodcast')->name('categorypodcast')->middleware('auth');
//*******Podcast Routes****** */

//*******Settings Routes****** */
Route::get('/adminSetting', 'SettingController@index')->name('setting')->middleware('role:root|Super|Admin');
Route::get('/adminSetting/crear', 'SettingController@create')->middleware('role:root|Super|Admin');
Route::post('adminSetting', 'SettingController@store')->name('adminSetting.store')->middleware('role:root|Super|Admin');
Route::get('/adminSetting/{id}/edit', 'SettingController@edit')->middleware('role:root|Super|Admin');
Route::put('adminSetting/{id}', 'SettingController@update')->name('adminSetting.update')->middleware('role:root|Super|Admin');

Route::get('notificaciones', 'SettingController@panelNotifications')->middleware('role:root|Super|Admin');
Route::post('notificaciones', 'SettingController@sendNotifications')->middleware('role:root|Super|Admin');
//*******Settings Routes****** */

//*******Pictures Routes****** */
Route::get('/artes', 'PictureController@home')->middleware('auth');
//*******Pictures Routes****** */

//*******Store Routes****** */
Route::get('/stores', 'StoreController@stores')->middleware('auth')  ;
//*******Store Routes****** */



//*******Contact Routes****** */
Route::post('contact/home', 'ContactController@contactsUser')->middleware('auth');
Route::get('contact/home', 'ContactController@contactsUserForm')->middleware('auth');
Route::get('contact/{id}', 'ContactController@ContactUser')->middleware('auth');
//*******Contact Routes****** */

//*******Trivia Routes****** */
Route::get('/trivia', 'HomeController@games')->middleware('auth');
Route::get('/question', 'QuestionController@question')->middleware('auth');
Route::post('storeUser', 'QuestionController@storeUser')->middleware('auth');
//*******Trivia Routes****** */

//*******ProccessRRHH Routes****** */
Route::get('/procesos', 'ProccessController@proccess')->middleware('auth');
Route::get('/procesos/constancia', 'ProccessController@proccessCertification')->middleware('auth');
Route::get('/procesos/vacaciones', 'ProccessController@proccessRRHH')->name('proccessRRHH')->middleware('auth');
Route::post('mailRRHHVacation', 'ProccessController@mailRRHHVacation')->middleware('auth');
Route::post('mailRRHHConstancy', 'ProccessController@mailRRHHConstancy')->middleware('auth');
//*******ProccessRRHH Routes****** */

//*******admin routes****** */
Route::resource('adminPost', 'PostController')->middleware('role:root|Super|Admin');
Route::resource('adminPodcast', 'PodcastController')->middleware('role:root|Super|Admin');
Route::resource('adminPicture', 'PictureController')->middleware('role:root|Super|Admin');
Route::resource('gamesAdmin', 'QuestionController')->middleware('role:root|Super|Admin');
Route::resource('users', 'UserController')->middleware('role:root|Super|Admin');
Route::resource('categories', 'CategoryController')->middleware('role:root|Super|Admin');
Route::resource('jobsAdmin', 'JobController')->middleware('role:root|Super|Admin');
Route::resource('storesAdmin', 'StoreController')->middleware('role:root|Super|Admin');
Route::resource('awardsAdmin', 'AwardController')->middleware('role:root|Super|Admin');
Route::resource('contactAdmin', 'ContactController')->middleware('role:root|Super|Admin');
Route::resource('favoriteAdmin', 'FavoriteController')->middleware('role:root|Super|Admin');
//*******Store Routes****** */
Route::resource('empresas', 'CompanyController')->middleware('role:root|Super|Admin')  ;
//*******Store Routes****** */
//*******admin routes****** */

//*******Favorites Routes****** */
Route::get('/favoritos/pbx', 'FavoriteController@favoritePbx')->middleware('auth');
Route::get('/favoritos/whatsapp', 'FavoriteController@favoriteWhatsApp')->middleware('auth');
//*******Favorites Routes****** */





