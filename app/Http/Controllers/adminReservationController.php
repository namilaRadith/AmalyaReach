<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\adminAddNewRoomsFormSubmitRequest;
use App\Http\Requests\updateRoomFormSubmitRequest;
use App\Reservation;
use App\Room;
use Illuminate\Http\Request;

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

    public function test(){

        $x = Reservation::createNewReservation(1,"LKR","AUS");
        return $x;
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


