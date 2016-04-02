<?php namespace App\Http\Controllers;

use App\dinningDetail;
use App\dinningMenuItem;
use App\DinningReservation;
use App\Http\Requests;
use Auth;
use Request;
use Response;
use Carbon\Carbon;

class dinningController extends Controller
{
    /**
     * Show dinning reservation page
     *
     * @return Response
     */
    function dinningReservation()
    {

        $userID = Auth::user()->id;
        $userName = Auth::user()->name;
        $latsName = Auth::user()->last_name;
        $userEmail = Auth::user()->email;
        $userTitle = Auth::user()->title;
        $userLastName = Auth::user()->last_name;
        $userAddress = Auth::user()->address;
        $userCountry = Auth::user()->country;
        $userPhone = Auth::user()->phone;

        session()->put('userID', $userID);
        session()->put('userName', $userName);
        session()->put('latsName', $latsName);
        session()->put('userEmail', $userEmail);
        session()->put('userTitle', $userTitle);
        session()->put('userLastName', $userLastName);
        session()->put('userAddress', $userAddress);
        session()->put('userCountry', $userCountry);
        session()->put('userPhone', $userPhone);


        $dining = dinningDetail::all();
        return view('pages.client.specials.dinningReservation')->with('dining', $dining);

    }

    /**
     * Submit dinning rservation form
     *
     * @return Response
     */
    public function diningReservationSubmit()
    {

        $custTitle = \Input::get('title');
        $firstName = \Input::get('fname');
        $lastName = \Input::get('lastName');
        $email = \Input::get('email');
        $phone = \Input::get('phone');
        $resLocation = \Input::get('resType');
        $bookingDate = \Input::get('bookingDate');
        $bookingTime = \Input::get('bookingTime');
        $noOfAdults = \Input::get('adults');
        $noOfChildren = \Input::get('children');
        $additionalInfo = \Input::get('addInfo');

        DinningReservation::dinningReservationDataInsert($custTitle, $firstName, $lastName, $email, $phone, $resLocation, $bookingDate, $bookingTime, $noOfAdults, $noOfChildren, $additionalInfo);
        return redirect()->action('specialsController@specialsHome');
    }

    /**
     *Show dinning menu
     *
     * @return Response
     */
    function  dinningMenuDisplay()
    {
        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();
        $diningMenuCat7 = dinningMenuItem::FoodCat7()->get();

        return view('pages.client.specials.dinningMenuDisplay', compact('diningMenuCat1', 'diningMenuCat2', 'diningMenuCat3', 'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6','diningMenuCat7'));


    }

    /**
     * Add dinning menu items
     *
     * @return Response
     */
    public function  diningAddMenuForm()
    {
           $count=0;

        return view('pages.admin.dinning.diningAddMenu',compact('count'));

    }

    /**
     * Submit dinning rservation form
     * @param  $request
     * @return Response
     */
    public function  diningAddMenu(Requests\createAddMenuItemRequest $request)
    {
         $count=0;

        $itemName = \Input::get('itemName');
        $foodCat = \Input::get('foodCatagory');
        $qty = \Input::get('quantity');
        $price = \Input::get('price');

        $itemCount=dinningMenuItem::checkUniqueItems($foodCat,$itemName);


        if($itemCount == 1)
        {

            \Session::flash('flash_messageError', 'Food Item already in the dinning menu!!');
            return redirect('diningAddMenu');
        }
      else{
        dinningMenuItem::dinningMenuDataInsert($itemName,$foodCat,$qty,$price);



        \Session::flash('flash_message', 'Food Item Added Sucessfully!!');
        return redirect('diningAddMenu');
        }
      }

    /**
     * Show dinning menu
     *
     * @return Response
     */
    public function diningMenu()
    {
        $count=0;


        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();

        return view('pages.admin.dinning.diningMenu', compact('diningMenuCat1', 'diningMenuCat2', 'diningMenuCat3', 'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6','count'));
    }

    /**
     * Show Dinning menu edit form
     * @param $id
     * @return Response
     */
    public function diningMenuEdit($id)
    {

        $count=0;
        $foodItem = dinningMenuItem::findOrFail($id);
        return view('pages.admin.dinning.diningMenuEdit',compact('foodItem','count'));
    }


    /**
     *Submit dinning menu item edit form
     * @param $id , $request
     * @return Response
     */


//
//    public function updateDiningItem($id, Requests\createAddMenuItemRequest $request)
//    {
//        $foodItem = dinningMenuItem::findOrFail($id);
//        $foodItem->update($request->all());
//
//        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
//        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
//        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
//        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
//        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
//        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();
//
//        \Session::flash('flash_message', 'One Item Edited!!');
//        return view('pages.admin.dinning.diningMenu', compact('diningMenuCat1', 'diningMenuCat2', 'diningMenuCat3', 'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6'));
//
//    }


    public function updateDiningItem($id)
    {
        return "sdas";
    }




    /**
     *Delete dinning menu item
     * @param $id
     * @return Response
     */
    public function deleteFoodItem($id)
    {
        $count=0;
        $foodItem = dinningMenuItem::findOrFail($id);
        $foodItem->delete();

        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();

        \Session::flash('flash_message', 'One Item Deleted!!');
        return view('pages.admin.dinning.diningMenu', compact('diningMenuCat1', 'diningMenuCat2', 'diningMenuCat3',
            'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6','count'));


    }


    /**
     * Show dinning reservations
     *
     * @return Response
     */
    function viewDinningReservations()
    {
        $newMeetingResCount=0;

        $reservationInfo = DinningReservation::getReservationDetails();

        $carbon_today= Carbon::today();
        $carbon_today->format('m/d/Y');

        DinningReservation::updateClosingDate($carbon_today);


        $diningNewResCount=DinningReservation::getResCount();
        $count=$diningNewResCount;
        return view('pages.admin.dinning.diningResList',compact('reservationInfo','newMeetingResCount','diningNewResCount','count'));
    }

    function viewMoreDinningRes($id)
    {
        $count=0;
        $reservationInfo = DinningReservation::findOrFail($id);
        DinningReservation::updateStatus($id);
        return view('pages.admin.dinning.dinningViewRes',compact('reservationInfo', 'count'));
    }

    function getNewNotifyCount()
    {
         return json_encode("Return res count");


    }




}
