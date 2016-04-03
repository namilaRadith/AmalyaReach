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

@section('content')




        <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Loyalty Requests</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Allow Personalized Offers</th>
                                <th>Allow Partners Personalized Offers</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1; ?>
                            @foreach ($loyalties as $loyalty)
                                <tr>
                                    <th style="color: grey"><?php echo $a; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $loyalty['email']; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $loyalty['name']; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $loyalty['phone']; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $loyalty['country']; ?></th>
                                    <th style="color: #2b2b2b"><?php  if($loyalty['recieve_p_offers']){echo 'YES';}
                                            else{
                                                echo "NO";
                                            }?></th>
                                    <th style="color: #2b2b2b"><?php if($loyalty['allow_p_p_offers']){echo 'YES';}
                                        else{
                                            echo "NO";
                                        } ?></th>
                                    <th style="color: #2b2b2b"><?php if($loyalty['flag'] == '1'){echo "Active";}else echo "InActive"; ?></th>
                                    <th style="color: #2b2b2b"><button type="button" onclick = "get_cust_details(<?php echo $loyalty['id']; ?>)" class="btn btn-primary"><i class="fa fa-search-plus"></i></button></th>
                                </tr>
                                <?php $a++; ?>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <th>#</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Allow Personalized Offers</th>
                                <th>Allow Partners Personalized Offers</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <section class="content" id = "cust_detail_form"  style="display: none">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Customer Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ action('LoyaltyController@update_loyalty_request_submit') }}" method="post" accept-charset="UTF-8">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="box-body col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input id="form_cust_email" type="email" class="form-control" id="exampleInputEmail1"  disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" id="form_cust_name" class="form-control" id="exampleInputPassword1" disabled="disabled" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" id="form_cust_address" class="form-control" id="exampleInputPassword1" disabled="disabled" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact</label>
                                <input type="text" id="form_cust_contact" class="form-control" id="exampleInputPassword1" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Gender</label>
                                <input type="text" id="form_cust_gender" class="form-control" id="exampleInputPassword1" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">D.O.B</label>
                                <input type="text" id="form_cust_DOB" class="form-control" id="exampleInputPassword1" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nationality</label>
                                <input type="text" id="form_cust_nationality" class="form-control" id="exampleInputPassword1" disabled="disabled">
                            </div>
                        </div>
                        <div class="box-body col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Children</label>
                                <input type="text" id="form_cust_children" class="form-control" id="exampleInputEmail1" disabled="disabled">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Allow Personalized Offers</label>
                                <input type="text" id="form_cust_allowPO" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Allow Parters Personlized Offers</label>
                                <input type="text" id="form_cust_allowPPO" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="form-group">

                                <input type="text" id="cust_id" class="form-control" name="cust_id" style="display: none">
                            </div>
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                                        Approve
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="0">
                                        Not Approve
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control" id = "loyalty_type" name ="loyalty_type">
                                    @foreach ($loyalty_master as $master)
                                        <option value="<?php  echo $master -> type;?>"><?php  echo $master -> type;?></option>
                                    @endforeach
                                </select>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox">--}}
                                        {{--Send Special Offers--}}
                                    {{--</label>--}}
                                {{--</div>--}}

                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox">--}}
                                        {{--Send Special Personlized Offers--}}
                                    {{--</label>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>

                            </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                        </div>
                    </form>
                </div>
            </div>
    </div>
        </section>














    </div>
    <!-- /.content-wrapper -->

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

        function show_details(){

            $("#cust_detail_form").hide();
            $("#cust_detail_form").show();
        }

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
            show_details();


            $('html,body').animate({scrollTop: $("#cust_detail_form").offset().top}, 800);

            $.getJSON(
                    "searchcustomer/" + id,
                    null,
                    function(data) {
                        console.log(data);
                        $("#cust_id").val(data[0]['id']);
                        $('#form_cust_email').val(data[0]['email']);
                        $('#form_cust_name').val(data[0]['name']);
                        $('#form_cust_address').val(formatAddress(data[0]['street'],data[0]['city'],data[0]['country']));
                        $('#form_cust_contact').val(data[0]['phone']);
                        $('#form_cust_gender').val(data[0]['gender']);
                        $('#form_cust_children').val(get_yesNo(data[0]['children']));
                        $('#form_cust_DOB').val(formatBirthday(data[0]['bday'],data[0]['bmonth'],data[0]['byear']));
                        $('#form_cust_nationality').val(data[0]['nationality']);
                        $('#form_cust_allowPO').val(get_yesNo(data[0]['recieve_p_offers']));
                        $('#form_cust_allowPPO').val(get_yesNo(data[0]['allow_p_p_offers']));

                        $("#loyalty_type").val(data[0]['type']);
                        var Approved_status = data[0]['flag'];

                        if(Approved_status =='1'){
                            $("#optionsRadios1").prop('checked',true);
                        }else{
                            $("#optionsRadios2").prop('checked',true);
                        }


                    }
            );




        }
    </script>




@stop