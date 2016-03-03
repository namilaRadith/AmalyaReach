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
use App\customerLoyalty;

class LoyaltyController extends Controller
{


    public function LoyaltyFormSubmit(){

        $content = "Dear Valued customer thank you for registering to our Loyalty program.This mail is to confirm that we have received your kind request and send you a responce as soon as possible.";
        $input = Request::all();

        customerLoyalty::create($input);

        $cust_email = Request::input('email');


        $transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUserName('namila.mail.tester@gmail.com')
            ->setPassword('0771950394');

        $mailer = \Swift_Mailer::newInstance($transport);


            $message = \Swift_Message::newInstance()
                ->setSubject('Hello Dear Valued Customer')
                ->setFrom('namila.mail.tester@gmail.com', 'Amalya Reach')
                ->setTo($cust_email)
                ->setBody($content, 'text/html');

            $Sentmailer = $mailer->send($message);

        return redirect('cl-Customer-Loyalty');


    }

    public function show_loyalty_request(){

        $loyaltyies = customerLoyalty::where('flag', 0)
            ->get();
        $loyaltyies_master = DB::table('loyalty_master')->get();

        return view('pages.admin.Loyalty.cust_loyalty_request',array('loyalties' => $loyaltyies,'loyalty_master' => $loyaltyies_master));
    }

    public function get_cust_Details($id){

        $cust_details = customerLoyalty::where('id', $id)
            ->get();

        return $cust_details;
    }
}