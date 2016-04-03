@extends('admin_master_page')
@section('css_ref')
    @parent
    <link href="{{asset('/client/css/magnific-popup.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admin/plugins/datatables/dataTables.bootstrap.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/skins/_all-skins.min.css')}}">
@stop

@section('content_header')

    <h1>
        Manage Online Discounts
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop

@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">


            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Special Offers Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->




                <form role="form" id="add_new_room_form" name="add_new_room_form" action="addNewRoomFormSubmit" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                        {{--@if (Session::has('message'))--}}
                        {{--<div class="alert alert-info">{{ Session::get('message') }}</div>--}}
                        {{--@endif--}}

                        {{--@if($errors->any())--}}
                        {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                        {{--@foreach($errors->all() as $error)--}}
                        {{--<li>{{$error}}</li>--}}
                        {{--@endforeach--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        {{--@endif--}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Offer Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" >
                                </div>
                            </div>
                            {{--<div class="col-md-6">--}}
                                {{--<div class="form-group">--}}
                                    {{--<label for="exampleInputPassword1">Room Type</label>--}}
                                    {{--<select class="form-control select2" id="room_type" name="room_type" style="width: 100%;">--}}
                                        {{--@foreach($room_types as $room_type)--}}
                                        {{--<option value="{{$room_type->id}}">{{$room_type->value}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea class="form-control" id="room_description" name="room_description" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Price(USD)</label>
                                    <input type="text" class="form-control" id="room_price" name="room_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discount (%)</label>
                                    <input type="text" class="form-control" id="room_price" name="room_price" placeholder="Enter Room Discount">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Net Special offer Price (USD)</label>
                                    <input type="text" class="form-control" id="room_price" name="room_price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Facility</h3>
            </div>
            <div class="box-header with-border">
                    <div class="col-md-4">
                        <select class="form-control select2" onchange="show_fields()" id="facility_select" name="facility_select">
                            <option value="0">Please Select</option>
                            <option value="1">Accomodation</option>
                            <option value="2">Dinning</option>
                        </select>
                    </div>
            </div>
            </div>
     </div>
    </div>




        <div class="row" id = "accomodation_list_veiw" style="display: none">
            <div class="col-md-12">
                <div class="col-xs-9">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Accomodation List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="color:slategrey">#</th>
                                        <th style="color:slategrey">Room Type</th>
                                        <th style="color:slategrey">Room Name</th>
                                        <th style="color:slategrey">Room Price</th>
                                        <th style="color:slategrey">Room Discount</th>
                                        <th style="color:slategrey">Room Value</th>
                                        <th style="color:red">EDIT</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $a=1; ?>
                                    @foreach ($rooms_dump as $rooms)
                                    <tr>
                                    <th style="color: grey"><?php echo $a; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $rooms->value; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $rooms->name; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $rooms->price; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $rooms->discount; ?></th>
                                        <th style="color: #2b2b2b"><?php echo $rooms->price - $rooms->discount; ?></th>
                                    <th style="color: #2b2b2b"><button type="button" onclick = "get_cust_details(<?php echo $rooms->id; ?>)" class="btn btn-primary"><i class="fa fa-pencil"></i>EDIT</button></th>
                                    </tr>
                                    <?php $a++; ?>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <th style="color:slategrey">#</th>
                                    <th style="color:slategrey">Room Type</th>
                                    <th style="color:slategrey">Room Name</th>
                                    <th style="color:slategrey">Room Price</th>
                                    <th style="color:slategrey">Room Discount</th>
                                    <th style="color:slategrey">Room Value</th>
                                    <th style="color:red">EDIT</th>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                            <!-- /.box -->
                    </div>
                </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->






@stop



@section('js_ref')
    @parent

    <!-- DataTables -->
    <script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $('.magnific-gallery').each(function() {
            'use strict';
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery:{enabled:true}
            });
        });

        function deleteImage(id) {

            $.ajax({
                method: "GET",
                url: 'img-gallery/delete/'+id ,
                success:function(data){
                    alert(data);
                }

            });

        }
        <!-- page script -->

        $(function () {
            $("#example1").DataTable();

        });

//        function show_details(){
//
//            $("#cust_detail_form").hide();
//            $("#cust_detail_form").show();
//        }

        function get_yesNo(val){

            if(val){
                return 'YES';
            }
            else{
                return 'NO';
            }
        }
        function formatBirthday(bday,bmon,byear){
            var birthday = bday + "/" + bmon + "/" + byear ;
            return birthday;
        }
        function formatAddress(street,city,country){
            var Address = street + ", " + city + ", " + country ;
            return Address;
        }
        function get_cust_details(id){



            $('html,body').animate({scrollTop: $("#cust_detail_form").offset().top}, 800);

            $.getJSON(
                    "searchroomdetails/" + id,
                    null,
                    function(data) {
                        console.log(data);

                        $('#room_name').val(data[0]['type']);
//                        $('#form_cust_name').val(data[0]['name']);
//                        $('#form_cust_address').val(formatAddress(data[0]['street'],data[0]['city'],data[0]['country']));
//                        $('#form_cust_contact').val(data[0]['phone']);
//                        $('#form_cust_gender').val(data[0]['gender']);
//                        $('#form_cust_children').val(get_yesNo(data[0]['children']));
//                        $('#form_cust_DOB').val(formatBirthday(data[0]['bday'],data[0]['bmonth'],data[0]['byear']));
//                        $('#form_cust_nationality').val(data[0]['nationality']);
//                        $('#form_cust_allowPO').val(get_yesNo(data[0]['recieve_p_offers']));
//                        $('#form_cust_allowPPO').val(get_yesNo(data[0]['allow_p_p_offers']));
//                        $("#cust_id").val(data[0]['id']);


                    }
            );

        }


        function show_fields(){
            var select_option = $("#facility_select").val();

                    if(select_option != '0') {
                                if (select_option == '1')
                                {

                                    $("#accomodation_list_veiw").show();
                                    $('html,body').animate({scrollTop: $("#accomodation_list_veiw").offset().top}, 800);
                                }
                                else if(select_option == '2'){
                                    $("#accomodation_list_veiw").hide();
                                }
                    }
                    else{
                        $("#accomodation_list_veiw").hide();
                    }
                }

    </script>



@stop