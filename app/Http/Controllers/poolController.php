<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\poolReservation;
use Auth;
use DB;
use Request;


class poolController extends Controller {

    function checkAvailability()
    {
        return view('pages.client.specials.poolCheckAvailability');

    }

    public function poolReservation(Requests\poolCheckAvailabilityRequest $request)
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




        $startDate = \Input::get('start_date');
        $endDate = \Input::get('end_date');
        $activityType = \Input::get('activity_type');
        $startTime = \Input::get('startTime');
        $endTime = \Input::get('endTime');
        $ageGroup = \Input::get('age_group');
        $minAge = \Input::get('minAge');
        $maxAge = \Input::get('maxAge');


       
        session()->put('startData_pool',$startDate);
        session()->put('endDate_pool',$endDate);
        session()->put('activity_type',$activityType);
        session()->put('startTime',$startTime);
        session()->put('endTime',$endTime);
        session()->put('ageGroup_pool',$ageGroup);
        session()->put('minAge',$minAge);
        session()->put('maxAge',$maxAge);


        $date1=date_create($startDate);
        $date2=date_create($endDate);
        $diff=date_diff($date1,$date2);
        $price= $diff->format("%R%a days");
        $totPrice=($price+1)*90;

        $reservationDates = poolReservation::getReservedDates($startDate,$endDate,"+1 day", "d-m-Y");


        foreach($reservationDates as $reservationDate){

            $countRes=poolReservation::poolCheckAvailability($reservationDate);

              if($countRes>0)
              {
                  \Session::flash('flash_Error', 'Requested Date Time slot not available!!');
                  return redirect('pool');              }

        }


                return view('pages.client.specials.poolReservationForm')->with('price',$totPrice);

    }

    public function poolFormSubmit()
    {
        //Previous form submited data
        $startDate    = session()->get('startData_pool');
        $endDate      = session()->get('endDate_pool');
        $activityType = session()->get('activity_type');
        $startTime    = session()->get('startTime');
        $endTime      = session()->get('endTime');
        $ageGroup     = session()->get('ageGroup_pool');
        $ageFrom      = session()->get('minAge');
        $ageTo        = session()->get('maxAge');
        $custId       = session()->get('userID');


        $ageRange =$ageFrom."-".$ageTo;

        $id=poolReservation::addPoolReservation($startDate,$endDate,$activityType,$startTime,$endTime,$ageGroup,$ageRange,$custId);

        $reservationDates = array();

        $reservationDates = poolReservation::getReservedDates($startDate,$endDate,"+1 day", "d-m-Y");


        foreach($reservationDates as $reservationDate){

           poolReservation::insertToPoolCheckAvailability($reservationDate,$id);
        }

        return redirect()->action('specialsController@specialsHome');

    }

}
