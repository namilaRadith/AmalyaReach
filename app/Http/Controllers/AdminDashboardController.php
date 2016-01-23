<?php namespace App\Http\Controllers;
use App\GalleryContent;
use \Input as Input;
use App\Http\Requests;
use Illuminate\Http\Request;




class AdminDashboardController extends Controller {

	function set_active($path, $active = 'active') {

		return call_user_func_array('Request::is', (array)$path) ? $active : '';

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('pages.admin.admin_index');
	}


	public function showImageGallery()
	{

		$galleryContent =  GalleryContent::where('contentType','=','img')->get();
		return view('pages.admin.adminImageGallery',array('imageList' => $galleryContent));
	}

	public function uploadImageToGallery(Request $request)
	{
		if (Input::hasFile('image')) {

			$galleryContent = new GalleryContent();

			$file = Input::file('image');
			$fileName = explode(".",$file->getClientOriginalName());
			$fileExtention = $file->getClientOriginalExtension();
			$fileType ='img';
			$fileDescription = $request->input('contentTitle');
			$file->move('client/img/img-gallery', $file->getClientOriginalName());

			$galleryContent->contentType = $fileType;
			$galleryContent->contentName =$fileName[0];
			$galleryContent->contentFileExtension =$fileExtention;
			$galleryContent->contentDescription = $fileDescription;

			$galleryContent->save();

		}

		return redirect()->action('AdminDashboardController@showImageGallery');


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function showVideoGallery()
	{
		return 'video gal';
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
