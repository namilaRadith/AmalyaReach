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
        Swimming Pool Reservations
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
                            <th>Event Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Event Time</th>
                            <th>Age Group</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $reservationInfo as $reservationInfo )
                            <tr class="newRes">
                                @if(($reservationInfo->reqProgress)== "Pending")
                                    <td><span><i class="fa fa-refresh "></i></span></td>

                                @elseif(($reservationInfo->reqProgress)== "Accepted")
                                    <td><span ><i class="fa fa-check-circle"></i></span></td>
                                @elseif(($reservationInfo->reqProgress)== "Closed")
                                    <td><span ><i class="fa fa-ban"></i></span></td>
                                @elseif(($reservationInfo->reqProgress)== "Rejected")
                                    <td><span ><i class="fa fa-times-circle"></i></span></td>
                                @else
                                    <td><span class="fa-stack fa " style="font-size: 0.7em;">
                                                                      <i class="fa fa-circle fa-stack-2x"></i>
                                                                      <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                                                                    </span>
                                    </td>
                                @endif


                                <td>{{ $reservationInfo->title }} {{ $reservationInfo->name }} {{ $reservationInfo->last_name }}</td>
                                <td>{{ $reservationInfo->eventType }}</td>
                                <td>{{ $reservationInfo->startDate }}</td>
                                <td>{{ $reservationInfo->endDate }}</td>
                                <td>{{ $reservationInfo->startTime }}</td>
                                <td>{{ $reservationInfo->ageGroup }}</td>
                                @if(($reservationInfo->reqProgress)== "Pending")
                                    <td> <label class="label label-warning">{{ $reservationInfo->reqProgress}}</label>
                                    </td>

                                @elseif(($reservationInfo->reqProgress)== "Accepted")
                                    <td> <span class="label label-primary" >{{ $reservationInfo->reqProgress}}</span>
                                    </td>
                                @elseif(($reservationInfo->reqProgress)== "Closed")
                                    <td> <span class="label" style="background-color:peru" >{{ $reservationInfo->reqProgress}}</span>
                                    </td>
                                @elseif(($reservationInfo->reqProgress)== "Rejected")
                                    <td> <span class="label" style="background-color:black" >{{ $reservationInfo->reqProgress}}</span>
                                    </td>
                                @else
                                    <td> <span class="label label-danger" >{{ $reservationInfo->reqProgress}}</span>
                                    </td>

                                @endif
                                <td>
                                    <a href="{{URL::to('adminPoolViewMore/'.$reservationInfo->id)}}" id="btnView">
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