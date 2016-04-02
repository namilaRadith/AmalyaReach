<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
class meetingsReservation extends Model {


    public static function meetingReservationDataInsert($dateTo,$dateFrom,$dateFlex,$noGuessRooms,$mtnEvenReqFood,
             $mtnEvenReqMedia, $locFlex,$noGuests,$noOfMeetingRooms,$additionalInfo,$company,$likeContact,$userID)
    {

        $date = Carbon::now();
        DB::table('meetings_reservations')->insert([
            [
                'created_at' => $date,
                'dateFrom' => $dateFrom,
                'dateTo' => $dateTo,
                'datesFlexible' => $dateFlex,
                'noOfGuestsRooms' => $noGuessRooms,
                'foodAndBev' => $mtnEvenReqFood,
                'audioAndVisual' => $mtnEvenReqMedia,
                'locFlex' => $locFlex,
                'noOfGuests' => $noGuests,
                'noOfMeetingRooms' => $noOfMeetingRooms,
                'otherDetails' => $additionalInfo,
                'company' => $company,
                'likeContact' => $likeContact,
                'resStatus' => "Not Viewed",
                'custId' => $userID
            ]
        ]);
    }
        public static function getResDetails()
        {
            $res = DB::table('meetings_reservations')->get();
            return $res;
        }


        public static function getCustName($id){
            $name = DB::table('users')->where('id','=',$id)->pluck('name');
            return $name;
        }

       public static  function getCusDetails($userId)
       {
           $user = DB::table('users')
               ->where('id','=',$userId)
               ->first();

           return $user;
       }

    public static  function getCusId($id)
    {
        $userId = DB::table('meetings_reservations')
            ->where('id', '=', $id)->pluck('custId');
        return $userId;

    }

    public function scopeLatest($query)
        {
            return $query->sortBy('created_at', 'desc')->first();
        }

    public static function getNewResCount()
    {
        $newResCount =DB::table('meetings_reservations')
            ->where('resStatus', '=', "Not Viewed")
            ->count();
        return $newResCount;

    }

    public  static function updateStatus($id)
    {
        DB::table('meetings_reservations')
            ->where('id',$id)
            ->update(['resStatus' => "Pending"]);

    }
    public static function updateClosingDate ($carbon_today)
    {
        DB::table('meetings_reservations')
            ->where('dateTo', '>', $carbon_today)
            ->update(['resStatus' => "Closed"]);

    }



}
