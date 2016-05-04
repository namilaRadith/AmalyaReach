<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\meetingsReservation;
use App\poolReservation;
use Auth;
use Carbon\Carbon;

class poolController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth',['only' => 'poolReservation']);

    }

    /**
     * Check availability before placing a reservation
     * @return Response
     */
    function checkAvailability()
    {
        return view('pages.client.specials.poolCheckAvailability');

    }

    /**
     * Swimming pool reservation form
     * @param $request
     * @return Response
     */
    public function poolReservation(Requests\poolCheckAvailabilityRequest $request)
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


        //Get Input Parameters
        $startDate = \Input::get('start_date');
        $endDate = \Input::get('end_date');
        $activityType = \Input::get('activity_type');
        $startTime = \Input::get('startTime');
        $endTime = \Input::get('endTime');
        $ageGroup = \Input::get('age_group');
        $minAge = \Input::get('minAge');
        $maxAge = \Input::get('maxAge');


        //Store Input Parameters in the current Session
        session()->put('startData_pool', $startDate);
        session()->put('endDate_pool', $endDate);
        session()->put('activity_type', $activityType);
        session()->put('startTime', $startTime);
        session()->put('endTime', $endTime);
        session()->put('ageGroup_pool', $ageGroup);
        session()->put('minAge', $minAge);
        session()->put('maxAge', $maxAge);


        //Calculate the total price based on time period of the event
        $date1 = date_create($startDate);
        $date2 = date_create($endDate);
        $diff = date_diff($date1, $date2);
        $days = $diff->format("%R%a days");
        $totPrice = ($days + 1) * 90;


        //See if the requested time duration period is available for a reservation
        $reservationDates = poolReservation::getReservedDates($startDate, $endDate, "+1 day", "d-m-Y");


        //If any of the requested dates not available, display and error message
        foreach ($reservationDates as $reservationDate) {
            $countRes = poolReservation::poolCheckAvailability($reservationDate);

            if ($countRes > 0) {
                \Session::flash('flash_Error', 'Requested Date Time slot not available!!');
                return redirect('pool');
            }

        }


        return view('pages.client.specials.poolReservationForm')->with('price', $totPrice);

    }

    /**
     * Submit swimming pool reservation request
     * @return Response
     */
    public function poolFormSubmit()
    {
        //Previous form submited data
        $startDate = session()->get('startData_pool');
        $endDate = session()->get('endDate_pool');
        $activityType = session()->get('activity_type');
        $startTime = session()->get('startTime');
        $endTime = session()->get('endTime');
        $ageGroup = session()->get('ageGroup_pool');
        $ageFrom = session()->get('minAge');
        $ageTo = session()->get('maxAge');
        $custId = session()->get('userID');
        $specialReq = \Input::get('specialReq');


        $ageRange = $ageFrom . "-" . $ageTo;
        $id = poolReservation::addPoolReservation($startDate, $endDate, $activityType, $startTime, $endTime, $ageGroup, $ageRange, $specialReq, $custId);

        //Get the requested reservation dates form start date to and date
        $reservationDates = poolReservation::getReservedDates($startDate, $endDate, "+1 day", "d-m-Y");


        //for each requested date, place a reservation
        foreach ($reservationDates as $reservationDate) {

            poolReservation::insertToPoolCheckAvailability($reservationDate, $id);
        }

        return redirect()->action('specialsController@specialsHome');

    }



    /**
     * Show Swimming pool reservations details for admin
     * @return Response
     */
    public function adminPoolRes()
    {
        $carbon_today = Carbon::today();
        $carbon_today->format('m/d/Y');
        poolReservation::updateClosingDate($carbon_today);
        $reservationInfo = poolReservation::getReservations();

        return view('pages.admin.pool.poolAdminViewRes', compact('reservationInfo'));

    }

    /**
     * Show a selected reservation's info in detail
     * @param $id
     * @return Response
     */
    public function adminPoolViewMore($id)
    {
        $reservationInfo = poolReservation::findOrFail($id);
        $userId = poolReservation::getCusId($id);
        poolReservation::updateStatus($id);

        $userDetails = meetingsReservation::getCusDetails($userId);

        return view('pages.admin.pool.adminPoolViewMore', compact('reservationInfo', 'userDetails'));
    }

    /**
     * Accepts a Swimming pool reservation and send email to the user
     * @param $id
     * @return Response
     */
    function confirmPoolReservation($id)
    {
        $reservationInfo = poolReservation::getReservations();
        $name = poolReservation::getCustName($id);
        $info = poolReservation::findOrFail($id);
        poolReservation::updateStatusToAccepted($id);

        $subject = "SwimmingPool Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your reservation for Swimming Pool at Amalya Reach is made successfully!!";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Your Reservation details as follows: ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Customer Name: ";
        $body .= $name;
        $body .= "<br>";

        $body .= "Reservation Date From: ";
        $body .= $info->startDate;
        $body .= "<br>";

        $body .= "Date To: ";
        $body .= $info->endDate;
        $body .= "<br>";

        $body .= "Event Type: ";
        $body .= $info->eventType;
        $body .= "<br>";

        $body .= "<br>";
        $body .= "<br>";
        $body .= "Hope to give you Good Service,";
        $body .= "<br>";

        $body .= "Email : mailto:amalyareach@yahoo.com";
        $body .= "<br>";
        $body .= "Tele/Fax :+94 112748913";
        $body .= "<br>";
        $body .= "556, Moragahahena Road,Pitipana North,Homagama,Sr Lanka";


        $body .= "<br>";
        $body .= "<br>";
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

        return redirect()->action('poolController@adminPoolRes');

    }

    /**
     * Reject a Swimming pool reservation and send email to the user
     * @param $id
     * @return Response
     */
    function rejectPoolRes($id)
    {
        meetingsReservation::updateStatusToRejected($id);


        $subject = "Swimming Pool Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your reservation for Swimming Pool at Amalya Reach is rejected due to unavoidable situations!!.";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Please contact Amalya Resorts for further details ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Email : mailto:amalyareach@yahoo.com";
        $body .= "<br>";
        $body .= "Tele/Fax :+94 112748913";
        $body .= "<br>";
        $body .= "556, Moragahahena Road,Pitipana North,Homagama,Sr Lanka";


        $body .= "<br>";
        $body .= "<br>";
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

        return redirect()->action('meetingsController@meetingResAdminPg');


    }


}
