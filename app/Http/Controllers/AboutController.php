<?php namespace App\Http\Controllers;

use App\Http\Requests;
//use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;

use DB;
class AboutController extends Controller {


    public function getContact()
    {
        return view('pages.about.contact');
    }

    public function getContactUsForm()
    {



      return View::make('pages.about.contact');
    }




    public function feedback()
    {
        $feedbacks=DB::table('feedback')->get();
        return $feedbacks;
    }




    //for payment gateway
    public function paypalTestControllerMethod(){
        return view('pages.specials.paypal_test');
    }

}
