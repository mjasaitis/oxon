<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'FrontpageController@getIndex');

Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');
Route::post('check-email', 'Auth\AuthController@postCheckEmail');

Route::controller('videos', 'VideosController');

// Routes for admin url
Route::group(array('prefix' => "admin", 'middleware' => ['auth','permissions'] ), function () {
    Route::get('/', 'Admin\HomepageController@getIndex');
    Route::resource('videos', 'Admin\VideosController');
});
