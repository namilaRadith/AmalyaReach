<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paypalpayment;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationFinalFormSubmitRequest;
use Carbon\Carbon;
use DB;
use App\Room;


class PaypalPaymentController extends Controller {


    function __construct()
    {
        $this->_apiContext = Paypalpayment::apiContext(config('paypal_payment.Account.ClientId'),config('paypal_payment.Account.ClientSecret'));
    }

	public function makePayPalPayment(Requests\PaymentFormRequest $request){



        $title      = \Input::get('title');
        $first_name = \Input::get('first_name');
        $last_name  = \Input::get('last_name');
        $address    = \Input::get('address');
        $country    = \Input::get('country');
        $email      = \Input::get('email');
        $phone      = \Input::get('phone');
        $postalCode = \Input::get('pcode');
        $created_at = Carbon::now();
        $selected_room_price = session()->get('selected_room_price');



        //Get Card Details
        $credit_card_number = \Input::get('credit_card_number');
        $name_on_card = \Input::get('name_on_card');
        $credit_card_type = \Input::get('credit_card_type');
        $expiration_month = \Input::get('expiration_month');
        $expiration_year = \Input::get('expiration_year');






/*
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


*/



        //Address
        $addr= Paypalpayment::address();
            $addr->setLine1($address);
            $addr->setPostalCode($postalCode);
            $addr->setCountryCode($country);
            $addr->setPhone($phone);


        //CreditCard
        $card = Paypalpayment::creditCard();
        $card->setType($credit_card_type)
            ->setNumber($credit_card_number)
            ->setExpireMonth($expiration_month)
            ->setExpireYear($expiration_year)
            ->setCvv2("456")
            ->setFirstName($first_name)
            ->setLastName($last_name);

        //FundingInstrument(Payer's funding instrument)
        $fi = Paypalpayment::fundingInstrument();
        $fi->setCreditCard($card);

        //Payer
        $payer = Paypalpayment::payer();
        $payer->setPaymentMethod("credit_card")
            ->setFundingInstruments(array($fi));




        $item1 = Paypalpayment::item();
        $item1->setName('Room 1')
            ->setDescription('Room 1 description')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setTax(0.0)
            ->setPrice($selected_room_price);



        $item2 = Paypalpayment::item();
        $item2->setName('Service Charges')
            ->setDescription('Service Charges description')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setTax(0.0)
            ->setPrice(10);

        $total_price = 10+$selected_room_price;



        $itemList = Paypalpayment::itemList();
        $itemList->setItems(array($item1,$item2));




        $details = Paypalpayment::details();
        $details->setShipping("0.0")
            ->setTax("0.0")
            //total of items prices
            ->setSubtotal($total_price);



        //Payment Amount
        $amount = Paypalpayment::amount();
        $amount->setCurrency("USD")
            // the total is $17.8 = (16 + 0.6) * 1 ( of quantity) + 1.2 ( of Shipping).
            ->setTotal($total_price)
            ->setDetails($details);





        // ### Transaction
        // A transaction defines the contract of a
        // payment - what is the payment for and who
        // is fulfilling it. Transaction is created with
        // a `Payee` and `Amount` types

        $transaction = Paypalpayment::transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());

        // ### Payment
        // A Payment Resource; create one using
        // the above types and intent as 'sale'

        $payment = Paypalpayment::payment();

        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setTransactions(array($transaction));

        try {
            // ### Create Payment
            // Create a payment by posting to the APIService
            // using a valid ApiContext
            // The return object contains the status;
            $x = $payment->create($this->_apiContext);
        } catch (\PPConnectionException $ex) {
            return  "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }

        // dd($payment);


        //Get Payment ID
        $paymentID = $payment->getId();


      //  return $paymentID;


        //Get Payment Status
        $state = $payment->getState();


        $roomID = session()->get('selected_room_id');
        $room = Room::getRoomDetails($roomID);
        $date = Carbon::now();
        $selected_room_discount = session()->get('selected_room_discount');

        if ($state == "approved"){

            return view('pages.client.PayPalPayment.reseravationSuccessfull')
                ->with('pid',$paymentID)
                ->with('room',$room)
                ->with('date',$date)
                ->with('discount',$selected_room_discount);

        }else{
            return view('pages.client.PayPalPayment.reseravationUnsuccessfull');
        }




    }









































    public function showPayment()
    {
        $payment_id = \Input::get('pid');

        $payment = Paypalpayment::getById($payment_id,$this->_apiContext);

        dd($payment->state);

    }



    public function testPaypal(){
        return view('pages.client.PayPalPayment.testPaypal');
    }


    public function testRequest(){

        return "sameera";
    }
}
