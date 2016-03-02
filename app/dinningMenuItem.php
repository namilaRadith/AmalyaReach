<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class dinningMenuItem extends Model {

    public $timestamps=false;

    protected  $fillable=[
        'itemName',
        'foodCatagory',
        'price',

    ];


    public function scopeFoodCat1($query)
    {
        $query->where('foodCatagory', '=' , 'Seafood');

    }

    public function scopeFoodCat2($query)
    {
        $query->where('foodCatagory', '=' , 'Sandwich');

    }

    public function scopeFoodCat3($query)
    {
        $query->where('foodCatagory', '=' , 'Coffee');

    }

    public function scopeFoodCat4($query)
    {
        $query->where('foodCatagory', '=' , 'Fried Rice');

    }

    public function scopeFoodCat5($query)
    {
        $query->where('foodCatagory', '=' , 'Pizza');

    }

    public function scopeFoodCat6($query)
    {
        $query->where('foodCatagory', '=' , 'Pasta');

    }
    public function scopeFoodCat7($query)
    {
        $query->where('foodCatagory', '=' , 'Desserts');

    }
}
