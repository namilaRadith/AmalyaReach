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
                        <h3 class="box-title">Existing Special Offers</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Offer Code</th>
                                <th>Description</th>
                                <th>Total Price</th>
                                <th>Discount</th>
                                <th>Net Price</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1; ?>
                            @foreach ($special_offers_table as $special_offers)
                                <tr>
                                    <th style="color:dimgrey"><?php echo $a; ?></th>
                                    <th style="color: dimgrey"><?php echo $special_offers->name; ?></th>
                                    <th style="color: dimgrey"><?php echo $special_offers->offer_code; ?></th>
                                    <th style="color: dimgrey"><?php echo $special_offers->description; ?></th>
                                    <th style="color: dimgrey"><?php echo $special_offers->total_price; ?></th>
                                    <th style="color: dimgrey"><?php echo $special_offers->discount; ?></th>
                                    <th style="color: dimgrey"><?php echo $special_offers->net_price; ?></th>
                                    <th style="color:darkred"><?php if($special_offers->flag =='1'){
                                            echo 'active';}
                                            else{ echo 'inactive';}?></th>
                                    <th style="color: #2b2b2b"><button type="button" onclick = "get_cust_details(<?php echo $special_offers->id; ?>)" class="btn btn-primary"><i class="fa fa-search-plus"></i></button></th>
                                </tr>
                                <?php $a++; ?>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <th>#</th>
                            <th>Name</th>
                            <th>Offer Code</th>
                            <th>Description</th>
                            <th>Total Price</th>
                            <th>Discount</th>
                            <th>Net Price</th>
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
                    <form role="form" id="add_new_offer" name="add_new_offer" action="{{action('AdminPromotions@update_special_promotions')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="box-body col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Offer Name</label>
                                <input id="name" type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Offer Code</label>
                                <input type="text" id="offer_code" name="offer_code" class="form-control" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Offer_Description</label>
                                <input type="text" id="description"  name="description" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Offer Total Price</label>
                                <input type="text" id="total_price" name="total_price" class="form-control"  readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Offer Discount</label>
                                <input type="text" id="discount" name="discount" class="form-control"  readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Offer Net Price</label>
                                <input type="text" id="net_price"  name="net_price"  class="form-control"  readonly="readonly">
                            </div>
                            <div class="form-group">

                                <input id="id" type="text" name="id" class="form-control" hidden="hidden" style="display: none">
                            </div>
                        </div>
                        <div class="box-body col-md-6">


                            <div class="form-group">     <label for="exampleInputPassword1">Offer Status</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
                                        Active
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="0">
                                        InActive
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
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
    <script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script>



        $().ready(function() {


            // validate signup form on keyup and submit
            $("#add_new_offer").validate({
                rules: {
                    name: "required",
                    description: "required"

                },
                messages: {
                    name: "Please enter name for Special Offer",
                    description: "Please enter a Decription"
                }
            });


        });
    </script>
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
                    "searchoffer/" + id,
                    null,
                    function(data) {
                        console.log(data);
                        $("#id").val(data[0]['id']);
                        $('#name').val(data[0]['name']);
                        $('#offer_code').val(data[0]['offer_code']);
                        $('#description').val(data[0]['description']);
                        $('#total_price').val(data[0]['total_price']);
                        $('#discount').val(data[0]['discount']);
                        $('#net_price').val(data[0]['net_price']);
                        var offer_status = data[0]['flag'];
                        if(offer_status == '1')
                            $("#optionsRadios1").prop('checked',true);
                        else
                            $("#optionsRadios2").prop('checked',true);

                    }
            );




        }
    </script>




@stop