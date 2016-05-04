<?php namespace App\Http\Controllers;

use App\dinningDetail;
use App\dinningMenuItem;
use App\DinningReservation;
use App\Http\Requests;
use Auth;
use App\Http\Requests\createAddMenuItemRequest;
use Response;
use Carbon\Carbon;
use session;

class dinningController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',['only' => 'dinningReservation']);

    }


    /**
     * Show dinning reservation page
     *
     * @return Response
     */
    function dinningReservation()
    {
        //Extract user details of the logged in user
        $userID = Auth::user()->id;
        $userName = Auth::user()->name;
        $latsName = Auth::user()->last_name;
        $userEmail = Auth::user()->email;
        $userTitle = Auth::user()->title;
        $userLastName = Auth::user()->last_name;
        $userAddress = Auth::user()->address;
        $userCountry = Auth::user()->country;
        $userPhone = Auth::user()->phone;

        //Store details in the current Session
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

        //Get Input Parameters
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

        DinningReservation::dinningReservationDataInsert($custTitle, $firstName, $lastName, $email, $phone,
            $resLocation, $bookingDate, $bookingTime, $noOfAdults, $noOfChildren, $additionalInfo);
        return redirect()->action('specialsController@specialsHome');
    }

    /**
     *Show dinning menu
     *
     * @return Response
     */
   public function  dinningMenuDisplay()
    {
        //Retrive dinning menu informaion in catagories
        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();
        $diningMenuCat7 = dinningMenuItem::FoodCat7()->get();

        return view('pages.client.specials.dinningMenuDisplay', compact('diningMenuCat1', 'diningMenuCat2',
            'diningMenuCat3', 'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6', 'diningMenuCat7'));


    }

    /**
     * Add dinning menu items
     *
     * @return Response
     */
    public function  diningAddMenuForm()
    {

        return view('pages.admin.dinning.diningAddMenu');

    }

    /**
     * Submit dinning rservation form
     * @param  $request
     * @return Response
     */
    public function  diningAddMenu(Requests\createAddMenuItemRequest $request)
    {

        //Get Input Parameters
        $itemName = \Input::get('itemName');
        $foodCat = \Input::get('foodCatagory');
        $qty = \Input::get('quantitiy');
        $price = \Input::get('price');

        //Check if the item already exists
        $itemCount = dinningMenuItem::checkUniqueItems($foodCat, $itemName);

        if ($itemCount == 1) {

            \Session::flash('flash_messageError', 'Food Item already in the dinning menu!!');
            return redirect('diningAddMenu');

        } else {

            dinningMenuItem::dinningMenuDataInsert($itemName, $foodCat, $qty, $price);

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

        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();

        return view('pages.admin.dinning.diningMenu', compact('diningMenuCat1', 'diningMenuCat2', 'diningMenuCat3',
            'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6'));
    }

    /**
     * Show Dinning menu edit form
     * @param $id
     * @return Response
     */
    public function diningMenuEdit($id)
    {

        $foodItem = dinningMenuItem::findOrFail($id);
        return view('pages.admin.dinning.diningMenuEdit', compact('foodItem', 'count'));
    }

    /**
     *Submit dinning menu item edit form
     * @param $id
     * @param $request
     * @return Response
     */
    public function updateDiningItem($id, Requests\createAddMenuItemRequest $request)
    {
        //Get Input Parameters
        $itemName = \Input::get('itemName');
        $foodCat = \Input::get('foodCatagory');
        $qty = \Input::get('quantitiy');
        $price = \Input::get('price');

        dinningMenuItem::updateMenu($id, $itemName, $foodCat, $qty, $price);

        $diningMenuCat1 = dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2 = dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3 = dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4 = dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5 = dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6 = dinningMenuItem::FoodCat6()->get();

        \Session::flash('flash_message', 'One Item Edited!!');
        return view('pages.admin.dinning.diningMenu', compact('diningMenuCat1', 'diningMenuCat2', 'diningMenuCat3', 'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6'));

    }

    /**
     *Delete dinning menu item
     * @param $id
     * @return Response
     */
    public function deleteFoodItem($id)
    {

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
            'diningMenuCat4', 'diningMenuCat5', 'diningMenuCat6'));


    }

    /**
     * Show dinning reservations
     *
     * @return Response
     */
    function viewDinningReservations()
    {
        //Getcurrent date
        $carbon_today = Carbon::today();
        $carbon_today->format('m/d/Y');

        DinningReservation::updateClosingDate($carbon_today);

        $reservationInfo = DinningReservation::getReservationDetails();

        return view('pages.admin.dinning.diningResList', compact('reservationInfo'));
    }


    /**
     * Show details of a particular dinning reservations
     *
     * @return Response
     */
    function viewMoreDinningRes($id)
    {

        $reservationInfo = DinningReservation::findOrFail($id);
        DinningReservation::updateStatus($id);
        return view('pages.admin.dinning.dinningViewRes', compact('reservationInfo'));
    }

    /**
     * Accept a dinning reservation and email to the user
     * @param $id
     * @return Response
     */
    function confirmDinningRes($id)
    {
        $reservationInfo = DinningReservation::getReservationDetails();
        $info = DinningReservation::findOrFail($id);
        DinningReservation::updateStatusToAccepted($id);

        $subject = "Dinning Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your dinning reservation at Amalya Reach is made sucessfully!!.";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Your Reservation details as follows: ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Customer Name: ";
        $body .= $info->custId;
        $body .= "<br>";

        $body .= "Reservation Date: ";
        $body .= $info->bookingDate;
        $body .= "<br>";

        $body .= "Reservation Time: ";
        $body .= $info->bookingTime;
        $body .= "<br>";

        $body .= "No of Adults: ";
        $body .= $info->noOfAdults;
        $body .= "<br>";

        $body .= "No of Children: ";
        $body .= $info->noOfChildren;
        $body .= "<br>";


        $body .= "<br>";
        $body .= "<br>";
        $body .= "Hope to give you Good Service,";
        $body .= "<br>";
        $body .= "Thank you!";
        $body .= "<br>";
        $body .= "Amalya Reach";


        try {
            $transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUserName('namila.mail.tester@gmail.com')
                ->setPassword('0771950394');

            $mailler = \Swift_Mailer::newInstance($transport);


            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom('dewmirandika@gmail.com', 'Amalya Reach')
                ->setTo($sendTo)
                ->setBody($body, 'text/html');

            $mailler->send($message);


        } catch (Exception $e) {
            return "Can't send Email.. Error!!!";
        }

        return redirect()->action('dinningController@viewDinningReservations');

    }

    /**
     * Rejct a dinning reservation and email to the user
     * @param $id
     * @return Response
     */
    function rejectDinningRes($id)
    {
        DinningReservation::updateStatusToRejected($id);

        $subject = "Dinning Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your dinning reservation at Amalya Reach is rejected due to unavoidable situations!!.";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Please contact Amalya Resorts for further details ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Email : mailto:amalyareach@yahoo.com";
        $body .= ">Tele/Fax :+94 112748913";
        $body .= "556, Moragahahena Road,Pitipana North,Homagama,Sr Lanka";


        $body .= "<br>";
        $body .= "<br>";
        $body .= "Hope to give you Good Service,";
        $body .= "<br>";
        $body .= "Thank you!";
        $body .= "<br>";
        $body .= "Amalya Reach";


        try {
            $transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUserName('namila.mail.tester@gmail.com')
                ->setPassword('0771950394');

            $mailler = \Swift_Mailer::newInstance($transport);


            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom('dewmirandika@gmail.com', 'Amalya Reach')
                ->setTo($sendTo)
                ->setBody($body, 'text/html');

            $mailler->send($message);


        } catch (Exception $e) {
            return "Can't send Email.. Error!!!";
        }

        return redirect()->action('dinningController@viewDinningReservations');
    }


}
