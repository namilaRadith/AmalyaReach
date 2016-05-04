@extends('admin_master_page')
@section('css_ref')
    @parent

    <style>

        .details {
            width: 150px;
            color: white;
            background-color: #007bb6;
        }


    </style>

@stop
@section('content_header')

    <h1>
        SwimmingPool Reservations
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop
@section('content')

    <div class="container col-md-10" style="background-color:#b8c7ce;left:150px;right:150px ">
        <br>

        <div class="panel panel-default col-md-12">
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-9">

                        <div class="box-body ">
                            <table id="adminRoomsHomeTable" class="table table-condensed">
                                <tbody>
                                <tr>
                                    <th class="details">Name :</th>
                                    <td>{{$userDetails->title}} {{$userDetails->name}} {{$userDetails->last_name}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Event Type :</th>
                                    <td>{{$reservationInfo->eventType}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Start Date :</th>
                                    <td>{{$reservationInfo->startDate}}</td>
                                </tr>
                                <tr>
                                    <th class="details">End Date :</th>
                                    <td>{{$reservationInfo->endDate}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Start Time :</th>
                                    <td>{{$reservationInfo->startTime}}</td>
                                </tr>
                                <tr>
                                    <th class="details">End Time :</th>
                                    <td>{{$reservationInfo->endTime}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Age Group :</th>
                                    <td>{{$reservationInfo->ageGroup}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Age Range :</th>
                                    <td>{{$reservationInfo->ageRange}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Special Requests :</th>
                                    <td>{{$reservationInfo->specialReq}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    @if(($reservationInfo->reqProgress) == "Pending" || ($reservationInfo->reqProgress) == "Not Viewed")
                        <div class="col-md-2">
                            <br>
                            <a href="{{URL::to('confirmPool/'.$reservationInfo->id)}}" class="btn_1">
                                <button class="label label-success" style="color:white;height:30px ; ">Accept And Send
                                    Confirmation Email
                                </button>
                            </a>
                            <br>
                            <br>
                            <a href="{{URL::to('rejectPoolRes/'.$reservationInfo->id)}}" class="btn_1">
                                <button class="label label-danger" style="color:white;height:30px ; ">Reject And Send
                                    Rejection Email
                                </button>
                            </a>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </div>
    </div>



@stop
@section('js_ref')
    @parent






@stop