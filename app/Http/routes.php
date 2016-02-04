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

//registed route for Gallery page of the Client
Route::get('cl-Special-Offers', 'clientNavigationController@showSpecialOffers');

/*
 ***********************************************************************************************************************
											ADMIN NAVIGATION  ROUTES
 ***********************************************************************************************************************
 */

//registed route for home page of the Admin
Route::get('ad-home', 'AdminDashboardController@index');

//registed route for Image Gallery page of the Admin
Route::get('dashboard/gallery/img-gallery', 'AdminDashboardController@showImageGallery');

//registed route for Video Gallery page of the Admin
Route::get('dashboard/gallery/vd-gallery', 'AdminDashboardController@showVideoGallery');

//registed route for image Gallery image upload
Route::post('dashboard/gallery/img-gallery/upload', 'AdminDashboardController@uploadImageToGallery');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);





/*
########################################################################################################################
						<============== Sameera ===============>
########################################################################################################################
*/

//Home page reservation forms
Route::get('checkAvailableRoomsForm2','ReservationController@checkAvailableRoomsForm2');
Route::get('reservationDetailsForm3','ReservationController@reservationDetailsForm3');
Route::post('mainReservationFormSubmit','ReservationController@mainReservationFormSubmit');
Route::get('selectRoomFormReservation','ReservationController@selectRoomFormReservation');
//Route::post('reservationForm3Submit','ReservationController@reservationForm3Submit');
//Route::post('reservationForm3Submit','PaypalPaymentController@makePayPalPayment');

//PalPal Payment
Route::get('successPayment', 'PaypalPaymentController@successPayment');
Route::get('testPaypal', 'PaypalPaymentController@testPaypal');

//sameera test routes
Route::post('xxxx','PaypalPaymentController@showPayment');
Route::post('reservationForm3Submiting','ReservationController@finalformsubmittest');


/*
########################################################################################################################
						<============== Sameera ===============>
########################################################################################################################
*/











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

