<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index')->middleware('web');

Route::get('contact','ContactController@index')->middleware('web');

Route::get('register','Auth\AuthController@getRegister')->middleware('web');
Route::post('register','Auth\AuthController@postRegister')->middleware('web');
Route::get('logout','Auth\AuthController@logout')->middleware('web');

Route::get('login','Auth\AuthController@getlogin')->middleware('web');
Route::post('login','Auth\AuthController@postlogin')->middleware('web');

Route::get('profile', 'ProfileController@index')->middleware(['web','auth']);
Route::post('profile/new-tweet','ProfileController@newTweet')->middleware(['web','auth']);
Route::get('profile/{username}','ProfileController@show')->middleware(['web']);

Route::post('profile/new-comment','ProfileController@newComment')->middleware(['web','auth']);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
