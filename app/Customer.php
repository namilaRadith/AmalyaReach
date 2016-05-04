<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model {

    public static function getCustomerContactNumber($id){
        return DB::table('users')->where('id','=',$id)->pluck('phone');
    }

    public static function getCustomerName($id){
        return DB::table('users')->where('id','=',$id)->pluck('name');
    }


    public static function checkcustomer($email){
        $count = DB::table('users')->where('email','=',$email)->count();
        return $count;
    }

    public static function getCustomerId($email){
        $idd = DB::table('users')->where('email','=',$email)->pluck('id');
        return $idd;
    }

    public static function createNewCustomer($f,$l,$e,$p){
        $rvt_id = DB::table('users')->insertGetId(
            [
                'name' => $f,
                'email' => $e,
                'password' => "xxx",
                'remember_token' => "xxx",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'title' => "xxx",
                'last_name' => $l,
                'address' => "xxx",
                'country' => "xxx",
                'phone' => $p
            ]
        );

        $u_logged_status = "success";

        session()->put('u_id',$rvt_id);
        session()->put('u_name',$f);
        session()->put('u_email',$e);
        session()->put('u_last_name',$l);
        session()->put('u_phone',$p);
        session()->put('u_logged_status',$u_logged_status);


    }



}
