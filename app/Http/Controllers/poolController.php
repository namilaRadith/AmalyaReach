<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use DB;
use Request;


class poolController extends Controller {

    function checkAvailability()
    {
        return view('pages.client.specials.poolCheckAvailability');

    }

    public function poolReservation(Requests\poolCheckAvailabilityRequest $request)
    {
        $startData = \Input::get('start_date');
        $endDate = \Input::get('end_date');
        $activityType = \Input::get('activity_type');
        $startTime = \Input::get('start_time');
        $endTime = \Input::get('end_time');
        $ageGroup = \Input::get('age_group');
        $ageRange = \Input::get('ageRange');

        session()->put('startData_pool',$startData);
        session()->put('endDate_pool',$endDate);
        session()->put('activity_type',$activityType);
        session()->put('start_time',$startTime);
        session()->put('end_time',$endTime);
        session()->put('ageGroup_pool',$ageGroup);
        session()->put('ageRange_pool',$ageRange);


        $date1=date_create($startData);
        $date2=date_create($endDate);
        $diff=date_diff($date1,$date2);
        $price= $diff->format("%R%a days");
        $totPrice=($price+1)*90;



        return view('pages.client.specials.poolReservationForm')->with('price',$totPrice);

    }

    public function poolFormSubmit(){

        //Current form data
        $fname = \Input::get('first_name');
        $lname = \Input::get('last_name');
        $email = \Input::get('email');
        $phone = \Input::get('phone');

         $title = \Input::get('title');
         $address = \Input::get('address');
         $country=\Input::get('country');
         $specialReq=\Input::get('specialReq');


        //Previous form submited data
        $startData    = session()->get('startData_pool');
        $endDate      = session()->get('endDate_pool');
        $activityType = session()->get('activity_type');
        $eventTime    = session()->get('eventTime_pool');
        $ageGroup     = session()->get('ageGroup_pool');
        $ageRange     = session()->get('ageRange_pool');


        $customerID = DB::table('users')->insertGetId(
            [
                'name' => $fname,
                'email' => $email,
                'password' => "xxx",
                'remember_token' => "xxx",

            ]
        );


        DB::table('poolreservations')->insert(
            [
                'startDate' => $startData,
                'endDate' => $endDate,
                'activityType' => $activityType,
                'ageGroup' => $ageGroup,
                'ageRange' => $ageRange,

            ]
        );



    }

}
