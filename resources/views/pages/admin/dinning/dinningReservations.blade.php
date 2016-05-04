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
            color: #0000C2;
            font-size: 1.2em;
        }

        .fa-circle
        {
            color: red;
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
    <div class="stList" style="display: none">
        @foreach($notViewedResList as $notViewedResList)
            {{$count=$count+1}}
        @endforeach
    </div>

    <div class="blah" style="display: none">
        <label for="newRes" id="newRes" name="newRes">{{$count}}</label>
    </div>

@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Available Rooms</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="adminDinResTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th></th>
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
                    @if(($reservationInfo->acceptedStatus)== "Not Viewed")
                         <tr class="newRes"  style="display: none" >
                    @else
                        <tr>
                            @endif
                            @if(($reservationInfo->acceptedStatus)== "Pending")
                                <td><span><i class="fa fa-refresh "></i></span></td>

                            @elseif(($reservationInfo->acceptedStatus)== "Accepted")
                                <td><span ><i class="fa fa-check-circle"></i></span></td>

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
                                <td>{{ $reservationInfo->acceptedStatus }}</td>

                            @elseif(($reservationInfo->acceptedStatus)== "Accepted")
                                <td>{{ $reservationInfo->acceptedStatus}}
                                </td>

                            @else
                                <td>{{ $reservationInfo->acceptedStatus }}
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
    <!--    <script>
            function chkNewReservations(){
               var newResCount = $('#newRes').text();

                if(newResCount>0)
                {
                  //  alert("New Resvertaion yeey!!");
                }

               // setTimeout(chkNewReservations, 1500);
            }

            $(function () {
                chkNewReservations();
                $('#newRes').text()
            });
        </script> -->


    <script>


        $("#dropDownNotify").on('click', function(){
            $("#lblNotify").hide();

        });


        //Method to view new reservations on click of notifications
        $(document).ready(function() {
            var newId=0;

            $("#viewNewRes").click(function(e){
                e.preventDefault();

                //loop through each now reservations row
                $('#adminDinResTable').find("tr.newRes").each(function(index){
                    newId++;

                    //Assign id dynamically to each row
                    this.setAttribute("id" ,newId , 0);


                    //Display the newly Added rows
                    var id=$(this).attr('id');
                    $("#" + id).show();



                });

            });

        });

    </script>


@stop