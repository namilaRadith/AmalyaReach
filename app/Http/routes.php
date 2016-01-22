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

/*
 *
 * "cl" is the prefix for client routs
 * "ad" is the prefix for admin routs
 *  eg : ad-<route name> | cl-<route name>
 *
 */

Route::get('/', 'WelcomeController@index');

/*
 ***********************************************************************************************************************
  											CLIENT NAVIGATION  ROUTES
 ***********************************************************************************************************************
 */

//registed route for home page of the Client
Route::get('cl-home', 'HomeController@index');

//registed route for About Us page of the Client
Route::get('cl-about', 'clientNavigationController@showAbout');

//registed route for Dinning List page of the Client
Route::get('cl-dinning-list', 'clientNavigationController@showDinningList');

//registed route for Room List page of the Client
Route::get('cl-rooms-list', 'clientNavigationController@showRoomList');

//registed route for Facilities List page of the Client
Route::get('cl-facilities-list', 'clientNavigationController@showFacilitiesList');

//registed route for Function List page of the Client
Route::get('cl-function-list', 'clientNavigationController@showFunctionList');

//registed route for Gallery page of the Client
Route::get('cl-gallery', 'clientNavigationController@showGallery');

/*
 ***********************************************************************************************************************
											ADMIN NAVIGATION  ROUTES
 ***********************************************************************************************************************
 */

//registed route for home page of the Admin
Route::get('ad-home', 'AdminDashboardController@index');



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

