<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Room extends Model {

	public static function getAllRooms(){
        $rooms = DB::table('tbl_rooms')->get();
        return $rooms;
    }

    public static function getRoomsByType($roomType){
        $rooms = DB::table('tbl_rooms')
                    ->join('tbl_roomtypes', 'tbl_rooms.type', '=', 'tbl_roomtypes.id')
                    ->where('type','=',$roomType)
                    ->select('tbl_rooms.id','tbl_rooms.type','tbl_rooms.name','tbl_rooms.discount',
                        'tbl_rooms.description','tbl_rooms.price','tbl_roomtypes.value')
                    ->get();

        return $rooms;
    }

    public static function getRoomDetails($id){
        $room = DB::table('tbl_rooms')->where('id','=',$id)->first();
        return $room;
    }

    public static function getRoomTypeValue($id){
        $type = DB::table('tbl_roomtypes')->where('id','=',$id)->pluck('value');
        return $type;
    }

    public static function getAllRoomTypes(){
        $room_types = DB::table('tbl_roomtypes')->get();
        return $room_types;
    }

    public static function addNewRoomDetails($name,$type,$price,$description){

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

    public static function updateRoomDetails($id,$room_name,$room_type,$room_description,$room_price){
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

    public static function removeRoom($id){
        DB::table('tbl_rooms')->where('id', '=', $id)->delete();
    }
}
