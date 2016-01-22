<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

/*
 * Specific controller class which is handling client side navigation
 * make sure to add your all client side page navigations to this controller
 * */

class clientNavigationController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	//navigate client to the Gallery page
	public function showGallery() {
		return view('pages.client.clientGallery');
	}

	public function showAbout()	{
		return view('pages.client.clientAboutUs');
	}

	public function showRoomList() {
		return view('pages.client.clientRoomList');
	}

	public function showDinningList() {
		return view('pages.client.clientDinningList');
	}

	public function showFacilitiesList() {
		return view('pages.client.clientFacilitiesList');
	}

	public function showFunctionList() {
		return view('pages.client.clientFunctionList');
	}




}
