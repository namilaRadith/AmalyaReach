<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dinningMenuItem extends Model {

    public $timestamps=false;
    public static function dinningMenuDataInsert($itemName,$foodCat,$qty,$price)
    {
        DB::table('dinning_menu_items')->insert([
            [
                'itemName' => $itemName,
                'quantitiy' => $qty,
                'foodCatagory' => $foodCat,
                'price' => $price,
            ]
        ]);
    }



    public static function updateMenu($id,$itemName,$foodCat,$qty,$price)
    {
        DB::table('dinning_menu_items')
            ->where('id', $id)
            ->update([
                'itemName' => $itemName,
                'quantitiy' => $qty,
                'foodCatagory' => $foodCat,
                'price' => $price,

            ]);

    }


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

    public static function checkUniqueItems($foodCat,$item)
    {
      $count=DB::table('dinning_menu_items')->where('foodCatagory', '=',$foodCat)
                ->where('itemName','=',$item)
                ->count();
           return $count;
    }
}
