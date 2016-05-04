<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class DinningReservation extends Model {
    public $timestamps=false;

    public static function dinningReservationDataInsert($custTitle,$firstName,$lastName,$email,$phone,$resLocation, $bookingDate,$bookingTime,$noOfAdults,$noOfChildren,$additionalInfo)
    {


        $date = Carbon::now();

        DB::table('dinning_reservations')->insert([
            [
                'createdAt' => $date,
                'title' => $custTitle,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'email' => $email,
                'phone' => $phone,
                'resLocation' => $resLocation,
                'bookingDate' => $bookingDate,
                'bookingTime' => $bookingTime,
                'noOfAdults' => $noOfAdults,
                'noOfChildren' => $noOfChildren,
                'additionalInformation' => $additionalInfo,
                'acceptedStatus' => "Not Viewed",

            ]
        ]);

    }


    public  static function  getReservationDetails()
    {
        $records= DB::table('dinning_reservations')
                    ->orderBy('createdAt','desc')
                    ->get();
        return $records;
    }


    public  static function updateStatus($id)
    {
        DB::table('dinning_reservations')
            ->where('id',$id)
            ->update(['acceptedStatus' => "Pending"]);

    }


    public static function getNotifications()
    {
        $newResList =DB::table('dinning_reservations')->where('acceptedStatus', '=', "Not Viewed")->get();
        return $newResList;
    }

    public static function getResCount()
    {
        $newResList =DB::table('dinning_reservations')
            ->where('acceptedStatus', '=', "Not Viewed")
            ->count();
            return $newResList;

    }

    public static function updateClosingDate ($carbon_today)
    {
        DB::table('dinning_reservations')
            ->where('bookingDate', '>', $carbon_today)
            ->update(['acceptedStatus' => "Closed"]);

    }

    public static function updateStatusToAccepted ($id)
    {
        DB::table('dinning_reservations')
            ->where('id', '=', $id)
            ->update(['acceptedStatus' => "Accepted"]);

    }

    public static function updateStatusToRejected ($id)
    {
        DB::table('dinning_reservations')
            ->where('id', '=', $id)
            ->update(['acceptedStatus' => "Rejected"]);

    }


    function reejectDinningRes($id)
    {
        $reservationInfo = DinningReservation::findOrFail($id);
        DinningReservation::updateStatusToRejected($id);

        $subject = "Dinning Reservation - Amalya Reach";
        $sendTo = Auth::user()->email;

        $body = "Your dinning reservation at Amalya Reach is rejected due to unavoidable situations!!.";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Please contact Amalya Resorts for further details ";
        $body .= "<br>";
        $body .= "<br>";

        $body .= "Email : mailto:amalyareach@yahoo.com";
        $body .= ">Tele/Fax :+94 112748913";
        $body .= "556, Moragahahena Road,Pitipana North,Homagama,Sr Lanka";


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
                ->setFrom('dewmirandika@gmail.com', 'Amalya Reach')
                ->setTo($sendTo)
                ->setBody($body, 'text/html');

            $mailler->send($message);



        }catch(Exception $e){
            return "Can't send Email.. Error!!!";
        }

        return view('pages.admin.dinning.diningResList',compact('reservationInfo'));

    }



}
