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

use GeekGearGovernor\Http\Requests;
use GeekGearGovernor\Http\Controllers\Controller;

use GeekGearGovernor\Item;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

// Resources
Route::resource('items','ItemController');

Route::post('itemTags/editTags', function(){
		$newTags  = Input::get('tagData');
		$id = Input::get('id');
		$myobject = Item::findOrFail($id);
		$myobject->retag($newTags);

	 	return Response::json(array(
	    	'success' => true
	    ));

});

// Authentication routes
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/query', 'SearchController@query');
