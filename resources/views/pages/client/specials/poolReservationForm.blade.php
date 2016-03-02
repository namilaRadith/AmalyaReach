@extends('clientMasterPage')

@section('css_ref')



        <!-- SPECIFIC CSS -->
<link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">



@section('content')

        <script>
           function suncessfull()
           {
               alert('Reservation made sucessfully');

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

            <form method="post" action="poolFormSubmit" id="poolReservationForm"><input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel panel-default">
                    <div class="panel-heading">Your Selection</div>
                    <div class="panel-body">
                        <div id="message-contact">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="img_list">
                                        <a href="room_details.html"><img src="{{ asset('client/img/02.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="res_details">
                                        <h3><strong>Reservation Details</strong></h3>
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Event Type</th>
                                            </tr>
                                            <tr>
                                                <td>{{ Session::get('startData_pool') }}</td>
                                                <td>{{ Session::get('endDate_pool') }}</td>
                                                <td>{{ Session::get('activity_type') }}</td>
                                            </tr>
                                        </table>

                                        <table class="table table-striped">
                                            <tr>
                                                <th>Start Time</th>
                                                <th>End Time</th>
                                                <th>Total Price</th>
                                            </tr>
                                            <tr>
                                                <td>{{Session::get('start_time')}}</td>
                                                <td>{{Session::get('end_time')}}</td>
                                                <td>{{$price}}$</td>
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
                                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
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
                    </div>
                </div>


                <div class="panel panel-default">
                    <div class="panel-heading">Optional Information</div>
                    <div class="panel-body">
                        <div id="message-contact">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Special Requests:</label>
                                    <textarea id="specialReq" name="specialReq" class="form-control" placeholder="Write your message" style="height:150px;"></textarea>
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
<!--                            <div class="col-md-4">
                                <input type="submit" value="Confirm Booking" class="btn_1" id="submit-contact" onclick="suncessfull()">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-md-3">
            <div class="box_style_1">
                <h2>Contacts</h2>
                <h5>Address</h5>
                <p> 556, Moragahahena Road,Pitipana North,Homagama<br>Sri lanka 10200</p>
                <h5>Telephone</h5>
                <p><a href="tel://0094114404040">+94 114404040</a> / <a href="tel://0094114368291">+94 114368291</a> / <a href="tel://0094777743612">+94 777743612</a></p>
                <h5>Tele/Fax</h5>
                <p><a href="tel://0094112748913">+94 112748913</a></p>
                <h5>Email</h5>
                <p><a href="mailto:amalyareach@yahoo.com">amalyareach@yahoo.com</a></p>
                <p>Located on a place so Nice, a short distance from the famous Kalutara town, Hotel Amalya is one of the best hotels able to satisfy the different needs of its guests with comfort and first rate services.</p>
            </div>
            <div class=" box_style_2">
                <i class="icon_set_1_icon-90"></i>
                <h4>Need help? Call us</h4>
                <a href="tel://0094114404040" class="phone">+94 1144040430</a>
            </div>

        </div>

    </div>
    <div class="col-md-4">
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="sameerachandrasena-facilitator@gmail.com">

            <!-- Specify a Buy Now button. -->
            <input type="hidden" name="cmd" value="_xclick">

            <!-- Specify details about the item that buyers will purchase. -->
            <input type="hidden" name="item_name" value="Swimming Pool Reservation at Amalya Kalutara">
            <!-- Total amount comes here -->
            <input type="hidden" name="amount" value="{{$price}}">
            <input type="hidden" name="currency_code" value="USD">

            <input type="hidden" name="return" value="success" />
            <input type="hidden" name="cancel_return" value="{{URL::to('pool')}}" />

            <!-- Display the payment button. -->
            <input type="image" name="submit" border="0" src="{{ asset('client/img/payypal.png') }}" alt="PayPal - The safer, easier way to pay online" width="155px">
            <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

        </form>
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