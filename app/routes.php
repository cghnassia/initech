<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	#return View::make('hello');
});*/

Route::get('/', 'HomeController@showIndex')->before('auth');
Route::post('sort', 'HomeController@showSort')->before('auth');

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@doLogin'))->before('guest');
Route::post('login', array('as' => 'login', 'uses' => 'AuthController@doLogin'))->before('guest');

Route::get('logout', 'AuthController@doLogout')->before('auth');
//Route::get('/test/', 'HomeController@testBubble');

