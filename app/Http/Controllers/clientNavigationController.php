<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GalleryContent;

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

	//this function navigate client to the Gallery page
	public function showGallery() {
		$galleryContent =  GalleryContent::where('contentType','=','img')->get();
		return view('pages.client.clientGallery',array('imageList' => $galleryContent));

	}
	//this function navigate client to the About Us page
	public function showAbout()	{
		return view('pages.client.clientAboutUs');
	}

	//this function navigate client to the Show Room List page
	public function showRoomList() {
		return view('pages.client.clientRoomList');
	}

	//this function navigate client to the Show Dinning List page
	public function showDinningList() {
		return view('pages.client.clientDinningList');
	}

	//this function navigate client to the Show Facilities List page
	public function showFacilitiesList() {
		return view('pages.client.clientFacilitiesList');
	}

	//this function navigate client to the Show Function List page
	public function showFunctionList() {
		return view('pages.client.clientFunctionList');
	}




}
