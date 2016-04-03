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
    /**
     * @param $mail
     * @param $content
     * @param $subject
     * @return bool
     *
     * function will be send a mail the recipient with the given content and subject
     */
    public static function send_mail($mail,$content,$subject){

        $email = $mail;
        $transport = \Swift_SmtpTransport:: newInstance('smtp.gmail.com', 465, 'ssl')
            ->setUserName('namila.mail.tester@gmail.com')
            ->setPassword('0771950394');

        $mailer = \Swift_Mailer::newInstance($transport);


        $message = \Swift_Message::newInstance()
            ->setSubject($subject)
            ->setFrom('namila.mail.tester@gmail.com', 'Amalya Reach')
            ->setTo($email)
            ->setBody($content, 'text/html');

        $Sentmailer = $mailer->send($message);

        return true;
    }
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    /**
     *  function is retrieving the mail and sending to verify the mail
     */
    public function verify_customer_email(){




        $verification_Code = $this->generateRandomString();

        $email = Request::get('email');
        $content = "Dear Valued customer thank you for registering to our Loyalty program.Code : ".$verification_Code;
        $subject = "Email Verification";

        $controller = new LoyaltyController();
        $sendMail = $controller->send_mail($email,$content,$subject);


        return json_encode($verification_Code);

    }
    public function LoyaltyFormSubmit(){


//                    $email =  $_POST['email'];
//                    $password =$_POST['password'];
//                    $name =$_POST['name'];
//                    $phone = $_POST['phone'];
//                    $street =$_POST['street'];
//                    $city = $_POST['city'];
//                    $country = $_POST['country'];
//                    $gender = $_POST['gender'];
//                    $bday = $_POST['bday'];
//                    $nationality = $_POST['nationality'];
//                    $children = $_POST['children'];
//                    $termsConditions = $_POST['termsConditions'];
//                    $recieve_p_offers = $_POST['recieve_p_offers'];
//                    $allow_p_p_offers = $_POST['allow_p_p_offers'];


        $content = "Dear Valued customer thank you for registering to our Loyalty program.This mail is to confirm that we have received your kind request and send you a responce as soon as possible.";
        $input = Request::all();
        var_dump($input);
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

    public function show_new_loyalty_request(){

        $loyaltyies = customerLoyalty::where('flag', 3)
            ->get();
        $loyaltyies_master = DB::table('loyalty_master')->get();

        return view('pages.admin.Loyalty.cust_loyalty_new_request',array('loyalties' => $loyaltyies,'loyalty_master' => $loyaltyies_master));
    }

    public function get_cust_Details($id){

        $cust_details = customerLoyalty::where('id', $id)
            ->get();

        return $cust_details;
    }
    public function show_accepted_loyalty_request(){
        $loyaltyies = customerLoyalty::where('flag',1)
            ->orWhere('flag', '=', 0)
            ->get();
        $loyaltyies_master = DB::table('loyalty_master')->get();

        return view('pages.admin.Loyalty.cust_loyalty_request',array('loyalties' => $loyaltyies,'loyalty_master' => $loyaltyies_master));

    }
    public function Accept_loyalty_request_submit(){



        $option = Request::input('optionsRadios');
        $type = Request::input('loyalty_type');
        $cust_id = Request::all('');

        $customerLoyalty = customerLoyalty::where("id",$cust_id['cust_id'])
                ->update(
            array(
                "flag" => $option,
                "type" => $type
                             )
                       );




        return redirect()->action('LoyaltyController@show_accepted_loyalty_request');
    }

    public function update_loyalty_request_submit(){



        $option = Request::input('optionsRadios');
        $type = Request::input('loyalty_type');
        $cust_id = Request::all('');

        $customerLoyalty = customerLoyalty::where("id",$cust_id['cust_id'])
            ->update(
                array(
                    "flag" => $option,
                    "type" => $type
                )
            );

        return redirect()->action('LoyaltyController@show_accepted_loyalty_request');
    }
}