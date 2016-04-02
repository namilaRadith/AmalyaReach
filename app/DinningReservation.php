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
                    ->orderBy('createdAt','asc')
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

    }
