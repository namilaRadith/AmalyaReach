<?php namespace App\Http\Controllers;
use App\Contacts;
use App\GalleryContent;
use App\aboutUsPage;
use App\Subscriber;
use Illuminate\Support\Facades\File;
use App\Http\Requests;
use Validator;
use Input;
use Request;
use Mail;





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

	public function uploadImageToGallery(Requests\UploadGalleryImageRequest $request)
	{


		$galleryContent = new GalleryContent();
		$file = Input::file('image');
		$fileName = explode(".", $file->getClientOriginalName());
		$fileExtention = $file->getClientOriginalExtension();
		$fileType = 'img';
		$fileDescription = $request->input('imageTitle');
		$file->move('client/img/img-gallery', $file->getClientOriginalName());
		$galleryContent->contentType = $fileType;
		$galleryContent->contentName = $fileName[0];
		$galleryContent->contentFileExtension = $fileExtention;
		$galleryContent->contentDescription = $fileDescription;
		$galleryContent->save();

		return redirect()->action('AdminDashboardController@showImageGallery');


	}

	public function deleteImageFromGallery($id) {
		$galleryContent =  GalleryContent::find($id);
		$path = 'client/img/img-gallery/'.$galleryContent->contentName.'.'.$galleryContent->contentFileExtension;
		File::Delete($path);
		$galleryContent->delete();

		return redirect()->action('AdminDashboardController@showImageGallery');
	}

	public function uploadVideoToGallery(Request $request){
		$galleryContent = new GalleryContent();
		$file = Input::file('video');
		$fileName = explode(".", $file->getClientOriginalName());
		$fileExtention = $file->getClientOriginalExtension();
		$fileType = 'video';
		$fileDescription = $request->input('videoTitle');
		$file->move('client/video/vid-gallery', $file->getClientOriginalName());
		$galleryContent->contentType = $fileType;
		$galleryContent->contentName = $fileName[0];
		$galleryContent->contentFileExtension = $fileExtention;
		$galleryContent->contentDescription = $fileDescription;
		$galleryContent->save();
		return redirect()->action('AdminDashboardController@showVideoGallery');
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
}
