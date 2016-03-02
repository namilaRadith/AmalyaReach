<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class meetingsController extends Controller {

	//

    function  meetingsReservation()
    {
        return view('pages.client.specials.meetingReservation');

    }

     public function meetingsReservationForm()
     {
          return view('pages.client.specials.meetingReservatonForm');

     }

    public function meetingsResFormSubmit(Requests\meetingRequest $request)
    {
        return "successful!!!";

    }
}
