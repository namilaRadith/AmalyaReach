<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class customerLoyalty extends Model {

    protected $fillable = [
        'email',
        'password',
        'name',
        'phone',
        'street',
        'city',
        'country',
        'gender',
        'bday',
        'bmonth',
        'byear',
        'nationality',
        'children',
        'recieve_p_offers',
        'allow_p_p_offers',
        'type',
        'approved',
        'requested_date',
        'approved_date',
        'flag'
    ];


}
