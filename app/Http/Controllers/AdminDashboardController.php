<?php
namespace App\Http\Controllers;

use Andheiberg\Notify\Facades\Notify;
use App\Contacts;
use App\GalleryContent;
use App\aboutUsPage;

use App\Http\Requests\UploadGalleryImageRequest;
use App\SliderImage;
use App\Subscriber;
use Illuminate\Http\Request;


use Input;


class AdminDashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');


    }

    function set_active($path, $active = 'active')
    {

        return call_user_func_array('Request::is', (array)$path) ? $active : '';

    }

    /**
     * Display  admin panel index page
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.admin.admin_index');
    }


    /**
     * Display  admin panel slider image page
     *
     * @return Response
     */
    public function showImageSlider()
    {
        $s = SliderImage::all();
        return view('pages.admin.adminSliderImageGallery', array('imageList' => $s));

    }


    /**
     * upload new slider image to the database
     * @param Request $request
     * @return Response
     */
    public function uploadImageSliderContent(Request $request)
    {
        $s = new SliderImage;
        $s->addSliderImage($request);
        Notify::success('Image uploaded successfully');
        return redirect()->action('AdminDashboardController@showImageSlider');

    }

    /**
     * delete diven slider image from the database
     * @param int $id
     * @return Response
     */
    public function deleteImageFromSlider($id)
    {

        SliderImage::deleteSliderImage($id);

    }


    /**
     * Display  admin panel image gellery page
     *
     * @return Response
     */
    public function showImageGallery()
    {

        $galleryContent = GalleryContent::where('contentType', '=', 'image')->get();
        return view('pages.admin.adminImageGallery', array('imageList' => $galleryContent, 'status' => null));
    }


    /**
     * upload new gallery image to the database
     * @param Request $request
     * @return Response
     */
    public function uploadImageToGallery(UploadGalleryImageRequest $request)
    {

        if (GalleryContent::saveContent($request, 'image', 'imageTitle', 'client/img/img-gallery')) {
            return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'Image has been successfully uploaded');
        } else {
            return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'error occurred');
        }


    }

    /**
     * delete given gallery image from the database
     * @param int $id
     * @return Response
     */
    public function deleteImageFromGallery($id)
    {

        if (GalleryContent::deleteContent($id, 'client/img/img-gallery/')) {
            return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'Image has been removed from the server ');;
        } else {
            return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'error occurred');;
        }


    }


    /**
     * Display  admin panel video gallery page
     *
     * @return Response
     */
    public function showVideoGallery()
    {
        $galleryContent = GalleryContent::where('contentType', '=', 'video')->get();
        return view('pages.admin.adminVideoGallery', array('videoList' => $galleryContent));
    }


    /**
     * upload new gallery video to the database
     * @param Request $request
     * @return Response
     */
    public function uploadVideoToGallery(Request $request)
    {
        if (GalleryContent::saveContent($request, 'video', 'videoTitle', 'client/video/vid-gallery')) {
            return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'Image has been successfully uploaded');
        } else {
            return redirect()->action('AdminDashboardController@showImageGallery')->with('message', 'error occurred');
        }


    }


    /**
     * Display  admin panel dinning list page
     *
     * @return Response
     */
    public function showDinningList()
    {
        return view('pages.admin.adminDinningList');
    }

    /**
     * Display  admin panel dinning menu page
     *
     * @return Response
     */
    public function showAddDinningMenu()
    {
        return view('pages.admin.adminAddDinningMenu');
    }

    /**
     * Display  admin panel about us page
     *
     * @return Response
     */
    public function showAboutUs()
    {
        $aboutUs = aboutUsPage::all();
        return view('pages.admin.adminAboutUs', array('aboutUs' => $aboutUs));
    }

    /**
     * upload about us basic information
     * @param Request $request
     * @return Response
     */
    public function updateAboutUsBasics(Request $request)
    {

        return 'ok';
    }

    /**
     * Display  admin panel contact us page
     *
     * @return Response
     */
    public function showContactUs()
    {
        $contacts = Contacts::all();
        return view('pages.admin.adminContactUs', array('contacts' => $contacts));
    }


    /**
     * update contact us basic information
     * @param Request $request
     * @return Response
     */
    public function updateContactUs(Request $request)
    {
        $contacts = Contacts::find(1);

        $contacts->adddress = $request->input('adddress');
        $contacts->telephone = $request->input('telephone');
        $contacts->fax = $request->input('fax');
        $contacts->mobile = $request->input('mobile');
        $contacts->email = $request->input('email');

        $contacts->save();

        $contacts = Contacts::all();
        return view('pages.admin.adminContactUs', array('contacts' => $contacts));

    }

    /**
     * Display  admin panel news-letter page
     *
     * @return Response
     */
    public function showCreateNewsLetter()
    {

        return view('pages.admin.createNewsLetter');
    }

    /**
     * Send news letter
     *
     * @return Response
     */
    public function sendNewsLetter()
    {

        if (\Request::ajax()) {

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
