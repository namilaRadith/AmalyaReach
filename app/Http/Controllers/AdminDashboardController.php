<?php namespace App\Http\Controllers;
use App\Contacts;
use App\GalleryContent;
use App\aboutUsPage;

use App\Http\Requests\UploadGalleryImageRequest;
use App\SliderImage;
use App\Subscriber;

use Illuminate\Http\Request;
use App\DinningReservation;
use App\meetingsReservation;



use Input;





class AdminDashboardController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');


	}

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

        $newMeetingResCount=meetingsReservation::getNewResCount();
        $diningNewResCount=DinningReservation::getResCount();

        $count=$newMeetingResCount+$diningNewResCount;

        return view('pages.admin.admin_index',compact('newMeetingResCount','diningNewResCount','count'));
	}

	public function showImageSlider(){
		$s =  SliderImage::all();
		return view('pages.admin.adminSliderImageGallery',array('imageList' => $s));

	}

	public function uploadImageSliderContent(Request $request)
	{
		$s = new SliderImage;
		$s->addSliderImage($request);

		return redirect()->action('AdminDashboardController@showImageSlider');

	}


	public function showImageGallery()
	{

		$galleryContent =  GalleryContent::where('contentType','=','image')->get();
		return view('pages.admin.adminImageGallery',array('imageList' => $galleryContent, 'status' =>null));
	}

	public function uploadImageToGallery(UploadGalleryImageRequest $request)
	{

		if (GalleryContent::saveContent($request, 'image', 'imageTitle', 'client/img/img-gallery')) {
			return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'Image has been successfully uploaded');
		} else {
			return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'error occurred');
		}


	}

	public function deleteImageFromGallery($id) {

		if (GalleryContent::deleteContent($id,'client/img/img-gallery/')){
			return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'Image has been removed from the server ');;
		} else {
			return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'error occurred');;
		}


	}

	public function uploadVideoToGallery(Request $request)
	{
		if (GalleryContent::saveContent($request, 'video', 'videoTitle', 'client/video/vid-gallery')) {
			return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'Image has been successfully uploaded');
		} else {
			return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'error occurred');
		}


	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function showVideoGallery()
	{
		$galleryContent =  GalleryContent::where('contentType','=','video')->get();
		return view('pages.admin.adminVideoGallery',array('videoList' => $galleryContent));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showDinningList()
	{
		return view('pages.admin.adminDinningList');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showAddDinningMenu()
	{
		return view('pages.admin.adminAddDinningMenu');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showAboutUs()
	{
		$aboutUs =  aboutUsPage::all();
		return view('pages.admin.adminAboutUs',array('aboutUs' => $aboutUs));
	}

	public function updateAboutUsBasics(Request $request){

		return 'ok';
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showContactUs()
	{
		$contacts = Contacts::all();
		return view('pages.admin.adminContactUs',array('contacts'=>$contacts));
	}

	public function updateContactUs(Request $request) {
		$contacts = Contacts::find(1);

		$contacts->adddress = $request->input('adddress');
		$contacts->telephone = $request->input('telephone');
		$contacts->fax = $request->input('fax');
		$contacts->mobile = $request->input('mobile');
		$contacts->email = $request->input('email');

		$contacts->save();

		$contacts = Contacts::all();
		return view('pages.admin.adminContactUs',array('contacts'=>$contacts));

	}


	public function showCreateNewsLetter(){

		return view('pages.admin.createNewsLetter');
	}

	public function sendNewsLetter()
	{

		if (Request::ajax()) {

			$data = Input::all();

			$transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
				->setUserName('namila.mail.tester@gmail.com')
				->setPassword('0771950394');

			$mailler = \Swift_Mailer::newInstance($transport);

			$subscribers = Subscriber::all();

			foreach ($subscribers as $s) {
				$message = \Swift_Message::newInstance()
					->setSubject(Input::get('subject'))
					->setFrom('namila.mail.tester@gmail.com', 'Amalya Reach')
					->setTo($s->email)
					->setBody(Input::get('body'), 'text/html');

				$numSent = $mailler->send($message);
			}

			printf("Sent %d messages\n", $numSent);


		}

	}

	public function sendEmails()
	{
		$data = Input::all();

		$transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
			->setUserName('namila.mail.tester@gmail.com')
			->setPassword('0771950394');

		$mailler = \Swift_Mailer::newInstance($transport);

		$subscribers = Subscriber::all();

		foreach ($subscribers as $s) {
			$message = \Swift_Message::newInstance()
				->setSubject(Input::get('subject'))
				->setFrom('namila.mail.tester@gmail.com', 'Amalya Reach')
				->setTo($s->email)
				->setBody(Input::get('body'), 'text/html');

			$numSent = $mailler->send($message);
		}

		printf("Sent %d messages\n", $numSent);
	}


}
