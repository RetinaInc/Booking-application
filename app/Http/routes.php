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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');

Route::get('rooms/create', 'RoomsController@create');
Route::post('rooms', 'RoomsController@store');
Route::get('rooms/{id}/edit', 'RoomsController@edit');

Route::get('rooms/', 'RoomsController@index');
Route::get('rooms/{id}', 'RoomsController@show');

Route::get('book/', 'BookingsController@index');
Route::post('book/calendar', 'BookingsController@calendar');
Route::post('book/room', 'BookingsController@room');
Route::post('book/done', 'BookingsController@done');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// this is your POST AJAX route
Route::post('book/ajax', 'BookingsController@room');
/*Route::post('/book/ajax', function () {
    $html = view('booking.room')->with('rooms', Request::input())->render();
 	return Response::json(array('input' => Request::input(), 'html' => $html));
});*/