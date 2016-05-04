@extends('admin_master_page')
@section('css_ref')
    @parent

    <style>
        .fa-refresh
        {
            color: darkorange;
            font-size: 1.2em;
        }

        .fa-check-circle
        {
            color:#0066cc;
            font-size: 1.2em;
        }

        .fa-circle
        {
            color: red;
        }
        .fa-ban
        {
            color: peru;
            font-size: 1.2em;
        }

        .fa-times-circle
        {
            color: black;
            font-size: 1.2em;
        }

    </style>

@stop

@section('content_header')

    <h1>
        Dinning reservations
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">
    </ol>


@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Reservations</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="adminDinResTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Flag</th>
                    <th>Name</th>
                    <th>Reservation Location</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Request Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $reservationInfo as $reservationInfo )
                        <tr class="newRes">
                            @if(($reservationInfo->acceptedStatus)== "Pending")
                                <td><span><i class="fa fa-refresh "></i></span></td>

                            @elseif(($reservationInfo->acceptedStatus)== "Accepted")
                                <td><span ><i class="fa fa-check-circle"></i></span></td>
                            @elseif(($reservationInfo->acceptedStatus)== "Closed")
                                <td><span ><i class="fa fa-ban"></i></span></td>
                            @elseif(($reservationInfo->acceptedStatus)== "Rejected")
                                <td><span ><i class="fa fa-times-circle"></i></span></td>
                            @else
                                <td><span class="fa-stack fa " style="font-size: 0.7em;">
                                                                      <i class="fa fa-circle fa-stack-2x"></i>
                                                                      <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                                                                    </span>
                                </td>
                            @endif


                            <td>{{ $reservationInfo->title }} {{ $reservationInfo->firstName }} {{ $reservationInfo->lastName }}</td>
                            <td>{{ $reservationInfo->resLocation }}</td>
                            <td>{{ $reservationInfo->bookingDate }}</td>
                            <td>{{ $reservationInfo->bookingTime }}</td>
                            @if(($reservationInfo->acceptedStatus)== "Pending")
                                <td> <label class="label label-warning">{{ $reservationInfo->acceptedStatus}}</label>
                                </td>

                            @elseif(($reservationInfo->acceptedStatus)== "Accepted")
                                <td> <span class="label label-primary" >{{ $reservationInfo->acceptedStatus}}</span>
                                </td>
                                @elseif(($reservationInfo->acceptedStatus)== "Closed")
                                    <td> <span class="label" style="background-color:peru" >{{ $reservationInfo->acceptedStatus}}</span>
                                    </td>
                                @elseif(($reservationInfo->acceptedStatus)== "Rejected")
                                    <td> <span class="label" style="background-color:black" >{{ $reservationInfo->acceptedStatus}}</span>
                                    </td>
                            @else
                                <td> <span class="label label-danger" >{{ $reservationInfo->acceptedStatus}}</span>
                                </td>

                            @endif
                            <td>
                                <a href="{{URL::to('dinningRes/view/'.$reservationInfo->id)}}" id="btnView">
                                    <span class="label label-success" >View More</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div>



    @stop



    @section('js_ref')
    @parent
            <script>
                $("#dropDownNotify").on('click', function(){
                    $("#lblNotify").hide();

                });

            </script>

@stop