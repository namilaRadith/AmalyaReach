@extends('admin_master_page')
@section('css_ref')
    @parent






@stop

@section('content_header')

    <h1>
        Rooms Reports
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop

@section('content')



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Event Reports of Rooms</h3>
        </div>
        <div class="box-body">

            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box"  style="background-color: #f3f3f3">
                        <span class="info-box-icon bg-blue-active"><i class="fa fa-files-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Reservations</span>
                            <span class="info-box-number">{{  $roomReportTotal }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box"  style="background-color: #f3f3f3">
                        <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">New Reservations</span>
                            <span class="info-box-number">{{ $roomReportNew }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box"  style="background-color: #f3f3f3">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Daily Reservations</span>
                            <span class="info-box-number">{{ $roomReportDaily }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box"  style="background-color: #f3f3f3">
                        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Monthly Reservations</span>
                            <span class="info-box-number">{{ $roomReportMonthly }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->


            </div>

            <br><br>

            <div class="row">
                    <?php

//                        if(isset('dateFrom')){
//
//                            echo "sfdd";
//                        }

//                if (isset($dateFrom)) {
//
//                }

                    ?>


                    <form role="form" method="post" action="admin_view_room_reports_search_form_submit" id="admin_view_room_reports_search_form" name="admin_view_room_reports_search_form" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="col-lg-3 col-md-3">
                        <label>Date From</label>

                        <input type="text" class="form-control dateadmin" id="datefrom" name="datefrom" readonly>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <label>Date To</label>
                        <input type="text" class="form-control dateadmin" id="dateto" name="dateto" readonly>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <label>&nbsp;</label><br>
                        <input type="submit" class="btn btn-primary" onclick="" value="Find" style="width: 100px !important;">
                    </div>

                    <br>

                    <div class="col-md-12 col-lg-12" id="error_div_dateValidation" name="error_div_dateValidation" style="color:red;">
                    </div>


                </form>
            </div>




            <br>



            <table id="events_reports_rooms" class="table table-bordered table-striped">
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
                </tr>
                </thead>
                <tbody>
                @foreach( $reservations as $reservation )
                    <tr>
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

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>



            <br><br>

            <div class="col-md-6 col-lg-4 col-sm-12">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Current Reservations</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Phone Number</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($current_reservations as $res )
                                <tr>
                                    <td>{{ $res->id }}</td>
                                    <td><span class="label label-primary">{{ $res->check_in  }}</span></td>
                                    <td><span class="label label-primary">{{ $res->check_out }}</span></td>
                                    <td>{{ \App\Customer::getCustomerContactNumber($res->customer_id) }}</td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div>
                </div><!-- /.box -->
                <div class="box-footer clearfix">
                    <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Generate Report</a>
                </div>
            </div>



            <div class="col-md-6 col-lg-4 col-sm-12">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Monthly Reservations</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Phone Number</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($this_month_reservations as $this_month_reservation )
                                    <tr>
                                        <td>{{ $this_month_reservation['id'] }}</td>
                                        <td><span class="label label-success">{{ $this_month_reservation['check_in']  }}</span></td>
                                        <td><span class="label label-success">{{ $this_month_reservation['check_out'] }}</span></td>
                                        <td>{{ \App\Customer::getCustomerContactNumber( $this_month_reservation['customer_id']) }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div>
                </div><!-- /.box -->
                <div class="box-footer clearfix">
                    <a href="javascript::;" class="btn btn-sm btn-success btn-flat pull-left">Generate Report</a>
                </div>
            </div>




            <div class="col-md-6 col-lg-4 col-sm-12">

                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upcomming Reservations</h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>

                                <tr>
                                    <th>ID</th>
                                    <th>Check In</th>
                                    <th>Check Out</th>
                                    <th>Phone Number</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($upcomming_reservations as $res )
                                    <tr>
                                        <td>{{ $res->id }}</td>
                                        <td><span class="label label-warning">{{ $res->check_in  }}</span></td>
                                        <td><span class="label label-warning">{{ $res->check_out }}</span></td>
                                        <td>{{ \App\Customer::getCustomerContactNumber($res->customer_id) }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div>
                </div><!-- /.box -->
                <div class="box-footer clearfix">
                    <a href="javascript::;" class="btn btn-sm btn-warning btn-flat pull-left">Generate Report</a>
                </div>
            </div>

        </div><!-- /.box-body -->
    </div>





@stop



@section('js_ref')

    @parent


    <script type="text/javascript">

        $('#admin_view_room_reports_search_form').submit(function() {

            var dateTo = document.getElementById("dateto").value;
            var dateFrom = document.getElementById("datefrom").value;

            document.getElementById('error_div_dateValidation').innerHTML = "";



            if( dateFrom == "" || dateTo == ""){

                $message = "<br>&nbsp;&nbsp;&nbsp;Please select the days Correctly. Dates Can't be Empty...";

                document.getElementById('error_div_dateValidation').innerHTML = $message;
                return false;
            }else{
                return true;
            }



        });
    </script>



@stop