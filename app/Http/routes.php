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

// Protected routes...
Route::group(['middleware' => 'auth'], function() {

	// languages routes
	Route::resource('languages', 'LanguagesController');
	
});

// redirect home to root
Route::get('/home', function() {
	return redirect()->route('home');
});

// main page of the website
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

// login routes....
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');

// logout route...
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);



/************************************** --- **************************************/


// pass title and heading into login page
View::composer('auth.login', function($view) {
	$title = "Login";
	$heading = "Login";

	$view->with('title', $title)->with('heading', $heading);
});

// pass title and heading into register page
View::composer('auth.register', function($view) {
	$title = "Register";
	$heading = "Register";

	$view->with('title', $title)->with('heading', $heading);
});