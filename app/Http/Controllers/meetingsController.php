<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\meetingsReservation;

use Carbon\Carbon;

class meetingsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['only' => 'meetingsReservationForm']);

    }


    /**
     * Show the Meeting Reservation facilities
     *
     * @return Response
     */
    function  meetingsReservation()
    {

        return view('pages.client.specials.meetingReservation');

    }

    /**
     * Show meeting Reservation Form
     *
     * @return Response
     */
    public function meetingsReservationForm()
    {
        //Extract user details of the logged in user
        $userID = Auth::user()->id;
        $userTitle = Auth::user()->title;
        $userName = Auth::user()->name;
        $latsName = Auth::user()->last_name;
        $userEmail = Auth::user()->email;
        $userLastName = Auth::user()->last_name;
        $userAddress = Auth::user()->address;
        $userCountry = Auth::user()->country;
        $userPhone = Auth::user()->phone;

        //Store details in the current Session
        session()->put('userID', $userID);
        session()->put('userName', $userName);
        session()->put('userTitle', $userTitle);
        session()->put('latsName', $latsName);
        session()->put('userEmail', $userEmail);
        session()->put('userLastName', $userLastName);
        session()->put('userAddress', $userAddress);
        session()->put('userCountry', $userCountry);
        session()->put('userPhone', $userPhone);

        return view('pages.client.specials.meetingReservatonForm');

    }

    /**
     * Submit meeting reservation form
     *
     * @return Response
     */
    public function meetingsResFormSubmit()
    {

        //Get Input Parameters
        $dateTo = \Input::get('dateTo');
        $dateFrom = \Input::get('dateFrom');
        $dateFlex = \Input::get('dateFlex');
        $noGuessRooms = \Input::get('noOfGuessRooms');

        $mtnEvenReqFood = \Input::get('mtnEvenReqFood');
        $mtnEvenReqMedia = \Input::get('mtnEvenReqMedia');
        $locFlex = \Input::get('locFlex');
        $noGuests = \Input::get('noOfGuests');
        $noOfMeetingRooms = \Input::get('noOfMeetingRooms');
        $additionalInfo = \Input::get('addDetails');
        $company = \Input::get('company');
        $likeContact = \Input::get('phoneCall');

        $userID = Auth::user()->id;

        meetingsReservation::meetingReservationDataInsert($dateTo, $dateFrom, $dateFlex, $noGuessRooms,
            $mtnEvenReqFood, $mtnEvenReqMedia, $locFlex, $noGuests, $noOfMeetingRooms, $additionalInfo, $company,
            $likeContact, $userID);

        return redirect()->action('specialsController@specialsHome');

    }

    /**
     * Show meeting reservation details to admin
     *
     * @return Response
     */
    public function meetingResAdminPg()
    {
        //Get today's date
        $carbon_today = Carbon::today();
        $carbon_today->format('m/d/Y');

        meetingsReservation::updateClosingDate($carbon_today);
        $meetingsRes = meetingsReservation::getResDetails();

        return view('pages.admin.meetings.meetingReservations', compact('meetingsRes'));


    }

    /**
     * Show a particular meeting reservation details to admin in detailed form
     * @param $id
     * @return Response
     */
    public function viewMeetingRes($id)
    {

        $reservationInfo = meetingsReservation::findOrFail($id);
        $userId = meetingsReservation::getCusId($id);
        meetingsReservation::updateStatus($id);

        $userDetails = meetingsReservation::getCusDetails($userId);

        return view('pages.admin.meetings.meetingResDetails', compact('reservationInfo', 'userDetails'));


    }


    /**
     * Accept a meetings reservation and email to the user
     * @param $id
     * @return Response
     */
    function confirmMeeting($id)
    {
        $info = meetingsReservation::findOrFail($id);
        $name = meetingsReservation::getCustName($id);
        meetingsReservation::updateStatusToAccepted($id);

        $subject = "Meeting Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your meeting reservation at Amalya Reach is made sucessfully!!.";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Your Reservation details as follows: ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Customer Name: ";
        $body .= $name;
        $body .= "<br>";

        $body .= "Reservation Dates: ";
        $body .= "From " . $info->dateFrom . " to " . $info->dateTo;
        $body .= "<br>";

        $body .= "No of Gusts: ";
        $body .= $info->noOfGuests;
        $body .= "<br>";

        $body .= "No of Conference rooms: ";
        $body .= $info->noOfMeetingRooms;
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

        return redirect()->action('meetingsController@meetingResAdminPg');

    }


    /**
     * Reject a meetings reservation and send email to the user
     * @param $id
     * @return Response
     */
    function rejectMeeting($id)
    {
        meetingsReservation::updateStatusToRejected($id);


        $subject = "Meeting Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your meeting reservation at Amalya Reach is rejected due to unavoidable situations!!.";
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
