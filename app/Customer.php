<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model {

    public static function getCustomerContactNumber($id){
        return DB::table('users')->where('id','=',$id)->pluck('phone');
    }

}
