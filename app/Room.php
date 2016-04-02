<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Class Room
 * @package App
 */
class Room extends Model {


    /**
     * get All Rooms
     *
     * @return mixed
     */
    public static function getAllRooms(){
        $rooms = DB::table('tbl_rooms')->get();
        return $rooms;
    }


    /**
     * get Rooms By Room Type
     *
     * @param $roomType
     * @return mixed
     */
    public static function getRoomsByType($roomType){
        $rooms = DB::table('tbl_rooms')
                    ->join('tbl_roomtypes', 'tbl_rooms.type', '=', 'tbl_roomtypes.id')
                    ->where('type','=',$roomType)
                    ->select('tbl_rooms.id','tbl_rooms.type','tbl_rooms.name','tbl_rooms.description','tbl_rooms.image','tbl_rooms.price','tbl_roomtypes.value')
                    ->get();

        return $rooms;
    }


    public static function getRoomsByTypeFilter($roomType,$checkIn,$checkOut){

        $rooms = DB::table('tbl_rooms')
            ->where('type','=',$roomType)
            ->get();

        $need_days = Reservation::getDateRange($checkIn,$checkOut, "+1 day", "d-m-Y");
        $selected_rooms = array();

        foreach($rooms as $room){

            $room_id = $room->id;
            $status = true;

            foreach($need_days as $need_day){

                $res = DB::table('tbl_room_booking_controll')
                            ->where('room_id','=',$room_id)
                            ->where('dates','=',$need_day)
                            ->count();

                if($res != 0){
                    $status = false;
                }
            }

            if($status){
                $selected_rooms[] = array(
                    "id" => $room->id,
                    "name" => $room->name,
                    "type" => $room->type,
                    "description" => $room->description,
                    "price" => $room->price,
                    "created_at" => $room->created_at,
                    "image" => $room->image,
                    "room_available_status" => $room->room_available_status
                );
            }




        }







        return $selected_rooms;
    }

    /**
     * get Room Details
     *
     * @param $id
     * @return mixed
     */
    public static function getRoomDetails($id){
        $room = DB::table('tbl_rooms')->where('id','=',$id)->first();
        return $room;
    }


    /**
     * get Room Type name
     *
     * @param $id
     * @return mixed
     */
    public static function getRoomTypeValue($id){
        $type = DB::table('tbl_roomtypes')->where('id','=',$id)->pluck('value');
        return $type;
    }


    /**
     * get All Room Types
     *
     * @return mixed
     */
    public static function getAllRoomTypes(){
        $room_types = DB::table('tbl_roomtypes')->get();
        return $room_types;
    }


    /**
     * save New Room Details
     *
     * @param $name
     * @param $type
     * @param $price
     * @param $description
     */
    public static function addNewRoomDetails($name, $type, $price, $description){

        $now = Carbon::now();

        DB::table('tbl_rooms')->insert(
            [
                'type' => $type,
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'created_at' => $now,
                'updated_at' => $now
            ]
        );
    }


    /**
     * update Room Details
     *
     * @param $id
     * @param $room_name
     * @param $room_type
     * @param $room_description
     * @param $room_price
     */
    public static function updateRoomDetails($id, $room_name, $room_type, $room_description, $room_price){
        $now = Carbon::now();

        DB::table('tbl_rooms')
            ->where('id', $id)
            ->update(
                [
                    'type' => $room_type,
                    'name' => $room_name,
                    'description' => $room_description,
                    'price' => $room_price,
                    'updated_at' => $now
                ]
            );
    }


    /**
     * remove Rooms
     *
     * @param $id
     */
    public static function removeRoom($id){
        DB::table('tbl_rooms')->where('id', '=', $id)->delete();
    }


    /**
     * get Room Type Using Id
     *
     * @param $room_id
     * @return mixed
     */
    public static function getRoomTypeUsingId($room_id){
        return DB::table('tbl_rooms')->where('id', '=', $room_id)->pluck('type');
    }


    /**
     * check Room Name Availability
     *
     * @param $name
     * @return bool
     */
    public static function checkRoomNameAvailability($name){
        $count = DB::table('tbl_rooms')->where('name','=',$name)->count();
        if($count == 0){
            return false;
        }else{
            return true;
        }
    }



}
