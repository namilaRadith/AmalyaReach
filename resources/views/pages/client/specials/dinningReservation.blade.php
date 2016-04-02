@extends('clientMasterPage')
@section('css_ref')
    @parent
    <link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">
    <link href="{{asset('/client/css/bootstrap-clockpicker.css ')}}" rel="stylesheet">
    <link href="{{asset('/client/css/bootstrap-clockpicker.min')}}" rel="stylesheet">


    <style>

        .ui-widget-overlay {
            display: none;
            position: fixed;
            top: 125px;
            left: 100px;
            right: 100px;

        }

        .popup-close {
            width: 30px;
            height: 30px;
            padding-top: 4px;
            position: absolute;
            top: 1px;
            right: 10px;
            transform: translate(50%, -50%);
            border-radius: 1000px;
            background: rgba(0, 0, 0, 0.8);
            font-family: Arial, Sans-Serif;
            font-size: 20px;
            text-align: center;
            line-height: 100%;
            color: #fff;
        }

        .ui-dialog .ui-dialog-titlebar {
            display: none;
        }

        h2 {
            position: absolute;
            top: 300px;
            left: 0;
            width: 100%;
        }

        h2 span {
            color: white;
            font: bold 24px/45px Helvetica, Sans-Serif;
            letter-spacing: -1px;
            background: rgb(0, 0, 0); /* fallback color */
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
        }


    </style>
@stop


