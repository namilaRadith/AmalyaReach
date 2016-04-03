<?php namespace App\Http\Controllers;

use App\Contacts;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\GalleryContent;
use App\aboutUsPage;
use App\Room;
use App\Subscriber;
use Request;
use Input;
use DB;
/*
 * Specific controller class which is handling client side navigation
 * make sure to add your all client side page navigations to this controller
 * */

class clientNavigationController extends Controller
{

    /**
     * show gallery navigation  controller.
     *
     *
     * @return Response
     */
    public function showGallery()
    {
        $galleryContentImages = GalleryContent::where('contentType', '=', 'image')->get();
        $galleryContentVideos = GalleryContent::where('contentType', '=', 'video')->get();
        return view('pages.client.clientGallery', array('imageList' => $galleryContentImages, 'videoList' => $galleryContentVideos));

    }

    /**
     * about us page navigation  controller.
     *
     *
     * @return Response
     */
    public function showAbout()
    {
        $aboutUs = aboutUsPage::all();

        return view('pages.client.clientAboutUs', array('aboutUs' => $aboutUs));
    }

    /**
     * room list page navigation  controller.
     *
     *
     * @return Response
     */
    public function showRoomList()
    {
        return view('pages.client.clientRoomList');
    }

    /**
     * dinning list page navigation  controller.
     *
     *
     * @return Response
     */
    public function showDinningList()
    {
        return view('pages.client.clientDinningList');
    }

    /**
     * facilities page navigation  controller.
     *
     *
     * @return Response
     */
    public function showFacilitiesList()
    {
        return view('pages.client.clientFacilitiesList');
    }

    /**
     * functions list page navigation  controller.
     *
     *
     * @return Response
     */
    public function showFunctionList()
    {
        return view('pages.client.clientFunctionList');
    }

    /**
     * special offers page navigation  controller.
     *
     *
     * @return Response
     */
    public function showSpecialOffers()
    {

        $rooms_discounts = DB::table('special_offers')
            ->select('special_offers.*')
            ->where('special_offers.flag','=','1')
            ->get();


        $rooms_discount = DB::table('special_offers')
            ->join('special_offer_contents', 'special_offers.offer_code','=','special_offer_contents.offer_id')
            ->join('tbl_rooms','special_offer_contents.ref_table_id','=','tbl_rooms.id')
            ->join('tbl_roomtypes','tbl_roomtypes.id','=','tbl_rooms.type')
            ->select( 'tbl_rooms.*','tbl_roomtypes.*','special_offer_contents.*')
            ->get();
//    var_dump(json_encode($rooms_discount));
//        var_dump(json_encode($rooms_discounts));

       return view('pages.client.clientSpecialOffers',array('rooms' => $rooms_discount,'offer'=>$rooms_discounts));
    }

    /**
     * contacts-us page navigation controller.
     *
     *
     * @return Response
     */
    public function showContactUs()
    {

        $contacts = Contacts::all();
        return view('pages.admin.adminContactUs', array('contacts' => $contacts));
    }

    /**
     * add subscriber controller.
     *
     * @param  string $email
     * @return Response
     */
    public function addSubscriber()
    {
        if (Request::ajax()) {
            $s = new Subscriber();
            $s->addSubsciber(Input::get('email'));


        }
    }
    public function showLoyalty(){

        return view('pages.client.Loyalty.clientLoyalty');
    }


}
