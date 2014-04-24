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
// Route::get('cats/{id}', function($id) {
// 	return "Cat $id";
// }) ->where('id', '[0-9]+');
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

// BIND A MODEL TO A ROUTE - SO YOU CAN AVOID DOING REPEATED QUERIES LIKE 
// Route::get ('cats/{id}', function($id){
//	 $cat = Cat::find($id);	
// })
Route::model('cat', 'Cat');
// Allows you to shorten the route and pass a 'Cat' object to it instead:
Route::get('cats/{cat}', function(Cat $cat) {
	return View::make('cats.single')
		->with('cat', $cat);
});

// CREATE:
Route::get('cats/create', function() {
	$cat  = new Cat;
	return View::make('cats.edit')
		->with('cat', $cat)
		->with('method', 'post');
});

// EDIT:
Route::get('cats/{cat}/edit', function(Cat $cat) {
	return View::make('cats.edit')
		->with('cat', $cat)
		->with('method', 'put');
});

// DELETE:
Route::get('cats/{cat}/delete', function(Cat $cat) {
	return View::make('cats.edit')
		->with('cat', $cat)
		->with('method'->delete);
});

// CREATE HANDLER: POST
Route::post('cats', function(){
	$cat=Cat::create(Input::all());
	return Redirect::to('cats/'.$cat->id)
		->with('message', 'Succesfully created new cat!');
});

// EDIT HANDLER: PUT
Route::put('cats/{cat}', function(Cat $cat){
	$cat->update(Input::all());
	return Redirect::to('cats/'.$cat->id)
		->with('message', 'Successfully updated $cat->id cat!')
});

// DELETE HANDLER: DELETE
Route::put('cats/{cat}', function(Cat $cat){
	$cat->delete();
	return Redirect::to('cats')
			->with('message', 'Successfully deleted page!');
});