@section('content')

    <div class="wrap">
        <section class="sub_header" id="bg_room">
            <div class="sub_header_content">
                <div class="animated fadeInDown">
                    <h1>All rooms</h1>

                    <p>
                        Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
                    </p>
                </div>
            </div>
        </section>


        <div class="container margin_60 padd_bottom_20">
            <h1 style="color: #500a6f;">Dinning</h1>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <p> At Amalya Resort you’re spoilt for choice with three dinnings, one bars and a terace.
                        Relax by the pool as refreshing drinks are handed to you on a lounger. Grab a light bite or tuck
                        into a feast in air conditioned comfort. Dine on a deck with a fresh sea breeze and open water
                        view. Chill out at sunset with tropical cocktails and live entertainment, or chat over bar
                        drinks with a Caribbean swing. From casual, fine dining and in-room privacy, to menus of
                        international favourites, Malay and Chinese specialties, enjoying what you want when you want is
                        what it’s all about.
                    </p>
                    <hr>
                </div>
            </div>
        </div>


        <div class="bg_gray add_bottom_60 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($dining as $dining )
                            <div class="col-md-4 col-sm-4 box_style_1">
                                <div class="box_style_1" style="background-color: #500a6f">
                                    <h3 style=" color:#f3f3f3"><B>{{$dining->title}}</B></h3>
                                </div>
                                <p>{{$dining->description}}</p>

                                <div class="img_zoom">
                                    <a href="{{URL::to('dinningMenuDisplay')}}"> <img
                                                src="{{asset('client/img/27.jpg')}}" alt="" class="img-responsive"></a>

                                    <h2><span>View Menu</span></h2></div>
                                <div class="col-md-15">
                                    @if(Auth::user())
                                        <input type="button" value="Make Reservation" class="btn_1 btn_full"
                                               id="{{$dining->id}}" name="{{$dining->title}}"
                                               onclick="popUpFunction(this)">
                                    @endif
                                </div>
                                <div class="col-md-15">
                                    @if(!Auth::user())
                                        <a href="auth/login" class="btn_1 btn_full">Book Now</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="resType" id="resTyp" name="{{$dining->title}}" style=" display: none"></div>
    </div>

    <div class=".ui-widget  ui-widget-overlay " id="dialog-form">
        <div class="panel panel-default">
            <form id="dinningRes" method="post" action="diningReservationSubmit" autocomplete="off">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-heading" style="background-color: #500a6f; color: white">Make a reservation at
                            Amalya Resorts
                        </div>

                        <input type="button" class="popup-close" id="btnClose" value="x">
                    </div>
                </div>
                <div class="panel-body">
                    <div id="message-contact">
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <img src="{{asset('client/img/personal_info_en.jpg')}}"/>
                            </div>
                            <hr>
                        </div>
                        <div class="col-md-6 col-sm-6" style=" border-left: solid grey;">
                            <div class="form-group">
                                <img src="{{asset('client/img/party_information_en.jpg')}}"/>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <select class="form-control" id="title" name="title">
                                            <option value="Mr">Mr.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Ms.">Ms.</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-9 col-sm-9">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname"
                                               placeholder="Enter First Name" value="{{ Session::get('userName') }}"
                                               readonly style="background-color: white">

                                        <div class="error alert-danger" id="errorFname"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6" style=" border-left: solid grey;">
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Booking Date</label>
                                            <input class="date-pick form-control" type="text" id="bookingDate"
                                                   name="bookingDate" placeholder="Date">
                                        <span class="input-icon">
                                            <i class=" icon-calendar"></i>
                                        </span>

                                            <div class="error alert-danger" id="errorDate"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Booking Time</label>
                                            <div class="input-group clockpicker">
                                                    <input type="text" class="form-control" value="09:30 PM" id="bookingTime" name="bookingTime">
                                                           <span class="input-group-addon">
                                                           <span class="glyphicon glyphicon-time"></span>
                                                          </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                       placeholder="Enter Last Name" value="{{ Session::get('latsName') }}" readonly
                                       style="background-color: white">
                                <!-- <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name"> -->
                                <div class="error alert-danger" id="errorLname"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6" style=" border-left: solid grey;">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Adults</label>

                                        <div class="qty-buttons">
                                            <input type="button" value="-" class="qtyminus" name="adults">
                                            <input type="text" name="adults" id="adults" class="qty form-control"
                                                   placeholder="2" value="1" readonly style="background-color: white">
                                            <input type="button" value="+" class="qtyplus" name="adults">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Children</label>

                                        <div class="qty-buttons">
                                            <input type="button" value="-" class="qtyminus" name="children">
                                            <input type="text" name="children" id="children" class="qty form-control"
                                                   placeholder="0" value="0" readonly style="background-color: white">
                                            <input type="button" value="+" class="qtyplus" name="children">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       placeholder="Enter Email" value="{{ Session::get('userEmail') }}" readonly
                                       style="background-color: white">

                                <div class="error alert-danger" id="errorEmail"></div>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6" style=" border-left: solid grey;">
                            <div class="form-group">
                                <label>Additional Information</label>
                                <textarea cols="50" rows="2" id="addInfo" name="addInfo"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                       placeholder="Enter phone number" value="{{ Session::get('userPhone') }}" readonly
                                       style="background-color: white">

                                <div class="error alert-danger" id="errorPhone"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6" style=" border-left: solid grey;">
                            <div class="form-group">
                                <input type="button" id="btnFormSubmit" class="btn_full"
                                       style="background-color: #500a6f;color: white" value="Make Reservation"
                                       onclick="formValidate()">
                            </div>
                        </div>
                    </div>
                    <input type="text" id="resType" name="resType" style="display: none">
                </div>
            </form>
        </div>
    </div>
    <div class="wrap"></div>

    <!--Reservation sucessfull pop up-->
    <div class=".ui-widget  ui-widget-overlay " id="sucessMsgPopUp">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading" style="background-color: #500a6f; color: white"> Amalya Resorts</div>

                    <input type="button" class="popup-close" id="btnSucessMsgClose" value="x">
                </div>
                <div class="panel-body col-md-12">
                    <div class="row">
                        <div class="col-md-12"></div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <h5>Thank you for making a reservation. We will contact you shortly to confirm the date and
                                time you wish to dine with us.</h5>

                            <div class="col-md-12"></div>
                            <div class="col-md-12"></div>
                            <div class="col-md-12"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@stop
