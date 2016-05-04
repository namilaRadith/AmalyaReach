<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

use DB;
class poolReservation extends Model {

	public  static  function addPoolReservation($startDate,$endDate,$eventType,$startTime,$endTime,$ageGroup,$ageRange,$specialReq,$custId)
    {
        $dateTime=Carbon::now();


       $id=DB::table('pool_reservations')->insertGetId(
            [


                'startDate' => $startDate,
                'endDate' => $endDate,
                'eventType' => $eventType,
                'startTime' => $startTime,
                'endTime'  =>  $endTime,
                'ageGroup' => $ageGroup,
                'ageRange' => $ageRange,
                'custId' => $custId,
                'specialReq' => $specialReq,
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

    public static function getReservations()
    {

        $res = DB::table('pool_reservations')
            ->join('users', 'users.id', '=', 'pool_reservations.custId')
            ->select('users.name','users.title','users.last_name' ,'pool_reservations.eventType', 'pool_reservations.startDate' ,
                'pool_reservations.endDate' ,'pool_reservations.startTime' ,
                'pool_reservations.ageGroup', 'pool_reservations.reqProgress', 'pool_reservations.id')
            ->get();
        return $res;

    }


    public  static  function updateClosingDate($carbon_today)
    {
        DB::table('pool_reservations')
            ->where('endDate', '>', $carbon_today)
            ->update(['reqProgress' => "Closed"]);

    }



    public  static function updateStatus($id)
    {
        DB::table('pool_reservations')
            ->where('id',$id)
            ->update(['reqProgress' => "Pending"]);

    }

    public  static function updateStatusToAccepted($id)
    {
        DB::table('pool_reservations')
            ->where('id', '=', $id)
            ->update(['reqProgress' => "Accepted"]);
    }


    public  static function updateStatusToRejected($id)
    {
        DB::table('pool_reservations')
            ->where('id', '=', $id)
            ->update(['reqProgress' => "Rejected"]);
    }

    public static function getCustName($id){
        $name = DB::table('users')->where('id','=',$id)->pluck('name');
        return $name;
    }

    public static  function getCusId($id)
    {
        $userId = DB::table('pool_reservations')
            ->where('id', '=', $id)->pluck('custId');
        return $userId;

    }

    public static function getNotificationsCount()
    {
        $newResCount =DB::table('pool_reservations')
            ->where('reqProgress', '=', "Not Viewed")
            ->count();
        return $newResCount;
    }

}
