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
       Create Special Offers
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




                <form role="form" id="add_new_offer" name="add_new_offer" action="{{action('AdminPromotions@add_special_promotions')}}" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Offer Name</label>
                                    <input type="text" class="form-control" id="name" name="name" >
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                            <label for="exampleInputPassword1">Total Price(USD)</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly="readonly" onchange="calculate_net_price()">
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Discount (%)</label>
                                    <input type="text" class="form-control" id="discount" name="discount" onchange="calculate_net_price()" onclick="calculate_net_price()">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Net Special offer Price (USD)</label>
                                    <input type="text" class="form-control" id="net_price" name="net_price" readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OfferCode</label>
                                    <input type="text" class="form-control" id="offer_code" name="offer_code" readonly="readonly" value="<?php echo $offerCode;?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered table-striped" id="additionalcosttabledone" style="border-style: dashed;border-color: gray;display: none" >
                        <tr style="height:50px">
                            <th>#</th>
                            <th style="color:slategrey">Room Type </th>
                            <th style="color:slategrey">Room Name</th>
                            <th style="color:slategrey">Room Price</th>
                            <th style="color:slategrey">Room Discount</th>
                            <th style="color:slategrey">Room Value</th>
                            <th style="color:red">Remove</th>
                        </tr>
                    </table>
                    <table class="table table-bordered table-striped" id="dinnningcosttabledone" style="border-style: dashed;border-color: gray" >
                        <tr style="height:50px">
                            <th>#</th>
                            <th style="color:slategrey">Dinning Item</th>
                            <th style="color:slategrey">Category</th>
                            <th style="color:slategrey">Price</th>
                            <th style="color:red">Remove</th>
                        </tr>
                    </table>
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
                                <th style="color:red">SELECT</th>
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
                                    <th style="color: #2b2b2b"><button type="button" onclick = "get_cust_details(<?php echo $rooms->id; ?>)" class="btn btn-primary"><i class="fa fa-pencil"></i>SELECT</button></th>
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
                            <th style="color:red">SELECT</th>
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
    <div class="row" id = "Dinning_list_veiw" style="display: none">
        <div class="col-md-12">
            <div class="col-xs-9">


                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Dinning List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="dinning_tbl" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th style="color:slategrey">#</th>
                                <th style="color:slategrey">Dinning Item</th>
                                <th style="color:slategrey">Category</th>
                                <th style="color:slategrey">Price</th>
                                <th style="color:red">SELECT</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=1; ?>
                            @foreach ($dinning_dump as $dinnings)
                                <tr>
                                    <th style="color: grey"><?php echo $a; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $dinnings->itemName; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $dinnings->foodCatagory; ?></th>
                                    <th style="color: #2b2b2b"><?php echo $dinnings->price; ?></th>
                                    <th style="color: #2b2b2b"><button type="button" onclick = "get_dinnings_details(<?php echo $dinnings->id; ?>)" class="btn btn-primary"><i class="fa fa-pencil"></i>SELECT</button></th>
                                </tr>
                                <?php $a++; ?>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <th style="color:slategrey">#</th>
                            <th style="color:slategrey">Dinning Item</th>
                            <th style="color:slategrey">Category</th>
                            <th style="color:slategrey">Price</th>
                            <th style="color:red">SELECT</th>
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





    @stop



    @section('js_ref')
    @parent

            <!-- DataTables -->
    <script src="{{ asset('/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script>



        $().ready(function() {


            // validate signup form on keyup and submit
            $("#add_new_offer").validate({
                rules: {
                    name: "required",
                    description: "required",
                    total_price:"required",
                    discount: {
                        required: true,
                        minlength: function () {
                            var discount = parseFloat($("#discount").val());
                            if(!isNaN(discount)){
                                if (discount < 0) {
                                    $("#discount").val('0');
                                }else {
                                    $("#discount").val(discount);
                                }
                            }
                        },
                        maxlength: function () {
                            var discount = parseFloat($("#discount").val());
                            if(!isNaN(discount)) {
                                if (discount > 100.0) {
                                    $("#discount").val('100');
                                } else {
                                    $("#discount").val(discount);
                                }
                            }
                        }

                    }
                },
                messages: {
                    name: "Please enter name for Special Offer",
                    description: "Please enter a Decription",
                    total_price:  "Please select Content for your offer",
                    discount: {
                        required: "Please provide a discount",
                        minlength: "Please enter correct discount 0-100",
                        maxlength: "Please enter correct discount 0-100"
                    }
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
        $(function () {
            $("#dinning_tbl").DataTable();

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
        var row_count = 1;
        var dinning_row_count = 1;
        function get_cust_details(id){

            $("#additionalcosttabledone").show();
                var offer_code  = $("#offer_code").val();
            $('html,body').animate({scrollTop: $("#additionalcosttabledone").offset().top}, 800);

            $.getJSON(
                    "searchroomdetails/?id=" + id + "&code="+ offer_code,
                    null,
                    function(data) {
                        console.log(data);



                            var discount = parseFloat(data[0]['discount']);
                            var price = parseFloat(data[0]['price']);
                            var net_price = price - discount;


                            var temp_total_price_room = parseFloat($("#total_price").val());
                            if(isNaN(temp_total_price_room)){

                                temp_total_price_room = 0;
                            }
                            temp_total_price_room += net_price;
                            $("#total_price").val(temp_total_price_room);


                            $('#additionalcosttabledone').append("<tr><td style='width:auto'>" + row_count + "</td><td>" + data[0]['value'] + "</td><td>" + data[0]['name'] + "</td><td>" + data[0]['price'] + "</td><td>" + data[0]['discount'] + "</td><td>" + net_price + "</td><td><button type='button' class='removebutton' onclick='deduct_price(" +net_price+ ","+ data['temp'] +")' title='Remove this row'><i  class='fa fa-minus-square fa-3x' style = 'color:red' ></i></button></td></tr>");
                        $('html,body').animate({scrollTop: $("#additionalcosttabledone").offset().top}, 800);
                        calculate_net_price();
                        row_count++;

                    }
            );

        }
        function get_dinnings_details(id){


            var offer_code  = $("#offer_code").val();
            $('html,body').animate({scrollTop: $("#additionalcosttabledone").offset().top}, 800);

            $.getJSON(
                    "searchdinningdetails/?id=" + id + "&code="+ offer_code,
                    null,
                    function(data) {
                        console.log(data);


                        var price = parseFloat(data[0]['price']);
                        var net_price = price;


                        var temp_total_price_room = parseFloat($("#total_price").val());
                        if(isNaN(temp_total_price_room)){

                            temp_total_price_room = 0;
                        }
                        temp_total_price_room += net_price;
                        $("#total_price").val(temp_total_price_room);


                        $('#dinnningcosttabledone').append("<tr><td style='width:auto'>" + dinning_row_count + "</td><td>" + data[0]['itemName'] + "</td><td>" + data[0]['foodCatagory'] + "</td><td>" + data[0]['price'] + "</td><td><button type='button' class='removebutton' onclick='deduct_price(" +net_price+ ","+ data['temp'] +")' title='Remove this row'><i  class='fa fa-minus-square fa-3x' style = 'color:red' ></i></button></td></tr>");
                        $('html,body').animate({scrollTop: $("#dinnningcosttabledone").offset().top}, 800);
                        calculate_net_price();
                        dinning_row_count++;

                    }
            );

        }
        function deduct_price(value,id){

            var temp_total_price_room = parseFloat($("#total_price").val());
            temp_total_price_room -= parseFloat(value);
            $("#total_price").val(temp_total_price_room);

            $.getJSON(
                    "removeroomdetails/" + id,
                    null,
                    function(data) {
                        console.log(data);

                    }
            );

        }

        function show_fields(){
            var select_option = $("#facility_select").val();

            if(select_option != '0') {
                if (select_option == '1')
                {
                    $("#Dinning_list_veiw").hide();
                    $("#accomodation_list_veiw").show();
                    $('html,body').animate({scrollTop: $("#accomodation_list_veiw").offset().top}, 800);
                }
                else if(select_option == '2'){
                    $("#accomodation_list_veiw").hide();
                    $("#Dinning_list_veiw").show();
                    $('html,body').animate({scrollTop: $("#Dinning_list_veiw").offset().top}, 800);
                }
            }
            else{
                $("#accomodation_list_veiw").hide();
            }
        }

        function calculate_net_price(){


            if(!isNaN($("#total_price").val()) && !isNaN($("#discount").val())){
                var temp_total_price_room = parseFloat($("#total_price").val());
                var discount_percentage = (100 - parseFloat($("#discount").val())) / 100.0;
                temp_total_price_room = temp_total_price_room * discount_percentage;
                if($("#discount").val() != '0.0'){
                    if (isNaN(temp_total_price_room)) {
                        $("#net_price").val('0');
                    }
                    else {
                        $("#net_price").val(temp_total_price_room);
                    }
                }else{

                    $("#net_price").val($("#total_price").val());
                }
                }
        }

        $(document).on('click', 'button.removebutton', function () {
            $(this).closest('tr').remove();
            calculate_net_price();
            row_count--;
            return false;
        });

    </script>



@stop