@section('js_ref')
    @parent



    <script src="{{asset('/client/js/quantity-bt.js')}}"></script>
    <script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>

    <!--Script for time Picker-->
    <script src="{{asset('/admin/plugins/timepicker/bootstrap-timepicker.js')}}"></script>




    <!--Script for date Picker -->
    <script>
        // set default dates
        var start = new Date();
        // set end date to max one year period:
        var end = new Date(new Date().setYear(start.getFullYear() + 1));


        $('#bookingDate').datepicker({
            startDate: start,
            endDate: end
        });

    </script>

    <!-- --Scripts for pop ups-- -->
    {{--<script src="{{asset('/client/js/jquery-1.11.2.min.js')}}"></script>--}}
    <script src="{{asset('/client/js/jquery-ui.min.js')}}"></script>

    <script src="{{asset('/client/js/jquery-clockpicker.min.css')}}"></script>
    <script src="{{asset('/admin/plugins/clockpicker/bootstrap-clockpicker.min.js')}}"></script>

    <script>
        function popUpFunction(val) {
            var id = $(val).attr('id');
            var resType = $(val).attr('name');
            var form;

            $(function () {
                var dialog, form,

                        dialog = $("#dialog-form").dialog({
                            autoOpen: false,
                            modal: true,

                        });


                $("#" + id).button().on("click", function () {
                    dialog.dialog("open");
                    $(".wrap").css({
                        overflow: 'hidden',
                        opacity: .3,

                    });

                    //Getting the Reservation Location Type
                    $('#resType').val(resType);


                    $("body").css({
                        backgroundColor: 'rgb(0,0,0)'

                    });

                });

                $("#btnClose").button().on("click", function () {
                    dialog.dialog("close");
                    $(".error").text("");
                    $("#dinningRes").find('textarea').val('');
                    $(".wrap").css({
                        opacity: 1
                    });

                    $("body").css({
                        backgroundColor: ''

                    });

                });

            });

        }

        //Form validation
        function formValidate() {
            $("#btnFormSubmit").button().on("click", function () {
                var fname = $("#fname").val();
                var lname = $("#lastName").val();
                var email = $("#email").val();
                var phone = $("#phone").val();
                var date = $("#bookingDate").val();

                validateReservationForm();

                //validate reservation form
                function validateReservationForm() {
                    var validFirstname = validateName("errorFname", fname, "First name")
                    var validLastName = validateName("errorLname", lname, "Last name")
                    var validEmail = validateEmail("errorEmail", email, "Email");
                    var validPhone = validatePhone("errorPhone", phone, "Contact Number")
                    var validDineDate = validateDineDate("errorDate", date);
                    if (validFirstname && validLastName && validEmail && validPhone && validDineDate) {

                        $(function () {
                            var dialog,

                                    dialog = $("#sucessMsgPopUp").dialog({
                                        autoOpen: false,
                                        modal: true,

                                    });

                            $("#btnFormSubmit").button().on("click", function () {
                                dialog.dialog("open");

                                $('#dialog-form').dialog("close");

                            });

                            $("#btnSucessMsgClose").button().on("click", function () {
                                $('#dinningRes').submit();
                                dialog.dialog("close");

                            });

                        });

                    }

                }

                //Validate empty fields
                function isEmpty(errorCls, val, field) {
                    if (val == "") {
                        $("#" + errorCls).text(field + " field cannot be empty!");
                        return true;
                    }
                    else {
                        $("#" + errorCls).text("");
                        return false;
                    }

                }

                //validate name
                function validateName(errorCls, val, field) {
                    if (!isEmpty(errorCls, val, field)) {
                        var nameExp = /^[a-z]+$/i;
                        if (!(nameExp.test(val))) {
                            $("#" + errorCls).text(field + " field may only consist of letters, spaces and must begin with a letter. ");
                            return false;
                        }
                        else {
                            $("#" + errorCls).text("");
                            return true;
                        }
                    }
                }


                //validate email
                function validateEmail(errorCls, val, field) {
                    if (!isEmpty(errorCls, val, field)) {
                        var nameExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                        if (!(nameExp.test(val))) {
                            $("#" + errorCls).text("Please enter a valid email address");

                        }
                        else {
                            $("#" + errorCls).text("");
                            return true;
                        }
                    }
                }

                //validate phone
                function validatePhone(errorCls, val, field) {
                    if (!isEmpty(errorCls, val, field)) {
                        var nameExp = /^[0-9]{12}$/;
                        if (!(nameExp.test(val))) {
                            $("#" + errorCls).text("Please enter a valid phone number");
                            return false;

                        }
                        else {
                            $("#" + errorCls).text("");
                            return true;
                        }
                    }
                }


                //validate dine date
                function validateDineDate(errorCls, val) {
                    if (val == "") {
                        $("#" + errorCls).text("Please select a date for the reservation");
                        return false;
                    }
                    else {
                        $("#" + errorCls).text("");
                        return true;
                    }
                }


            });
        }

    </script>

    <script type="text/javascript">
        $('.clockpicker').clockpicker({
            placement: 'top',
            align: 'left',
            donetext: 'Done'
        });
    </script>


@stop
