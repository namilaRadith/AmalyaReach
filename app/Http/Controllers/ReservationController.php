<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckForAvailableRoomsRequest;
use App\Reservation;
use App\Room;
use Carbon\Carbon;
use DB;
use Request;
use Auth;
use Redirect;
use Mail;
use Illuminate\Support\Facades\File;
use App\Subscriber;



class ReservationController extends Controller {


    /**
     * display home page
     *
     * @return \Illuminate\View\View
     */
    public function viewHome(){
        return view('pages.client.clientIndex');
    }


    /**
     * home page reservation form submit
     *
     * @return $this
     */
    public function mainReservationFormSubmit(){

        //Put form submitted data to session
        session()->put('checkIn', Request::get('checkIn'));
        session()->put('checkOut', Request::get('checkOut'));
        session()->put('adults', Request::get('adults'));
        session()->put('children', Request::get('children'));
        session()->put('roomType', Request::get('roomType'));
        session()->put('roomTypeValue', Room::getRoomTypeValue(Request::get('roomType')));

        $rooms = Room::getRoomsByTypeFilter(Request::get('roomType'),Request::get('checkIn'),Request::get('checkOut'));

        //return $rooms;
      //  return $rooms;

        return view('pages.client.RoomReservation.reservationForm2')
                ->with('rooms',$rooms);




    }


    /**
     * after submit form, submit of selected rooms
     *
     * @return Redirect
     */
    public function selectRoomFormReservationSubmit(){

        //Add selected room details to session, for pass next forms
        session()->put('selected_room_id', \Input::get('selected_room_id'));
        session()->put('selected_room_image',\Input::get('selected_room_image'));

        $room = Room::getRoomDetails( \Input::get('selected_room_id') );
        session()->put('selected_room_price',$room->price);
        session()->put('room_qty',1);

        return redirect('showReservationForm3');

    }


    /**
     * display reservation form3
     *
     * @return $this
     */
    public function showReservationForm3(){

        //Get Details from the session
        $selected_room_id = session()->get('selected_room_id');
        $room = Room::getRoomDetails($selected_room_id);


        if (Auth::user()){
            $u_id = Auth::user()->id;
            $u_name = Auth::user()->name;
            $u_email = Auth::user()->email;
            $u_title = Auth::user()->title;
            $u_last_name = Auth::user()->last_name;
            $u_address = Auth::user()->address;
            $u_country = Auth::user()->country;
            $u_phone = Auth::user()->phone;
            $u_logged_status = "success";

            session()->put('u_id',$u_id);
            session()->put('u_name',$u_name);
            session()->put('u_email',$u_email);
            session()->put('u_title',$u_title);
            session()->put('u_last_name',$u_last_name);
            session()->put('u_address',$u_address);
            session()->put('u_country',$u_country);
            session()->put('u_phone',$u_phone);
            session()->put('u_logged_status',$u_logged_status);

        }else{
            $u_logged_status = "failed";
            session()->put('u_logged_status',$u_logged_status);

        }


        return view('pages.client.RoomReservation.reservationForm3')
            ->with('room',$room)
            ->with('u_logged_status',$u_logged_status);

    }


    /**
     * used to send emails
     *
     * @return int
     */
    public function sendMailsForReservation(){

        $subject = "Heading...";
        $sendTo = "sameerachandrasena@gmail.com";
        $body = "This is email body...";


        $transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUserName('namila.mail.tester@gmail.com')
            ->setPassword('0771950394');

        $mailler = \Swift_Mailer::newInstance($transport);


        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('sameerachandimal94@gmail.com', 'Amalya Reach')
            ->setTo($sendTo)
            ->setBody($body, 'text/html');

        $numSent = $mailler->send($message);

        return $numSent;

    }


    /**
     * After success the paypal payment it will redirect here
     * Also here will send an email for success reservations
     *
     * @return $this
     */
    public function paypalSuccessRequest(){

        $selected_room_id = session()->get('selected_room_id');
        $selected_room_type = Room::getRoomTypeUsingId($selected_room_id);
        $u_id = session()->get('u_id');
        $checkIn = session()->get('checkIn');
        $checkOut = session()->get('checkOut');
        $adults = session()->get('adults');
        $children = session()->get('children');
        $price = session()->get('selected_room_price');

        $rid = Reservation::createNewReservation($selected_room_id,$selected_room_type,$u_id,$checkIn,$checkOut,$adults,$children,$price);

        $customer_name = Auth::user()->name;
        $room_type = Room::getRoomTypeValue($selected_room_type);



        //Block the ordered room
        $order_dates = array();
        $order_dates = Reservation::getDateRange($checkIn,$checkOut, "+1 day", "d-m-Y");

        $now = Carbon::now();
        //insert details into tbl_room_booking_controll
        foreach($order_dates as $o_date){
            Reservation::insertRoomBlockData($selected_room_id,$o_date,$rid,$now);
        }


        //Send Success Email

        $subject = "Room Booking Successful - Amalya Reach";
        $sendTo = Auth::user()->email;
        $body = "We are happy to inform you about your payment & reservation at Amalya Reach is successful.";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Your Reservation details as follows: ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Customer Name: ";
        $body .= $customer_name;
        $body .= "<br>";

        $body .= "Check In Date: ";
        $body .= $checkIn;
        $body .= "<br>";

        $body .= "Check Out Date: ";
        $body .= $checkOut;
        $body .= "<br>";

        $body .= "No of Adults: ";
        $body .= $adults;
        $body .= "<br>";

        $body .= "No of Children: ";
        $body .= $children;
        $body .= "<br>";

        $body .= "Room Type: ";
        $body .= $room_type;
        $body .= "<br>";

        $body .= "Amount: $";
        $body .= $price;
        $body .= "<br>";

        $body .= "<br>";
        $body .= "<br>";
        $body .= "Hope to give you Good Service,";
        $body .= "<br>";
        $body .= "Thank you!";
        $body .= "<br>";
        $body .= "Amalya Reach";



        try{
            $transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
                ->setUserName('namila.mail.tester@gmail.com')
                ->setPassword('0771950394');

            $mailler = \Swift_Mailer::newInstance($transport);


            $message = \Swift_Message::newInstance()
                ->setSubject($subject)
                ->setFrom('sameerachandimal94@gmail.com', 'Amalya Reach')
                ->setTo($sendTo)
                ->setBody($body, 'text/html');

            $numSent = $mailler->send($message);



        }catch(Exception $e){
            return "Can't send Email.. Error!!!";
        }

        return view('pages.client.RoomReservation.reservationSuccess')
            ->with('customer_name',$customer_name)
            ->with('room_type',$room_type)
            ->with('checkIn',$checkIn)
            ->with('checkOut',$checkOut);

    }


    /**
     * If paypal request is failed or canceled it will redirect here
     *
     * @return \Illuminate\View\View
     */
    public function paypalFailedRequest(){
        return view('pages.client.RoomReservation.reservationFailed');
    }






















    //Functions of direct card payment gateway...


    /**
     * @return $this
     */
    public function checkAvailableRoomsForm2(){

        $rooms = Room::getAllRooms();

        return view('pages.client.reservationForm2')
            ->with('rooms',$rooms);

    }

    /**
     * @return \Illuminate\View\View
     */
    public function reservationDetailsForm3(){
        return view('pages.client.reservationForm3');
    }

    /**
     * @return string
     */
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
    /**
     * @param Requests\PaymentFormRequest $request
     * @return string
     */
    public function finalformsubmittest(Requests\PaymentFormRequest $request){
        return "sameera";
    }

}

