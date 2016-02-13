<?php namespace App;

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
}
