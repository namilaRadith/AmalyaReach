<?php
/**
 * Created by PhpStorm.
 * User: DeAlwis
 * Date: 4/3/2016
 * Time: 7:19 PM
 */

namespace App;
use DB;

class TrackingAnalytics
{

    public function store_request_data(){

        $id = DB::table('tracking_data_tbl')->insertGetId(
            array('PHP_SELF' => $_SERVER['PHP_SELF'],
                'SERVER_NAME' =>  $_SERVER['SERVER_NAME'], 'SERVER_PROTOCOL' =>  $_SERVER['SERVER_PROTOCOL'],
                'REQUEST_METHOD' =>  $_SERVER['REQUEST_METHOD'], 'REQUEST_TIME' =>  $_SERVER['REQUEST_TIME'],
                 'HTTP_ACCEPT' =>  $_SERVER['HTTP_ACCEPT'],
                'HTTP_HOST' =>  $_SERVER['HTTP_HOST'], 'HTTP_USER_AGENT' =>  $_SERVER['HTTP_USER_AGENT'],
                'REMOTE_ADDR' =>  $_SERVER['REMOTE_ADDR'],
                'REQUEST_URI' =>  $_SERVER['REQUEST_URI'])
        );


        return "hello";
    }

}