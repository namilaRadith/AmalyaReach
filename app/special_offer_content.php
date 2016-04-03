<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class special_offer_content extends Model {

    protected $fillable = [
        'id',
        'offer_id',
        'ref_table_name',
        'ref_table_id',
        'flag'
    ];

}
