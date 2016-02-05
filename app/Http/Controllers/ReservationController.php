<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckForAvailableRoomsRequest;
use App\Room;
use Carbon\Carbon;
use DB;
use Request;


class ReservationController extends Controller {


    public function mainReservationFormSubmit(CheckForAvailableRoomsRequest $request){

        session()->put('checkIn', Request::get('checkIn'));
        session()->put('checkOut', Request::get('checkOut'));
        session()->put('adults', Request::get('adults'));
        session()->put('children', Request::get('children'));
        session()->put('roomType', Request::get('roomType'));
        session()->put('roomTypeValue', Room::getRoomTypeValue( Request::get('roomType') ) );

        $rooms = Room::getRoomsByType( Request::get('roomType') );

        return view('pages.client.RoomReservation.reservationForm2')
            ->with('rooms',$rooms);

    }

    public function selectRoomFormReservationSubmit(){

        session()->put('selected_room_id', \Input::get('selected_room_id'));
        $room = Room::getRoomDetails( \Input::get('selected_room_id') );
        session()->put('selected_room_price',$room->price);
        session()->put('room_qty',1);

        return redirect('showReservationForm3');

    }


    public function showReservationForm3(){

        $selected_room_id = session()->get('selected_room_id');
        $room = Room::getRoomDetails($selected_room_id);

        return view('pages.client.RoomReservation.reservationForm3')->with('room',$room);

    }
































    public function checkAvailableRoomsForm2(){

        $rooms = Room::getAllRooms();

        return view('pages.client.reservationForm2')
            ->with('rooms',$rooms);

    }

    public function reservationDetailsForm3(){
        return view('pages.client.reservationForm3');
    }





    public function reservationForm3Submit(){

        $title      = \Input::get('title');
        $first_name = \Input::get('first_name');
        $last_name  = \Input::get('last_name');
        $address    = \Input::get('address');
        $country    = \Input::get('country');
        $email      = \Input::get('email');
        $phone      = \Input::get('phone');
        $created_at = Carbon::now();

        //Insert into users table
        $customerID = DB::table('users')->insertGetId(
                        [
                            'name' => $first_name,
                            'email' => $email,
                            'password' => "xxx",
                            'remember_token' => "xxx",
                            'created_at' => $created_at,
                            'updated_at' => $created_at,
                            'title' => $title,
                            'last_name' => $last_name,
                            'address' => $address,
                            'country' => $country,
                            'phone' => $phone
                        ]
                      );

        //Insert data to reservation table
        DB::table('reservation')->insert(
            [
                'customer_id' => $customerID,
                'check_in' => session()->get('checkIn'),
                'check_out' => session()->get('checkOut'),
                'adults' => session()->get('adults'),
                'children' => session()->get('children'),
                'room_type' => session()->get('roomType'),
                'selected_room_id' => session()->get('selected_room_id'),
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]
        );

        return "Success!!!";

    }



    //for testing
    public function finalformsubmittest(Requests\PaymentFormRequest $request){
        return "sameera";
    }

}

