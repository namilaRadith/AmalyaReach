@extends('clientMasterPage')

@section('css_ref')

@parent

    <!-- SPECIFIC CSS -->
    <link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">

@stop

@section('content')

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

                    <form method="post" action="reservationForm3Submit" id="reservationForm3" name="reservationForm3">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="panel panel-default">
                            <div class="panel-heading">Your Selection</div>
                            <div class="panel-body">
                                <div id="message-contact">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="img_list">
                                                <a href="room_details.html"><img src="{{ asset('client/sampleImages/room3.jpg') }}" alt=""></a>
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
                                                        <th>Total (Rs.)</th>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ $room->price }}</td>
                                                        <td>1</td>
                                                        <td>0.00</td>
                                                        <td>{{ $room->price }}</td>
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
                                <div id="message-contact">
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        Already have an account? <a href="loginn">Sign In</a> here.
                                    </div>
                                </div>

                                <br/>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <select class="form-control" id="title" name="title" >
                                                        <option>Mr.</option>
                                                        <option>Mrs.</option>
                                                        <option>Ms.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-sm-9">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
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
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Postal Code</label>
                                            <input type="text" id="pcode" name="pcode" class="form-control" placeholder="Enter Postal Code">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Payment Details</div>
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
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Optional Information</div>
                            <div class="panel-body">
                                <div id="message-contact">
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <label>Arrival Flight</label>
                                                    <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Arrival Flight Details">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <label>Time</label>
                                                    <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Arrival Time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8">
                                                <div class="form-group">
                                                    <label>Departure Flight</label>
                                                    <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Departure Flight Details">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <div class="form-group">
                                                    <label>Time</label>
                                                    <input type="text" class="form-control" id="name_contact" name="name_contact" placeholder="Departure Time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <label>Bed Type (Subject to availability on arrival)</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> King bed
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox"> Twin beds
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <label>Room Features (Subject to availability on arrival)</label>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Non smoking room
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox"> Smoking room
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Special Requests:</label>
                                            <textarea id="message_contact" name="message_contact" class="form-control" placeholder="Write your message" style="height:150px;"></textarea>
                                            <label>Amaya Reach Holiday Resort deliver on all special requests where possible and will inform the guest on arrival.</label>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <label>
                                    <input type="checkbox"> Yes, I'd like to receive newsletter emails from Amaya Reach Holiday Resort.
                                </label>
                                <br>
                                <br>
                                <div class="row add_bottom_10">
                                    <div class="col-md-6">
                                        <input type="submit" value="Confirm Booking" class="btn_1" id="submit-contact">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                        <!-- Identify your business so that you can collect the payments. -->
                        <input type="hidden" name="business" value="sameerachandrasena-facilitator@gmail.com">

                        <!-- Specify a Buy Now button. -->
                        <input type="hidden" name="cmd" value="_xclick">

                        <!-- Specify details about the item that buyers will purchase. -->
                        <input type="hidden" name="item_name" value="{{$room->name}} + Service Charge">
                        <input type="hidden" name="amount" value="{{ $room->price + 10 }}">
                        <input type="hidden" name="currency_code" value="USD">


                        <input type="hidden" name="return" value="success" />
                        <input type="hidden" name="cancel_return" value="cancel" />

                        <!-- Display the payment button. -->
                        <input type="image" name="submit" border="0" src="{{ asset('client/img/paypal.png') }}" alt="PayPal - The safer, easier way to pay online" width="155px">
                        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

                    </form>

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

    <!-- Specific scripts -->
    <script src="{{asset('/client/js/quantity-bt.js')}}"></script>
    <script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>
    <script>$('input.date-pick').datepicker();</script>

@stop