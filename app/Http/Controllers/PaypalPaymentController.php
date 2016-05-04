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

	public function makePayPalPayment(){



        $selected_room_price = session()->get('selected_room_price');



        //Get Card Details
        $credit_card_number = \Input::get('credit_card_number');
        $name_on_card = \Input::get('name_on_card');
        $credit_card_type = \Input::get('credit_card_type');
        $expiration_month = \Input::get('expiration_month');
        $expiration_year = \Input::get('expiration_year');




        //Address
        $addr= Paypalpayment::address();
            $addr->setLine1("Colombo Srilanka");
            $addr->setPostalCode("123");
            $addr->setCountryCode("Sri Lanka");
            $addr->setPhone("0710589523");


        //CreditCard
        $card = Paypalpayment::creditCard();
        $card->setType($credit_card_type)
            ->setNumber($credit_card_number)
            ->setExpireMonth($expiration_month)
            ->setExpireYear($expiration_year)
            ->setCvv2("456")
            ->setFirstName("Sameera")
            ->setLastName("Chandrasena");

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
            $x = $payment->create($this->_apiContext);

        } catch (\PPConnectionException $ex) {

            return  "Exception: " . $ex->getMessage() . PHP_EOL;
            exit(1);
        }


        //Get Payment ID
        $paymentID = $payment->getId();


      //  return $paymentID;


        //Get Payment Status
        $state = $payment->getState();


        $roomID = session()->get('selected_room_id');
        $room = Room::getRoomDetails($roomID);
        $date = Carbon::now();


        if ($state == "approved"){

            return view('pages.client.PayPalPayment.reseravationSuccessfull')
                ->with('pid',$paymentID)
                ->with('room',$room)
                ->with('date',$date);

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
