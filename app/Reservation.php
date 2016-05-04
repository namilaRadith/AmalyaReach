<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\CustomClasses\CurrencyConverterFacade;

class Reservation extends Model {

    /**
     * createNewReservation in db
     *
     * @param $selected_room_id
     * @param $selected_room_type
     * @param $u_id
     * @param $checkIn
     * @param $checkOut
     * @param $adults
     * @param $children
     * @param $price
     */
    public static function createNewReservation($selected_room_id, $selected_room_type, $u_id, $checkIn, $checkOut, $adults, $children, $price){
        $now = Carbon::now();

        $rvt_id = DB::table('tbl_reservation')->insertGetId(
            [
                'customer_id' => $u_id,
                'check_in' => $checkIn,
                'check_out' => $checkOut,
                'room_type' => $selected_room_type,
                'selected_room_id' => $selected_room_id,
                'adults' => $adults,
                'children' => $children,
                'price' => $price,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );

        return $rvt_id;
    }


    /**
     * get Reservation Details from db
     *
     * @return mixed
     */
    public static function getReservationDetails(){

        $reservations = DB::table('tbl_reservation')
                            ->orderBy('id','desc')
                            ->get();

        return $reservations;
    }


    /**
     * mark Reservation As Complete
     *
     * @param $id
     */
    public static function markReservationAsComplete($id){
        DB::table('tbl_reservation')
            ->where('id', $id)
            ->update(['reservation_status' => 1]);

        DB::table('tbl_reservation')
            ->where('id', $id)
            ->update(['called_status' => 1]);

    }


    /**
     * completed Reservations Restore
     *
     * @param $id
     */
    public static function completedReservationsRestore($id){
        DB::table('tbl_reservation')
            ->where('id', $id)
            ->update(['reservation_status' => 0]);
    }


    /**
     * new Reservations Count for notification
     *
     * @return mixed
     */
    public static function newReservationsCount(){
        $count = DB::table('tbl_reservation')
                    ->where('reservation_status',0)
                     ->count();

        return $count;
    }


    /**
     * Count not contacted Calls
     *
     * @return mixed
     */
    public static function notCallCount(){
        $count = DB::table('tbl_reservation')
            ->where('called_status',0)
            ->count();

        return $count;
    }


    /**
     * mark As Called
     *
     * @param $id
     */
    public static function markAsCalled($id){
        DB::table('tbl_reservation')
            ->where('id', $id)
            ->update(['called_status' => 1]);
    }


    public static function getDateRange($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }


    public static function insertRoomBlockData($selected_room_id,$o_date,$rid,$now){
        DB::table('tbl_room_booking_controll')->insertGetId(
            [
                'room_id' => $selected_room_id,
                'dates' => $o_date,
                'reservation_id' => $rid,
                'created_at' => $now
            ]
        );
    }

    public static function removeBlockingLines($id){
        DB::table('tbl_room_booking_controll')->where('reservation_id', '=', $id)->delete();
    }


    public static function getAdminSearchResultsRoom(){
        $data = DB::table('tbl_reservation')->get();
        return $data;
    }

    public static function getAdminSearchResultsDays($dateFrom, $dateTo){
        $data = DB::table('tbl_reservation')
            ->where('check_in','>=',$dateFrom)
            ->where('check_out','<=',$dateTo)
            ->get();

        return $data;
    }

    public static function getAdminSearchResultsDaysCurrent(){

        $today = date("d-m-Y");

        $data = DB::table('tbl_reservation')
            ->where('check_in','<=',$today)
            ->where('check_out','>=',$today)
            ->get();

        return $data;
    }

    public static function getAdminSearchResultsDaysUpcomming(){
        $today = date("d-m-Y");

        $data = DB::table('tbl_reservation')
            ->where('check_in','>',$today)
            ->get();

        return $data;
    }

    public static function roomReportTotal(){
        return DB::table('tbl_reservation')->count();
    }


    public static function roomReportNew(){
        $today = date("d-m-Y");

        $data = DB::table('tbl_reservation')
            ->where('check_in','>',$today)
            ->count();

        return $data;
    }

    public static function roomReportDaily(){
        $today = date("d-m-Y");

        $data = DB::table('tbl_reservation')
            ->where('check_in','=',$today)
            ->count();

        return $data;
    }

    public static function roomReportMonthly(){

        $today = explode("-",date("d-m-Y"));
        $month = $today[1];

        $reservations = DB::table('tbl_reservation')->get();

        $this_month_reservations = array();

        foreach($reservations as $reservation){
            $date = $reservation->check_in;

            $r_today = explode("-",$date);
            $r_month = $r_today[1];

            if($r_month == $month){

                $this_month_reservations[] = array(
                    "id"=>$reservation->id,
                    "check_in"=>$reservation->check_in,
                    "check_out"=>$reservation->check_out,
                    "customer_id"=>$reservation->customer_id
                );
            }
        }


        return count($this_month_reservations);

    }

    public static function getMonthlyReservations(){

        $today = explode("-",date("d-m-Y"));
        $month = $today[1];

        $reservations = DB::table('tbl_reservation')->get();

        $this_month_reservations = array();

        foreach($reservations as $reservation){
            $date = $reservation->check_in;

            $r_today = explode("-",$date);
            $r_month = $r_today[1];

            if($r_month == $month){

                $this_month_reservations[] = array(
                    "id"=>$reservation->id,
                    "check_in"=>$reservation->check_in,
                    "check_out"=>$reservation->check_out,
                    "customer_id"=>$reservation->customer_id
                );
            }
        }

        return $this_month_reservations;
    }

    public static function currencyConverter($amount,$from_Currency,$to_Currency){


        $amount = urlencode($amount);
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);
        $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);

        return $converted_amount;



    }

    public static function getUserCurrency(){
        $currency = session()->get('user_currency_type');
        return $currency;
    }

    public static function getConvertedPrice($amount){

        $currency = session()->get('user_currency_type');


        $count = DB::table('tbl_currency_types')->where('from','=',"USD")->where('to','=',$currency)->count();

        if($count == 1){
            $rate = DB::table('tbl_currency_types')->where('from','=',"USD")->where('to','=',$currency)->pluck('value');
        }else{

            $facade = new CurrencyConverterFacade();

            $facade->setCurrencyFrom("USD");
            $facade->setCurrencyTo($currency);
            $rate = $facade->getExchangeRate();
        }



        $new =  $rate * $amount;

        return number_format((float)$new, 2, '.', '');
    }

    public static function getRoomMarkup($id){
        $count = DB::table('tbl_markups')->where('room_id','=',$id)->count();
        if($count == 1){
            $percentage = DB::table('tbl_markups')->where('room_id','=',$id)->pluck('markup_percentage');
            return $percentage;
        }else{
            return -1;
        }
    }

    public static function getMarkupAddedPrice($room_price,$room_markup){

        if($room_markup == -1){
            $new_price = $room_price;
        }else{
            $new_price = $room_price + ($room_price * $room_markup / 100.0);
        }

        return $new_price;
    }


    public static function insertMarkup($roomID,$percantage,$date){

         DB::table('tbl_markups')->insert(
            [
                'room_id' => $roomID,
                'markup_percentage' => $percantage,
                'date' => $date
            ]);

    }

    public static function getRoomDetails($id){
        return DB::table('tbl_rooms')->where('id','=',$id)->get();
    }


}
