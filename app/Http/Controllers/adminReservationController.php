<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\adminAddNewRoomsFormSubmitRequest;
use App\Http\Requests\updateRoomFormSubmitRequest;
use App\Reservation;
use App\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\CustomClasses\CurrencyConverterFacade;
use DB;

class adminReservationController extends Controller
{


    /**
     * admin add new rooms form display
     *
     * @return $this
     */
    public function addNewRooms()
    {
        $room_types = Room::getAllRoomTypes();

        return view('pages.admin.reservation.add_new_room')
            ->with('room_types', $room_types);

    }


    /**
     * admin view all roms form
     *
     * @return $this
     */
    public function adminRoomsHome()
    {
        $rooms = Room::getAllRooms();

        return view('pages.admin.reservation.roomHome')
            ->with('rooms', $rooms);
    }


    /**
     * admin add new rooms form submit
     *
     * @param adminAddNewRoomsFormSubmitRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNewRoomFormSubmit(adminAddNewRoomsFormSubmitRequest $request)
    {
        $room_name = \Input::get('room_name');
        $room_type = \Input::get('room_type');
        $room_description = \Input::get('room_description');
        $room_price = \Input::get('room_price');
        $room_name_availability = Room::checkRoomNameAvailability($room_name);

        if ($room_name_availability) {
            return redirect('adminAddNewRooms')
                ->with('message', "Error!!! Room name is already in use!!!");
        } else {
            Room::addNewRoomDetails($room_name, $room_type, $room_price, $room_description);

            return redirect('adminAddNewRooms')
                ->with('message', "Successfully Added!!!");
        }

    }


    /**
     * view history of rooms
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function adminViewRoomHistory($id)
    {
        return view('pages.admin.reservation.admin_view_history');
    }


    /**
     *Admin admin available rooms form
     *
     * @param $id
     * @return $this
     */
    public function adminUpdateRoom($id)
    {
        $room = Room::getRoomDetails($id);
        $room_types = Room::getAllRoomTypes();

        return view('pages.admin.reservation.update_room')
            ->with('room', $room)
            ->with('room_types', $room_types);
    }


    /**
     *dmin remove available rooms form
     *
     * @param $id
     * @return $this
     */
    public function adminRemoveRoom($id)
    {

        Room::removeRoom($id);
        $rooms = Room::getAllRooms();

        return view('pages.admin.reservation.roomHome')
            ->with('rooms', $rooms)
            ->with('message', 'Successfully Removed!!!');
    }


    /**
     *update room form submit
     *
     * @param updateRoomFormSubmitRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRoomFormSubmit(updateRoomFormSubmitRequest $request)
    {
        $id = \Input::get('room_id');
        $room_name = \Input::get('room_name');
        $room_type = \Input::get('room_type');
        $room_description = \Input::get('room_description');
        $room_price = \Input::get('room_price');
        Room::updateRoomDetails($id, $room_name, $room_type, $room_description, $room_price);

        return redirect('adminUpdateRoom_' . $id)
            ->with('message', "Successfully Updated!!!");
    }


    /**
     *admin view all the reservations
     *
     * @return $this
     */
    public function viewAllReservations()
    {
        $reservations = Reservation::getReservationDetails();

        return view('pages.admin.reservation.adminViewReservations')
            ->with('reservations', $reservations);
    }


