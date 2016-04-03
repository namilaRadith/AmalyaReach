<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class special_offers extends Model {

    protected $fillable = [
        'id',
        'name',
        'offer_code',
        'description',
        'total_price',
        'discount',
        'net_price',
        'created_by',
        'created_date',
        'updated_by',
        'updated_date',
        'flag'
    ];



}
