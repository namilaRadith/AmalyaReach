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
                            <table id="adminRoomsHomeTable" class="table table-condensed table-bordered">
                                <tbody>
                                <tr>
                                    <th class="details">Name :</th>
                                    <th class="details">Company</th>
                                    <th class="details">Email</th>
                                 </tr>
                                 <tr>
                                    <td>{{$userDetails->title}} {{$userDetails->name}} {{$userDetails->last_name}}</td>
                                    <td>{{$reservationInfo->company}}</td>
                                    <td>{{$userDetails->email}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Date From </th>
                                    <th class="details">Date To</th>
                                    <th class="details">Dates Flexible</th>
                                </tr>
                                <tr>
                                    <td>{{$reservationInfo->dateFrom}}</td>
                                    <td>{{$reservationInfo->dateTo}}</td>
                                    <td>{{$reservationInfo->datesFlexible}}</td>
                                </tr>
                                <tr>
                                    <th class="details">No of Guests</th>
                                    <th class="details">No of Guest Rooms</th>
                                    <th class="details">No of Meeting Rooms</th>
                                </tr>
                                <tr>
                                    <td>{{$reservationInfo->noOfGuests}}</td>
                                    <td>{{$reservationInfo->noOfGuestsRooms}}</td>
                                    <td>{{$reservationInfo->noOfMeetingRooms}}</td>
                                </tr>
                                <tr>
                                    <th class="details">Food and Beverages</th>
                                    <th class="details">Audio and Visual</th>
                                    <th class="details">Like To Contact</th>
                                </tr>
                                <tr>
                                    <td>{{$reservationInfo->foodAndBev}}</td>
                                    <td>{{$reservationInfo->audioAndVisual}}</td>
                                    <td>{{$reservationInfo->likeContact}}</td>
                                </tr>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>

                            <table id="adminRoomsHomeTable" class="table table-condensed table-bordered">
                                <tr>
                                <th class="details">Other details</th>
                                </tr>
                                <tr>
                                    <td>{{$reservationInfo->otherDetails}}</td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->


                    </div>
                    @if(($reservationInfo->resStatus) != "Accepted")
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