    /**
     *admin mark completed reservations
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminReservationMarkAsComplete($id)
    {
        Reservation::markReservationAsComplete($id);

        //Remove the booking lines from tbl_room_booking_controll
        Reservation::removeBlockingLines($id);

        return redirect('view_all_reservations');
    }


    /**
     *admin recover already completed reservations
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function adminReservationRecover($id)
    {
        Reservation::completedReservationsRestore($id);

        return redirect('view_all_reservations');
    }


    /**
     *admin will mark reservation as contacted the customer
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function markReservationAsCalled($id)
    {
        Reservation::markAsCalled($id);

        return redirect('view_all_reservations');
    }


    public function errorPage()
    {
        return view('pages.client.errorpage');
    }

    public function adminEventReportsRoom()
    {

        $reservations = Reservation::getAdminSearchResultsRoom();
        $current_reservations = Reservation::getAdminSearchResultsDaysCurrent();
        $upcomming_reservations = Reservation::getAdminSearchResultsDaysUpcomming();
        $this_month_reservations = Reservation::getMonthlyReservations();
        $roomReportTotal = Reservation::roomReportTotal();
        $roomReportNew = Reservation::roomReportNew();
        $roomReportDaily = Reservation::roomReportDaily();
        $roomReportMonthly = Reservation::roomReportMonthly();

        return view('pages.admin.reservation.event_reports.event_report_room')
            ->with('reservations',$reservations)
            ->with('current_reservations',$current_reservations)
            ->with('upcomming_reservations',$upcomming_reservations)
            ->with('roomReportTotal',$roomReportTotal)
            ->with('roomReportNew',$roomReportNew)
            ->with('roomReportDaily',$roomReportDaily)
            ->with('this_month_reservations',$this_month_reservations)
            ->with('roomReportMonthly',$roomReportMonthly);

    }

    public function adminEventReportsRoomSubmit(){

        $dateFrom = date("d-m-Y", strtotime(\Input::get('datefrom')));
        $dateTo = date("d-m-Y", strtotime(\Input::get('dateto')));

        $reservations = Reservation::getAdminSearchResultsDays($dateFrom, $dateTo);
        $current_reservations = Reservation::getAdminSearchResultsDaysCurrent();
        $upcomming_reservations = Reservation::getAdminSearchResultsDaysUpcomming();
        $this_month_reservations = Reservation::getMonthlyReservations();
        $roomReportTotal = Reservation::roomReportTotal();
        $roomReportNew = Reservation::roomReportNew();
        $roomReportDaily = Reservation::roomReportDaily();
        $roomReportMonthly = Reservation::roomReportMonthly();

        return view('pages.admin.reservation.event_reports.event_report_room')
            ->with('dateFrom',$dateFrom)
            ->with('dateTo',$dateTo)
            ->with('reservations',$reservations)
            ->with('current_reservations',$current_reservations)
            ->with('upcomming_reservations',$upcomming_reservations)
            ->with('roomReportTotal',$roomReportTotal)
            ->with('roomReportNew',$roomReportNew)
            ->with('roomReportDaily',$roomReportDaily)
            ->with('this_month_reservations',$this_month_reservations)
            ->with('roomReportMonthly',$roomReportMonthly);
    }

    public function test($amount,$from,$to){

/*
        if($from == $to)
        {
            return $amount * 1;
        }else{
            // $amount = urlencode("1");
            // $from_Currency = urlencode("LKR");
            // $to_Currency = urlencode("AUS");
            $get = file_get_contents("https://www.google.com/finance/converter?a=1&from=$from&to=$to");
            $get = explode("<span class=bld>",$get);
            $get = explode("</span>",$get[1]);
            $converted_amount = preg_replace("/[^0-9\.]/", null, $get[0]);

            return $amount * $converted_amount;
        }

*/

        $facade = new CurrencyConverterFacade();

        $facade->setCurrencyFrom("USD");
        $facade->setCurrencyTo("LKR");
        $rate = $facade->getExchangeRate();





        return $rate;

    }


    public function adminAddMarkups(){

        $available_rooms = DB::table('tbl_rooms')->get();
        $markup_added_rooms = DB::table('tbl_markups')->get();

        $available_rooms_array = array();
        $markup_added_rooms_array = array();

        foreach($available_rooms as $room){
            array_push($available_rooms_array,$room->id);
        }

        foreach($markup_added_rooms as $room){
            array_push($markup_added_rooms_array,$room->room_id);
        }

        $result_rooms=array_diff($available_rooms_array,$markup_added_rooms_array);




        return view('pages.admin.reservation.admin_add_markups')
                        ->with('result_rooms',$result_rooms)
                        ->with('markup_added_rooms',$markup_added_rooms);
    }


    public function adminAddMarkupsSubmit(){
        $roomID = \Input::get('room_id');
        $percantage = \Input::get('room_markup');
        $date = Carbon::now();

        Reservation::insertMarkup($roomID,$percantage,$date);

        return redirect('admin_add_markups');
    }


    public function adminAddMarkupsSubmitAjax($id){

        $room_name = DB::table('tbl_rooms')->where('id','=',$id)->pluck('name');
        $room_type =  Room::getRoomTypeValue(DB::table('tbl_rooms')->where('id','=',$id)->pluck('type'));
        $room_amount = DB::table('tbl_rooms')->where('id','=',$id)->pluck('price');

        $send = array($room_name,$room_type,$room_amount);

        return json_encode($send);
    }

    public function adminAddMarkupsRemove($id){
        Room::removeMarkup($id);
        return redirect('admin_add_markups');
    }


    public function adminEventReportsDining()
    {


    }


    public function adminEventReportsWedding()
    {

    }

    public function adminEventReportsPool()
    {


    }



}


