<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\adminAddNewRoomsFormSubmitRequest;
use App\Http\Requests\updateRoomFormSubmitRequest;
use App\Room;
use Illuminate\Http\Request;

class adminReservationController extends Controller {

	public function addNewRooms(){

        $room_types = Room::getAllRoomTypes();

        return view('pages.admin.reservation.add_new_room')
            ->with('room_types',$room_types);

    }

    public function adminRoomsHome(){
        $rooms = Room::getAllRooms();
        return view('pages.admin.reservation.roomHome')
            ->with('rooms',$rooms);
    }

  //  public function addNewRoomFormSubmit(Requests\adminAddNewRoomsFormSubmitRequest $request){

    public function addNewRoomFormSubmit(adminAddNewRoomsFormSubmitRequest $request){
        $room_name = \Input::get('room_name');
        $room_type = \Input::get('room_type');
        $room_description = \Input::get('room_description');
        $room_price = \Input::get('room_price');

        Room::addNewRoomDetails($room_name,$room_type,$room_price,$room_description);


        return redirect('adminAddNewRooms')
            ->with('message',"Successfully Added!!!");

    }

    public function adminViewRoomHistory($id){
        return view('pages.admin.reservation.admin_view_history');
    }

    public function adminUpdateRoom($id){
        $room = Room::getRoomDetails($id);
        $room_types = Room::getAllRoomTypes();
        return view('pages.admin.reservation.update_room')
            ->with('room',$room)
            ->with('room_types',$room_types);
    }

    public function adminRemoveRoom($id){

        Room::removeRoom($id);

        $rooms = Room::getAllRooms();
        return view('pages.admin.reservation.roomHome')
            ->with('rooms',$rooms)
            ->with('message','Successfully Removed!!!');
    }

    public function updateRoomFormSubmit(updateRoomFormSubmitRequest $request){
        $id = \Input::get('room_id');
        $room_name = \Input::get('room_name');
        $room_type = \Input::get('room_type');
        $room_description = \Input::get('room_description');
        $room_price = \Input::get('room_price');

        Room::updateRoomDetails($id,$room_name,$room_type,$room_description,$room_price);

        return redirect('adminUpdateRoom_'.$id)
            ->with('message',"Successfully Updated!!!");

    }


}
