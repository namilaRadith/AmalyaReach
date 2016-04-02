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
        Dinning Reservations
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
                                    <td>{{$reservationInfo->title}} {{$reservationInfo->firstName}} {{$reservationInfo->lastName}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Email :</th>
                                    <td>{{$reservationInfo->email}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Phone :</th>
                                    <td>{{$reservationInfo->phone}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Venue :</th>
                                    <td>{{$reservationInfo->resLocation}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Reservation Date :</th>
                                    <td>{{$reservationInfo->bookingDate}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Reservation Time :</th>
                                    <td>{{$reservationInfo->bookingTime}}</td>
                                </tr>
                                <tr>
                                    <th class="details">No. of Adults:</th>
                                    <td>{{$reservationInfo->noOfAdults}}</td>
                                </tr>
                                <tr>
                                    <th class="details">No. of Children :</th>
                                    <td>{{$reservationInfo->noOfChildren}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Additional Information :</th>
                                    <td>{{$reservationInfo->additionalInformation}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>

                    @if(($reservationInfo->acceptedStatus) != "Accepted")
                    <div class="col-md-2">
                        <br>
                        <a href="">
                            <button class="label label-success" style="color:white;height:30px ; ">Accept And Send
                                Confirmation Email
                            </button>
                        </a>
                        <br>
                        <br>
                        <a href="">
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