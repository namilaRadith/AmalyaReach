<?php namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GalleryContent;
use App\aboutUsPage;
use App\Subscriber;
use Request;
use Input;

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
		$galleryContentImages =  GalleryContent::where('contentType','=','img')->get();
		$galleryContentVideos =  GalleryContent::where('contentType','=','video')->get();
		return view('pages.client.clientGallery',array('imageList' => $galleryContentImages,'videoList' => $galleryContentVideos));

	}
	//this function navigate client to the About Us page
	public function showAbout()	{
		$aboutUs =  aboutUsPage::all();

		return view('pages.client.clientAboutUs',array('aboutUs' => $aboutUs));
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

	public function showContactUs(){

		$contacts = Contacts::all();
		return view('pages.admin.adminContactUs',array('contacts'=>$contacts));
	}

	public function addSubscriber() {
		if(Request::ajax()){
			$subsciber = new Subscriber();
			$subsciber->email = Input::get('email');
			$subsciber->save();

		}
	}


}
