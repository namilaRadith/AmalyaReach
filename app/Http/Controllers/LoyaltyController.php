<?php
/**
 * Created by PhpStorm.
 * User: DeAlwis
 * Date: 2/6/2016
 * Time: 11:53 PM
 */

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckForAvailableRoomsRequest;
use App\Room;
use Carbon\Carbon;
use DB;
use Request;

class LoyaltyController extends Controller
{


    public function LoyaltyFormSubmit(\Input $request){

        $email = request::get('email');
        $email = request::get('password');
        $email = request::get('cust_name');
        $email = request::get('phone');
        $email = request::get('Street');
        $email = request::get('city');
        $email = request::get('country');
        $email = request::get('gender');
        $email = request::get('bday');
        $email = request::get('bmonth');
        $email = request::get('children');



    }
}