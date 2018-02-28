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
    return view('welcome');
});

#=============== ArticleController Routes ===============#
Route::resource('articles','ArticleController');
#=============== /ArticleController Routes ===============#

#=============== UserController Routes ===============#
Route::get('login',[
	'uses' =>'UserController@getLogin',
	'as' => 'getLogin'
]);
Route::post('login',[
	'uses' => 'UserController@PostSignIn',
	'as' => 'postLogin'
]);
#=============== /UserController Routes ===============#

#=============== ProviderController Routes ===============#
Route::get('login/{provider}',[
  'uses' => 'ProviderController@redirectToProvider',
  'as' => 'login-provider'
]);

Route::get('login/{provider}/callback',[
  'uses' => 'ProviderController@handleProviderCallback',
  'as' => 'login-provider-callback'
]);
#=============== /ProviderController Routes ===============#