@extends('clientMasterPage')

@section('css_ref')

@parent

    <!-- SPECIFIC CSS -->
    <link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">



@stop

@section('content')

    <script>


        function mySubmitFunction() {

            //someBug();

            alert("sad");
            return false;
        }



    </script>




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

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="row">

            <div class="col-md-9">

                @if($errors->any())
                    <ul class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif


                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel panel-default">
                    <div class="panel-heading">Your Selection</div>
                    <div class="panel-body">
                        <div id="message-contact">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="img_list">
                                        <a href="room_details.html"><img src="{{ $room->image }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="rooms_list_desc">
                                        <h3><strong>{{$room->name}}</strong></h3>
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Room Type</th>
                                            </tr>
                                            <tr>
                                                <td>{{ Session::get('checkIn') }}</td>
                                                <td>{{ Session::get('checkOut') }}</td>
                                                <td>{{ Session::get('roomTypeValue') }}</td>
                                            </tr>
                                        </table>

                                        <table class="table table-striped">
                                            <tr>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Discount</th>
                                                <th>Total</th>
                                            </tr>
                                            <tr>
                                                <td>$ {{ $room->price }}</td>
                                                <td>1</td>
                                                <td>$ 0.00</td>
                                                <td>$ {{ $room->price }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">Guest Details</div>
                    <div class="panel-body">
                        @if(!Auth::user())
                        <div class="row">
                            <div class="col-md-12">

                                    Already have an account? <a href="auth/login">Sign In</a> here.

                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="error_div" name="error_div" style="color: red">

                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <select class="form-control" id="title" name="title">
                                                <option>Mr.</option>
                                                <option>Mrs.</option>
                                                <option>Ms.</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-9">
                                        <div class="form-group">
                                            <label>First Name</label><label id="first_name_error_label" name="first_name_error_label"></label>
                                            @if( $u_logged_status == "success")
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ Session::get('u_name') }}">
                                            @else
                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    @if( $u_logged_status == "success")
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ Session::get('u_last_name') }}">
                                    @else
                                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    @if( $u_logged_status == "success")
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address"  value="{{ Session::get('u_address') }}">
                                    @else
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address"  value="{{ old('address') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control" id="country" name="country" >
                                        <option>Sri Lanka</option>
                                        <option>China</option>
                                        <option>Japan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    @if( $u_logged_status == "success")
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email"  value="{{ Session::get('u_email') }}">
                                    @else
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email"  value="{{ old('email') }}">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    @if( $u_logged_status == "success")
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ Session::get('u_phone') }}">
                                    @else
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone') }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" id="pcode" name="pcode" class="form-control" placeholder="Enter Postal Code" value="{{ old('pcode') }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">

                            </div>
                        </div>



                        <form name="form" id="form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                            <!-- Identify your business so that you can collect the payments. -->
                            <input type="hidden" name="business" value="sameerachandrasena-facilitator@gmail.com">

                            <!-- Specify a Buy Now button. -->
                            <input type="hidden" name="cmd" value="_xclick">

                            <!-- Specify details about the item that buyers will purchase. -->
                            <input type="hidden" name="item_name" value="{{$room->name}} + Service Charge">
                            <input type="hidden" name="amount" value="{{ $room->price + 10 }}">
                            <input type="hidden" name="currency_code" value="USD">


                            <input type="hidden" name="return" value="http://localhost:8888/payment_success_request" />
                            <input type="hidden" name="cancel_return" value="http://localhost:8888/payment_failed_request" />

                            <!-- Display the payment button. -->
                            {{--<input type="image" id="submit" name="submit" border="0" src="{{ asset('client/img/paypal.png') }}" alt="PayPal - The safer, easier way to pay online" width="155px">--}}
                            {{--<img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >--}}


                            <input type="submit" value="Check Out With Paypal" id="form_submit" name="form_submit" class="btn_1">
                        </form>


                    </div>

                </div>







                <br>


                <form method="post" action="reservationForm3Submit" id="reservationForm3" name="reservationForm3">

                    <div class="panel panel-default">
                        <div class="panel-heading">Direct Credit Card Payments (Optional)</div>
                        <div class="panel-body">
                            <div id="message-contact">
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Credit Card Number</label>
                                        <input type="text" class="form-control" id="credit_card_number" name="credit_card_number" placeholder="Enter Credit Card Number">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Name on Card</label>
                                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" placeholder="Enter Name on Card">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Card Type</label>
                                        <select class="form-control" id="credit_card_type" name="credit_card_type">
                                            <option value="0">Type</option>
                                            <option value="credit">Credit</option>
                                            <option value="visa">Visa</option>
                                            <option value="master">Master</option>
                                            <option value="global">Global</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label>Expiration Date</label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="expiration_month" name="expiration_month">
                                                        <option value="0">Month</option>
                                                        <option value="1">January</option>
                                                        <option value="2">February</option>
                                                        <option value="3">March</option>
                                                        <option value="4">April</option>
                                                        <option value="5">May</option>
                                                        <option value="6">June</option>
                                                        <option value="7">July</option>
                                                        <option value="8">August</option>
                                                        <option value="9">September</option>
                                                        <option value="10">October</option>
                                                        <option value="11">November</option>
                                                        <option value="12">December</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <select class="form-control" id="expiration_year" name="expiration_year">
                                                        <option value="0">Year</option>
                                                        <option value="2015">2015</option>
                                                        <option value="2016">2016</option>
                                                        <option value="2017">2017</option>
                                                        <option value="2018">2018</option>
                                                        <option value="2019">2019</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2024">2024</option>
                                                        <option value="2025">2025</option>
                                                        <option value="2026">2026</option>
                                                        <option value="2027">2027</option>
                                                        <option value="2028">2028</option>
                                                        <option value="2029">2029</option>
                                                        <option value="2030">2030</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row add_bottom_10">
                                <div class="col-md-6">
                                    <input type="submit" value="Confirm And Pay" class="btn_1" id="submit-contact">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>


                    {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Optional Information</div>--}}
                {{--<div class="panel-body">--}}
                {{--<div id="message-contact">--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-6">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-8 col-sm-8">--}}
                {{--<div class="form-group">--}}
                {{--<label>Arrival Flight</label>--}}
                {{--<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Arrival Flight Details">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-4">--}}
                {{--<div class="form-group">--}}
                {{--<label>Time</label>--}}
                {{--<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Arrival Time">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-6">--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-8 col-sm-8">--}}
                {{--<div class="form-group">--}}
                {{--<label>Departure Flight</label>--}}
                {{--<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Departure Flight Details">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 col-sm-4">--}}
                {{--<div class="form-group">--}}
                {{--<label>Time</label>--}}
                {{--<input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Departure Time">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<hr>--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-6 col-sm-6">--}}
                {{--<label>Bed Type (Subject to availability on arrival)</label>--}}
                {{--<div class="checkbox">--}}
                {{--<label>--}}
                {{--<input type="checkbox"> King bed--}}
                {{--</label>--}}
                {{--&nbsp;&nbsp;&nbsp;--}}
                {{--<label>--}}
                {{--<input type="checkbox"> Twin beds--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-6 col-sm-6">--}}
                {{--<label>Room Features (Subject to availability on arrival)</label>--}}
                {{--<div class="checkbox">--}}
                {{--<label>--}}
                {{--<input type="checkbox"> Non smoking room--}}
                {{--</label>--}}
                {{--&nbsp;&nbsp;&nbsp;--}}
                {{--<label>--}}
                {{--<input type="checkbox"> Smoking room--}}
                {{--</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<hr/>--}}
                {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                {{--<div class="form-group">--}}
                {{--<label>Special Requests:</label>--}}
                {{--<textarea id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:150px;"></textarea>--}}
                {{--<label>Amaya Reach Holiday Resort deliver on all special requests where possible and will inform the guest on arrival.</label>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<hr/>--}}
                {{--<label>--}}
                {{--<input type="checkbox"> Yes, I'd like to receive newsletter emails from Amaya Reach Holiday Resort.--}}
                {{--</label>--}}
                {{--<br>--}}
                {{--<br>--}}
                {{--<div class="row add_bottom_10">--}}
                {{--<div class="col-md-6">--}}
                {{--<input type="submit" value="Confirm Booking" class="btn_1" id="submit-contact">--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}








            </div>



            <div class="col-md-3">
                <div class="box_style_1" id="general_facilities">
                    <h3>General facilities</h3>
                    <ul>
                        <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
                        <li><i class="icon_set_2_icon-103"></i>Loundry service</li>
                        <li><i class="icon_set_2_icon-110"></i>Swimming pool</li>
                        <li><i class="icon_set_1_icon-58"></i>Restaurant</li>
                        <li><i class="icon_set_1_icon-27"></i>Parking</li>
                    </ul>
                    <p>
                        His <strong>civibus tacimates</strong> ex, an quo nominavi qualisque. In erant dissentiunt vel, dicit legimus docendi an nam. Te congue perfecto eos, aliquid corrumpit ea est, eam petentium repudiandae ad.
                    </p>
                </div>
                <div class=" box_style_2">
                    <i class="icon_set_1_icon-90"></i>
                    <h4>Need help? Call us</h4>
                    <a href="tel://004542344599" class="phone">+45 423 445 99</a>
                    <small>Monday to Friday 9.00am - 7.30pm</small>
                </div>
            </div>

        </div>
    </div>




@stop

@section('js_ref')
@parent
<script language="javascript" src="http://maps.google.com/maps/api/js?v=3.2&sensor=false"></script>


<!-- Specific scripts -->
<script src="{{asset('/client/js/quantity-bt.js')}}"></script>
<script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>
<script>$('input.date-pick').datepicker();</script>



<script>
    $('#form').submit(function() {

        var first_name = document.getElementById("first_name").value;
        var last_name = document.getElementById("last_name").value;
        var address = document.getElementById("address").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var pcode = document.getElementById("pcode").value;

        document.getElementById('error_div').innerHTML = "";

        var result = true;



        //validate First Name
        if (isEmpty(first_name)){
            document.getElementById('error_div').innerHTML += "* First Name can't be Empty...<br>";
            result = false;
        }
        else{
            if(!isAlphaOrParen(first_name)){
                document.getElementById('error_div').innerHTML += "* First Name can only contain Alphebatic characters...<br>";
                result = false;
            }
        }

        //validate Last Name
        if (isEmpty(last_name)){
            document.getElementById('error_div').innerHTML += "* Last Name can't be Empty...<br>";
            result = false;
        }
        else{
            if(!isAlphaOrParen(last_name)){
                document.getElementById('error_div').innerHTML += "* Last Name can only contain Alphebatic characters...<br>";
                result = false;
            }
        }


        //Validate Address
        if (isEmpty(address)){
            document.getElementById('error_div').innerHTML += "* Address can't be Empty...<br>";
            result = false;
        }

        //        else{
        //            if(isAlphaNumeric(address)){
        //                document.getElementById('error_div').innerHTML += "* Address can only contain AlphaNumeric characters...<br>";
        //                result = false;
        //            }
        //        }


        //Validate email
        if (isEmpty(email)){
            document.getElementById('error_div').innerHTML += "* Email can't be Empty...<br>";
            result = false;
        }
        else{
            if(!emailValidation(email)){
                document.getElementById('error_div').innerHTML += "* Invalid Email...<br>";
                result = false;
            }
        }


        //Validate Phone
        if (isEmpty(phone)){
            document.getElementById('error_div').innerHTML += "* Phone number can't be Empty...<br>";
            result = false;
        }
        else{
            if(!isNumber(phone)){
                document.getElementById('error_div').innerHTML += "* Invalid Phone number...<br>";
                result = false;
            }
            else{
                if(!isPhoneNumber(phone)){
                    document.getElementById('error_div').innerHTML += "* Phone number should only contain at 10 to 14 numbers...<br>";
                    result = false;
                }
            }
        }


        //Validate postal code
        if (isEmpty(pcode)){
            document.getElementById('error_div').innerHTML += "*Postal Code can't be Empty...<br>";
            result = false;
        }
        else{
            if(!isNumber(pcode)){
                document.getElementById('error_div').innerHTML += "* Invalid Postal Code...<br>";
                result = false;
            }
        }





        //Chack internet connnection....
        var online;
        // check whether this function works (online only)
        try {
            var x = google.maps.MapTypeId.TERRAIN;
            online = true;
        } catch (e) {
            online = false;
        }

        if(online == false){
            alert("Please make sure you have internet connection...");
            result = false;
        }


        return result;

    });



    function isEmpty(elemValue) {
        if(elemValue =="" || elemValue == null) {
            return true;
        } else
            return false;
    }

    function isAlphaOrParen(str) {
        return /^[a-zA-Z()]*$/.test(str);
    }

    function isAlphaNumeric(elemValue)
    {
        return /[^a-zA-Z0-9]/.test(elemValue)
    }

    function emailValidation(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function isNumber(value) {
        //return !isNaN(parseFloat(value)) && isFinite(value);
        return /^[0-9()]*$/.test(value);
    }

    function isPhoneNumber(number){
        if( number.length >= 10 && number.length <= 15){
            return true;
        }else{
            return false;
        }
    }


</script>

@stop