<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use DB;
class poolReservation extends Model {

	public  static  function addPoolReservation($startDate,$endDate,$eventType,$startTime,$endTime,$ageGroup,$ageRange,$custId)
    {
        $dateTime=Carbon::now();


       $id=DB::table('poolreservations')->insertGetId(
            [


                'startDate' => $startDate,
                'endDate' => $endDate,
                'eventType' => $eventType,
                'startTime' => $startTime,
                'endTime'  =>  $endTime,
                'ageGroup' => $ageGroup,
                'ageRange' => $ageRange,
                'custId' => $custId,
                'reqProgress' => "Not Viewed",
                'createdAt' =>$dateTime,
            ]
        );
            return $id;
    }

    public  static function getReservedDates($first,$last,$step = '+ 1 day',$outputFormat= 'm/d/Y')
    {
              $dates =array();
              $current=strtotime($first);
              $last =strtotime($last);

           while ($current <= $last)
           {
              $dates[] = date($outputFormat,$current);
              $current=strtotime($step,$current);
           }

            return $dates;
    }


    public static  function insertToPoolCheckAvailability($date,$reservationId)
    {
        $dateTime=Carbon::now();

        DB::table('poolcheckavailability')->insert(
            [

                'dates' => $date,
                'reservationId' => $reservationId,
                'createdAt' => $dateTime,
            ]
        );

    }


    public  static  function poolCheckAvailability($date)
    {
        $resCount =DB::table('poolcheckavailability')
            ->where('dates', '=', "$date")
            ->count();
        return $resCount;

    }


}
