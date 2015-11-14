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

	// qualities routes
	Route::resource('qualities', 'QualitiesController');

	// platforms routes
	Route::resource('platforms', 'PlatformsController');

	// products routes
	Route::resource('products', 'ProductsController');
	
});

// redirect home to root
Route::get('/home', function() {
	return redirect()->route('home');
});

// main page of the website
Route::get('/', ['as' => 'home', 'uses' => function() {
	return redirect()->route('videos', 'movies');
}]);

// videos page
Route::get('video/{type}', ['as' => 'videos', 'uses' => 'VideosController@index']);

// games page
Route::get('games', ['as' => 'games', 'uses' => 'GamesController@index']);

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

// pass language and quality list into movie page
View::composer('products.__video', function($view) {
	// get data
	$languages = App\Language::lists('name', 'id')->toArray();
	$qualities = App\Quality::lists('name', 'id')->toArray();

	$view->with('languages', $languages)->with('qualities', $qualities);
});

// pass platforms list into game page
View::composer('products.__game', function($view) {
	// get data
	$platforms = App\Platform::lists('name', 'id')->toArray();

	$view->with('platforms', $platforms);
});

// pass languages and platforms into toolbar
View::composer('_navbar', function($view) {
	$languages = App\Language::all();
	$platforms = App\Platform::all();
	$view->with('languages', $languages)->with('platforms', $platforms);
});

// pass languages and genres into toolbar
View::composer('videos._control_bar', function($view) {
	$languages = App\Language::lists('name', 'name')->toArray();
	$genres = App\Genre::lists('name', 'name')->toArray();
	$view->with('languages', $languages)->with('genres', $genres);
});

// pass platforms and genres into toolbar
View::composer('games._control_bar', function($view) {
	$platforms = App\Platform::lists('name', 'name')->toArray();
	$genres = App\Genre::lists('name', 'name')->toArray();
	$view->with('platforms', $platforms)->with('genres', $genres);
});