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

Route::get('home','ReservationController@viewHome');

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

//registed route for Add Subscriber
Route::post('add-subscriber', 'clientNavigationController@addSubscriber');

//registed route for Gallery page of the Client
Route::get('cl-Special-Offers', 'clientNavigationController@showSpecialOffers');

/*
 ***********************************************************************************************************************
											ADMIN NAVIGATION  ROUTES
 ***********************************************************************************************************************
 */

//registed route for home page of the Admin
Route::get('ad-home', 'AdminDashboardController@index');

//registed route for About us page of the Admin
Route::get('dashboard/about-us', 'AdminDashboardController@showAboutUs');

//registed route for About us page update basic details of the Admin
Route::post('dashboard/about-us/update-maintitle-description', 'AdminDashboardController@updateAboutUsBasics');

//registed route for Image Gallery page of the Admin
Route::get('dashboard/gallery/img-gallery', 'AdminDashboardController@showImageGallery');

//registed route for Video Gallery page of the Admin
Route::get('dashboard/gallery/vd-gallery', 'AdminDashboardController@showVideoGallery');

//registed route for Dinning List page of the Admin
Route::get('dashboard/dinning-list', 'AdminDashboardController@showDinningList');

//registed route for add new dinning menu page of the Admin
Route::get('dashboard/dinning-list/add', 'AdminDashboardController@showAddDinningMenu');

//registed route for image Gallery image upload
Route::get('dashboard/contact-us', 'AdminDashboardController@showContactUs');

//registed route for create news letter page
Route::get('newsletter/create', 'AdminDashboardController@showCreateNewsLetter');

//registed route for send news letter
Route::post('newsletter/create/send', 'AdminDashboardController@sendNewsLetter');

//registed route for contact us page
Route::post('dashboard/gallery/img-gallery/upload', 'AdminDashboardController@uploadImageToGallery');

//registed route for  update contact us
Route::post('dashboard/contact-us/update', 'AdminDashboardController@updateContactUs');

//registed route for image Gallery image delete
Route::get('dashboard/gallery/img-gallery/delete/{id}', 'AdminDashboardController@deleteImageFromGallery');

//registed route for video Gallery video upload
Route::post('dashboard/gallery/vd-gallery/upload', 'AdminDashboardController@uploadVideoToGallery');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);






//************************************* Client routes (Reservation) **********************************************

//Home page reservation form Submit
Route::post('mainReservationFormSubmit','ReservationController@mainReservationFormSubmit');

//Room select form Submit
Route::post('selectRoomFormReservation','ReservationController@selectRoomFormReservationSubmit');
Route::get('showReservationForm3','ReservationController@showReservationForm3');
Route::post('reservationForm3Submit','PaypalPaymentController@makePayPalPayment');


//mail routes
Route::post('sendMailForReservation','ReservationController@sendMailsForReservation');


//Paypal Routes
Route::get('payment_success_request','ReservationController@paypalSuccessRequest');
Route::get('payment_failed_request','ReservationController@paypalFailedRequest');




//************************************* Admin Routes (Reservation) **********************************************

//add new rooms by admin view return
Route::get('adminAddNewRooms','adminReservationController@addNewRooms');

//Goto rooms home
Route::get('adminRoomsHome','adminReservationController@adminRoomsHome');

//Admin add new room form submit
Route::post('addNewRoomFormSubmit','adminReservationController@addNewRoomFormSubmit');

//Display history of a room
Route::get('adminViewRoomHistory_{id}','adminReservationController@adminViewRoomHistory');

//Update room details
Route::get('adminUpdateRoom_{id}','adminReservationController@adminUpdateRoom');
Route::post('updateRoomFormSubmit','adminReservationController@updateRoomFormSubmit');

//Remove a Room
Route::get('adminRemoveRoom_{id}','adminReservationController@adminRemoveRoom');

//View Reservation Details
Route::get('view_all_reservations','adminReservationController@viewAllReservations');

//Reservations mark as complete
Route::get('adminReservationMarkAsComplete_{id}','adminReservationController@adminReservationMarkAsComplete');

//Admin recover reservations
Route::get('adminReservationRecover_{id}','adminReservationController@adminReservationRecover');

//Mark reservation as called
Route::get('markReservationAsCalled_{id}','adminReservationController@markReservationAsCalled');


//Admin Event Reports room reservations
Route::get('admin_event_reports_room','adminReservationController@adminEventReportsRoom');
Route::post('admin_view_room_reports_search_form_submit','adminReservationController@adminEventReportsRoomSubmit');

//Admin Event Reports room reservations
Route::get('admin_event_reports_dining','adminReservationController@adminEventReportsDining');

//Admin Event Reports room reservations
Route::get('admin_event_reports_wedding','adminReservationController@adminEventReportsWedding');

//Admin Event Reports room reservations
Route::get('admin_event_reports_pool','adminReservationController@adminEventReportsPool');

//Test
Route::get('/testt','adminReservationController@test');

//Defaulf error route
Route::get('/{id}','adminReservationController@errorPage');


/*

Route::get('checkAvailableRoomsForm2','ReservationController@checkAvailableRoomsForm2');
Route::get('reservationDetailsForm3','ReservationController@reservationDetailsForm3');

Route::get('selectRoomFormReservation','ReservationController@selectRoomFormReservation');
//Route::post('reservationForm3Submit','ReservationController@reservationForm3Submit');
//Route::post('reservationForm3Submit','PaypalPaymentController@makePayPalPayment');

//PalPal Payment
Route::get('successPayment', 'PaypalPaymentController@successPayment');
Route::get('testPaypal', 'PaypalPaymentController@testPaypal');

//sameera test routes
Route::post('xxxx','PaypalPaymentController@showPayment');
Route::post('reservationForm3Submiting','ReservationController@finalformsubmittest');
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

