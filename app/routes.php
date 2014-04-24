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

// The first parameter is the URI pattern. When a pattern is matched, the closure function in the second parameter is executed with any parameters that were extracted from your pattern.

Route::get('/', function() {
	return "All cats";
});

// Route::get('cats/{id}', function($id) {
// 	return "Cat $id";
// });

// RESTRICTING ROUTE PARAMS:
// To limit the pattern of the {id} route, chain a 'where' method to the route:
Route::get('cats/{id}', function($id) {
	return "Cat $id";
}) ->where('id', '[0-9]+');
// where method take two arguments: first the name of the parameter; second the regex pattern it needs to match.

// REDIRECTS:
// Return a 'Redirect' object from your routes:
// Route::get('cats', function(){
// 	return Redirect::to('/');
// });

// VIEWS:
// Return your view by using the View::make method with a variable
Route::get('about', function(){
	return View::make('about') -> with('number_of_cats', 9000) -> with('bugs', " Bugs are gross!");
});

Route::get('cats', function(){
	$cats = Cat::all();
	return View::make('cats.index')->with('cats', $cats);
});

Route::get('cats/breed/{name}', function($name){
	$breed = Breed::whereName($name)->with('cats')->first();
	return View::make('cats.index')
		->with('breed', $breed)
		->with('cats', $breed->cats);
});