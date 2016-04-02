@extends('admin_master_page')
@section('css_ref')
    @parent
@stop

@section('content_header')

    <h1>
        Reservations Home
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop

@section('content')



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Reservations</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="adminRoomsHomeTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer ID</th>
                    <th>Phone Number</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Amount</th>
                    <th>Room No</th>
                    <th>Status</th>
                    <th>Reserved At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach( $reservations as $reservation )


                            @if($reservation->reservation_status == 0)
                                <?php $color="#F6D8CE" ?>
                            @else
                                <?php $color="white" ?>
                            @endif

                        <tr style="background-color: {{$color}}">
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->customer_id }}</td>
                            <td>{{ \App\Customer::getCustomerContactNumber($reservation->customer_id) }}</td>
                            <td>{{ $reservation->check_in }}</td>
                            <td>{{ $reservation->check_out }}</td>
                            <td>{{ $reservation->adults }}</td>
                            <td>{{ $reservation->children }}</td>
                            <td>{{ $reservation->price }}</td>
                            <td>{{ $reservation->selected_room_id }}</td>
                            @if($reservation->reservation_status == 1)
                                <td>Completed</td>
                            @else
                                <th>In Progress</th>
                            @endif
                            <td>{{ $reservation->created_at }}</td>
                            <td>
                                @if($reservation->reservation_status == 0)
                                    <a href="adminReservationMarkAsComplete_{{ $reservation->id }}">
                                        <span class="label label-danger">Mark As Complete</span>
                                    </a>
                                    @if($reservation->called_status == 0)
                                        <a href="markReservationAsCalled_{{ $reservation->id }}">
                                            <span class="label label-warning">Mark As Contacted</span>
                                        </a>
                                    @endif
                                @else
                                    <a href="adminReservationRecover_{{ $reservation->id }}">
                                        <span class="label label-warning">Recover</span>
                                    </a>
                                @endif
                                <a href="">
                                    <span class="label label-primary">Mail</span>
                                </a>
                                <a href="">
                                    <span class="label label-success">SMS</span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div>
    </div>



    <script>
        $("#delete").on("submit", function(){
            return confirm("Do you want to delete this item?");
        });
    </script>



@stop



@section('js_ref')
    @parent
@stop