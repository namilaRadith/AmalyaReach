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

//registed route for Remove Subscriber
Route::get('remove-subscriber/{email}', 'clientNavigationController@removeSubscriber');

//registed route for check subscribe email
Route::get('check-s-email/{email}', 'clientNavigationController@isSubscriberIn');

//registed route for Gallery page of the Client
Route::get('cl-Special-Offers', 'clientNavigationController@showSpecialOffers');

//registed route for  Client profile
Route::get('cl-my-profile', 'UserController@showMyProfile');

//registed route for client profile update
Route::post('cl-my-profile/update', 'UserController@updateMyProfile');





/*
 ***********************************************************************************************************************
											ADMIN NAVIGATION  ROUTES
 ***********************************************************************************************************************
 */

//registed route for home page of the Admin
Route::get('ad-login', 'AdminAuthController@showLogin');

//registed route for home page of the Admin
Route::get('ad-home', 'AdminDashboardController@index');

//registed route for About us page of the Admin
Route::get('dashboard/about-us', 'AdminDashboardController@showAboutUs');

//registed route for home image slider page of the Admin
Route::get('dashboard/home/image-slider', 'AdminDashboardController@showImageSlider');

//registed route for image Gallery image delete
Route::get('dashboard/home/img-slider/delete/{id}', 'AdminDashboardController@deleteImageFromSlider');

//registed route for home image slider upload content page of the Admin
Route::post('dashboard/home/image-slider/upload', 'AdminDashboardController@uploadImageSliderContent');

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

//registed route for list all users
Route::get('users/list-all/', 'AdminDashboardController@listAllUsers');

//registed route for add power user
Route::get('users/add-admin', 'AdminDashboardController@showAddPowerUser');

//registed route for contact us page
Route::post('dashboard/gallery/img-gallery/upload', 'AdminDashboardController@uploadImageToGallery');

//registed route for  update contact us
Route::post('dashboard/contact-us/update', 'AdminDashboardController@updateContactUs');

//registed route for image Gallery image delete
Route::get('dashboard/gallery/img-gallery/delete/{id}', 'AdminDashboardController@deleteImageFromGallery');

//registed route for image Gallery image delete
Route::get('dashboard/gallery/vd-gallery/delete/{id}', 'AdminDashboardController@deleteVideoFromGallery');

//registed route for video Gallery video upload
Route::post('dashboard/gallery/vd-gallery/upload', 'AdminDashboardController@uploadVideoToGallery');


//	| Questioners

//registed route for questioners manage show
Route::get('customer/questioners/manage', 'AdminDashboardController@showManageQuestioners');

//registed route for questioners create show
Route::get('customer/questioners/manage/create', 'AdminDashboardController@showCreateQuestioners');

//registed route for questioner create
Route::post('customer/questioners/manage/create/new', 'AdminDashboardController@createQuestioners');

//registed route for questioner update
Route::post('customer/questioners/manage/edit-questioner/{id}/update', 'AdminDashboardController@updateQuestioner');

//registed route for  get all questioners
Route::get('customer/questioners/manage/get-questioners', 'AdminDashboardController@getAllQuestioners');

//registed route for  get all questions
Route::get('customer/questioners/manage/get-questions/{id}', 'AdminDashboardController@getAllQuestions');

//registed route for  edit all questioner
Route::get('customer/questioners/manage/edit-questioner/{id}', 'AdminDashboardController@showEditQuestioner');

//registed route for  publish questioner
Route::get('customer/questioners/manage/publish-questioner/{id}', 'AdminDashboardController@publishQuestioner');




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
Route::post('mainReservationFormSubmit','ReservationController@mainReservationFormSubmit');
Route::post('selectRoomFormReservation','ReservationController@selectRoomFormReservationSubmit');
Route::get('showReservationForm3','ReservationController@showReservationForm3');
Route::post('reservationForm3Submit','PaypalPaymentController@makePayPalPayment');


//Admin routes
//add new rooms by admin view return
Route::get('adminAddNewRooms','adminReservationController@addNewRooms');
Route::get('adminRoomsHome','adminReservationController@adminRoomsHome');
Route::post('addNewRoomFormSubmit','adminReservationController@addNewRoomFormSubmit');
Route::get('adminViewRoomHistory_{id}','adminReservationController@adminViewRoomHistory');
Route::get('adminUpdateRoom_{id}','adminReservationController@adminUpdateRoom');
Route::get('adminRemoveRoom_{id}','adminReservationController@adminRemoveRoom');
Route::post('updateRoomFormSubmit','adminReservationController@updateRoomFormSubmit');

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

/*
######################################################################################################################
						<============== Sameera ===============>
######################################################################################################################
*/











Route::get('contact', 'AboutController@getContact');
Route::post('contact', 'AboutController@getContactUsForm');

//cutomer feedbacks
Route::get('feedback', 'feedbackController@index');
Route::get('feedback/create', 'feedbackController@create');
Route::get('feedback/{recordId}', 'feedbackController@show');
Route::post('feedback', 'feedbackController@store');


//specials
Route::get('specials','specialsController@specialsHome');

//Swimmng pool
Route::get('pool','poolController@checkAvailability');
Route::post('poolReservation','poolController@poolReservation');
Route::post('poolFormSubmit','poolController@poolFormSubmit');

//dinning Client route collection
//registed route for Client diining reservaton page
Route::get('dinningReservation','dinningController@dinningReservation');

//registed route for Client diining reservaton form submit
Route::post('diningReservationSubmit','dinningController@diningReservationSubmit');

//registed route for Client to view dinning menu
Route::get('dinningMenuDisplay','dinningController@dinningMenuDisplay');


//dinning Admin
//registed route for admin to add  dinning menu
Route::get('diningAddMenu','dinningController@diningAddMenuForm');

//registed route for admin to submit dinning menu add from
Route::post('diningAddMenuSubmit','dinningController@diningAddMenu');

//registed route for admin to view dinning menu
Route::get('diningMenu','dinningController@diningMenu');

//registed route for admin dinning menu edit form submit
Route::post('diningMenu/{id}/edit','dinningController@updateDiningItem');


//registed route for admin to edit  dinning menu
Route::get('diningMenuEdit/{id}','dinningController@diningMenuEdit');



//registed route for admin dinning menu delete
Route::get('diningMenuUpdate/{id}/delete','dinningController@deleteFoodItem');

//registed route for admin to view dinning reservations
Route::get('viewDinningReservations','dinningController@viewDinningReservations');
Route::post('resNotifications','dinningController@getNewNotifyCount');



//registed route for admin to view detailed dinning reservations
Route::get('dinningRes/view/{id}','dinningController@viewMoreDinningRes');


//meeting client
//registed route for client to navigate to meeting request form
Route::get('meetingReservation','meetingsController@meetingsReservation');

//registed route for clients meetings request form
Route::get('meetingReservationForm','meetingsController@meetingsReservationForm');

//registed route for clients meetings request form submit
Route::post('meetingResFormSubmit','meetingsController@meetingsResFormSubmit');

//meeting admin
Route::get('meetingResAdminPg','meetingsController@meetingResAdminPg');

//meeting admin
Route::get('meetingRes/viewRes/{id}','meetingsController@viewMeetingRes');
