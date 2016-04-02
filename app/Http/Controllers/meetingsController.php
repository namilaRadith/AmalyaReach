<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;
use App\meetingsReservation;

use Carbon\Carbon;
class meetingsController extends Controller
{
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
        $userID = Auth::user()->id;
        $userTitle = Auth::user()->title;
        $userName = Auth::user()->name;
        $latsName = Auth::user()->last_name;
        $userEmail = Auth::user()->email;
        $userLastName = Auth::user()->last_name;
        $userAddress = Auth::user()->address;
        $userCountry = Auth::user()->country;
        $userPhone = Auth::user()->phone;

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
     * Submit meeting rservation form
     *
     * @return Response
     */
    public function meetingsResFormSubmit()
    {


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
            $mtnEvenReqFood, $mtnEvenReqMedia, $locFlex, $noGuests, $noOfMeetingRooms, $additionalInfo, $company,$likeContact,$userID);

        return redirect()->action('specialsController@specialsHome');

    }

    /**
     * Show meeting reservation details to admin
     *
     * @return Response
     */
    public function meetingResAdminPg()
    {
        $meetingsRes = meetingsReservation::getResDetails();
        $newMeetingResCount=meetingsReservation::getNewResCount();
        $diningNewResCount=0;

        $count=$newMeetingResCount+$diningNewResCount;

        $carbon_today= Carbon::today();
        $carbon_today->format('m/d/Y');
        meetingsReservation::updateClosingDate($carbon_today);

        return view('pages.admin.meetings.meetingReservations',compact('meetingsRes', 'newMeetingResCount','diningNewResCount','count'));


    }

    /**
     * Show meeting reservation details to admin in detailed form
     * @param $id
     * @return Response
     */
    public function viewMeetingRes($id)
    {
        $count=0;

        $reservationInfo = meetingsReservation::findOrFail($id);
        $userId=meetingsReservation::getCusId($id);
         meetingsReservation::updateStatus($id);

        $userDetails=meetingsReservation::getCusDetails($userId);

        return view('pages.admin.meetings.meetingResDetails',compact('reservationInfo','userDetails','count'));


    }




}
