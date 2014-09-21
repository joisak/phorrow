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


Route::get('/', function()
{
	$t = 1;
	$inventories = Inventory::all();
	return View::make('main/index')->with('inventories', $inventories)->with('t', $t);
});


Route::get('/albums', function() {
	$albums = Collection::all();
	return View::make('main/albums')->with('albums', $albums);
});

Route::get('/album/{albums}', function ($albums){
	$albums 	= Collection::find($albums);
	return View::make('main/album')->with(array('albums' => $albums));
});


Route::get('/albums/{album}/image/{image}', function($album, $image) {
	$album = Collection::find($album);
	$image = Inventory::find($image);
	return View::make('main/image')->with(array('album' => $album, 'image' => $image));
});

Route::get('/login', function() {
	return View::make('main/login');
});



//// ADMIN ROUTES BELOW

Route::resource('inventory', 'InventoryController');

Route::get('/users/{id}/pictures', function ($id)
	{	
		$user = User::find($id);
		return View::make('inventories/mypics')->with('images', $user->pictures);
	});




Route::resource('collection', 'CollectionController');

Route::controller('users', 'UsersController');	

Route::post('comment/{id}', 'CommentController@store');

Route::resource('comment', 'CommentController');

