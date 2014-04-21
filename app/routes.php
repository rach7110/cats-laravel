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

// To limit the pattern of the {id} route, chain a 'where' method to the route:
Route::get('cats/{id}', function($id) {
	return "Cat $id";
}) ->where('id', '[0-9]+');
// where method take two arguments: first the name of the parameter; second the regex pattern it needs to match.