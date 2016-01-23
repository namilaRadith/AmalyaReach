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

Route::get('home-admin', 'AdminDashboardController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Home page reservation forms
Route::get('checkAvailableRoomsForm2','ReservationController@checkAvailableRoomsForm2');


Route::get('contact', 'AboutController@getContact');
Route::post('contact', 'AboutController@getContactUsForm');

//cutomer feedbacks
Route::get('feedback', 'feedbackController@index');
Route::get('feedback/create', 'feedbackController@create');
Route::get('feedback/{recordId}', 'feedbackController@show');
Route::post('feedback', 'feedbackController@store');


//
Route::get('specials','');


//Promotions Routing
Route::get('admin_add_promotion', 'AdminPromotions@index');

