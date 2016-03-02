<?php namespace App\Http\Controllers;

use App\dinningDetail;
use App\dinningMenuItem;
use App\DinningReservation;
use App\Http\Requests;

//use Illuminate\Http\Request;
use Request;

class dinningController extends Controller {


    function dinningReservation()
    {
         $dining=dinningDetail::all();
         return view('pages.client.specials.dinningReservation')->with('dining',$dining);

    }

    public function diningReservationSubmit(){

        $custTitle = \Input::get('title');
        $firstName = \Input::get('fname');
        $lastName = \Input::get('lastName');
        $email = \Input::get('email');
        $phone = \Input::get('phone');
        $bookingDate = \Input::get('bookingDate');
        $bookingTime = \Input::get('bookingTime');
        $noOfAdults = \Input::get('adults');
        $noOfChildren = \Input::get('children');
        $additionalInfo = \Input::get('addInfo');

        session()->put('custTitle',$custTitle);
        session()->put('fname',$firstName);
        session()->put('lastName',$lastName);
        session()->put('email',$email);
        session()->put('phone',$phone);
        session()->put('bookingDate',$bookingDate);
        session()->put('bookingTime',$bookingTime);
        session()->put('noOfAdults',$noOfAdults);
        session()->put('noOfChildren',$noOfChildren);
        session()->put('additionalInfo',$additionalInfo);

        $input=Request::all();
        DinningReservation::create($input);

         $dining=dinningDetail::all();
        return redirect()->action('dinningController@dinningReservation');
    }


    function  dinningMenuDisplay()
    {
        $diningMenuCat1=dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2=dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3=dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4=dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5=dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6=dinningMenuItem::FoodCat6()->get();
        $diningMenuCat7=dinningMenuItem::FoodCat7()->get();

        return view('pages.client.specials.dinningMenuDisplay',compact('diningMenuCat1','diningMenuCat2','diningMenuCat3','diningMenuCat4','diningMenuCat5','diningMenuCat6'));



    }
    function test()
    {

        return view('pages.client.specials.test');
    }




    //Admin Functions

    public function  diningAddMenuForm()
    {
        return view('pages.admin.dinning.diningAddMenu');

    }


    public function  diningAddMenu(Requests\createAddMenuItemRequest $request)
    {


           $input=Request::all();
           dinningMenuItem::create($input);


          \Session::flash('flash_message','Food Item Added Sucessfully!!');
          return redirect('diningAddMenu');
    }


    public function diningMenu()
    {

          $diningMenuCat1=dinningMenuItem::FoodCat1()->get();
          $diningMenuCat2=dinningMenuItem::FoodCat2()->get();
          $diningMenuCat3=dinningMenuItem::FoodCat3()->get();
          $diningMenuCat4=dinningMenuItem::FoodCat4()->get();
          $diningMenuCat5=dinningMenuItem::FoodCat5()->get();
          $diningMenuCat6=dinningMenuItem::FoodCat6()->get();
          $diningMenuCat7=dinningMenuItem::FoodCat7()->get();

          return view('pages.admin.dinning.diningMenu',compact('diningMenuCat1','diningMenuCat2','diningMenuCat3','diningMenuCat4','diningMenuCat5','diningMenuCat6'));
    }



    public function diningMenuEdit($id)
    {

           $foodItem=dinningMenuItem::findOrFail($id);
          return view('pages.admin.dinning.diningMenuEdit')->with('foodItem',$foodItem);
    }


    public function updateDiningItem($id, Requests\createAddMenuItemRequest $request)
    {
        $foodItem=dinningMenuItem::findOrFail($id);
        $foodItem->update($request->all());

        $diningMenuCat1=dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2=dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3=dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4=dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5=dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6=dinningMenuItem::FoodCat6()->get();

        \Session::flash('flash_message','One Item Edited!!');
        return view('pages.admin.dinning.diningMenu',compact('diningMenuCat1','diningMenuCat2','diningMenuCat3','diningMenuCat4','diningMenuCat5','diningMenuCat6'));

    }

    public function deleteFoodItem($id)
    {
        $foodItem=dinningMenuItem::findOrFail($id);
        $foodItem->delete();

        $diningMenuCat1=dinningMenuItem::FoodCat1()->get();
        $diningMenuCat2=dinningMenuItem::FoodCat2()->get();
        $diningMenuCat3=dinningMenuItem::FoodCat3()->get();
        $diningMenuCat4=dinningMenuItem::FoodCat4()->get();
        $diningMenuCat5=dinningMenuItem::FoodCat5()->get();
        $diningMenuCat6=dinningMenuItem::FoodCat6()->get();

        \Session::flash('flash_message','One Item Deleted!!');
        return view('pages.admin.dinning.diningMenu',compact('diningMenuCat1','diningMenuCat2','diningMenuCat3','diningMenuCat4','diningMenuCat5','diningMenuCat6'));


    }




}
