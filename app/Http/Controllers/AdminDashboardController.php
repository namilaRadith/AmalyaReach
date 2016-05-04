<?php
namespace App\Http\Controllers;



use Andheiberg\Notify\Facades\Notify;
use App\Answer;
use App\Contacts;
use App\GalleryContent;
use App\aboutUsPage;

use App\Http\Requests\UploadGalleryImageRequest;
use App\Question;
use App\Questioner;
use App\SliderImage;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;


use Input;


class AdminDashboardController extends Controller
{

    public function __construct()
    {
       // $this->middleware('auth');
      //  $this->middleware('admin');


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
        $sliderImage = new SliderImage;

            if ($sliderImage->addSliderImage($request)) {
                Notify::success('Image uploaded successfully');
            } else {
                Notify::error('Image is already existing in server');
            }

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
        return view('pages.admin.adminImageGallery2', array('imageList' => $galleryContent, 'status' => null));
    }


    /**
     * upload new gallery image to the database
     * @param Request $request
     * @return Response
     */
    public function uploadImageToGallery( Request $request)

    {

        if (GalleryContent::saveContentImage($request, 'img_pre', 'imageTitle', 'client/img/img-gallery')) {
            Notify::success('Image uploaded successfully');
        } else {
            Notify::error('Image is already existing in server');
        }

        return redirect()->action('AdminDashboardController@showImageGallery');

    }

    /**
     * delete given gallery image from the database
     * @param int $id
     * @return Response
     */
    public function deleteImageFromGallery($id)
    {

        if (GalleryContent::deleteContent($id, 'client/img/img-gallery/')) {
            Notify::success('Image removed form gallery successfully');
        } else {
            Notify::success('Video uploaded successfully');
        }

        return redirect()->action('AdminDashboardController@showImageGallery');


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
            Notify::success('Video uploaded successfully');
            return redirect()->action('AdminDashboardController@showVideoGallery');
        } else {
            Notify::error('Video is already existing in server');
            return redirect()->action('AdminDashboardController@showVideoGallery');
        }


    }

    /**
     * delete existing video to the database
     * @param int $id
     * @return Response
     */
    public function deleteVideoFromGallery($id){
        if (GalleryContent::deleteContent($id, 'client/video/vid-gallery/')) {
            Notify::success('Video deleted successfully');
            return redirect()->action('AdminDashboardController@showVideoGallery');
        } else {
            Notify::warning('Video was not deleted');
            return redirect()->action('AdminDashboardController@showVideoGallery');
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

    public function listAllUsers(){
        $users = User::all();

        return view('pages.admin.adminListAllUsers',array("users" => $users));
    }

    public function showAddPowerUser(){
        return view('pages.admin.adminAddPowerUser');
    }


    /**
     * show showManageQuestioners page
     *
     * @return Response
     */
    public function  showManageQuestioners()
    {
        return view('pages.admin.adminManageQuestioners');
    }

    /**
     * show showManageQuestioners page
     *
     * @return Response
     */
    public function  showCreateQuestioners()
    {
        return view('pages.admin.adminCreateQuestioner');
    }


    /**
     * show showManageQuestioners page
     *
     * @return Response
     */
    public function  getAllQuestioners()
    {
       echo Questioner::all();
    }

    /**
     * show showManageQuestioners page
     *
     * @return Response
     */
    public function  getAllQuestions($id)
    {
        echo Question::where('questioner_id', '=', $id)->get();
    }

    /**
     * show showManageQuestioners page
     *
     * @return Response
     */

    public function  createQuestioners()
    {
        if (\Request::isJson()) {
            $data = Input::all();
            //var_dump($data);

            Questioner::createQuestioner($data);
        }
    }

    /**
     * show showManageQuestioners page
     *
     * @return Response
     */

    public function  showEditQuestioner($id)
    {
        if (Questioner::isEditable($id)) {

            $questioner = '{ "questioner" :' . Questioner::find($id);
            $questioner .= ', "questions" : ' . Questioner::find($id)->question . ' }';

            return view('pages.admin.adminEditQuestioner')->with('q', $questioner);
        } else {

            Notify::error('System not allowed to proceed this operation');
            return redirect()->action('AdminDashboardController@showManageQuestioners');
        }

    }

    public function updateQuestioner($id){
        if (\Request::isJson()) {
            $data = Input::all();
            Questioner::updateQuestioner($data);
        }
    }

    public function publishQuestioner($id){
        Questioner::makePublic($id);
    }

    public function viewQuestionerResult($id){
        //Answer::getUserRatingsCountPerQuestion(21,4);
       $data = Questioner::getQuestionerResults($id);
        return view('pages.admin.adminAnalizeQuestioner')->with('data',$data);
    }
}
