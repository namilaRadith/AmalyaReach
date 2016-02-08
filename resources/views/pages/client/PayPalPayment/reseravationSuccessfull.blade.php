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
            <form method="post" action="reservationForm3Submit" id="reservationForm3">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-9">

                    <div class="panel panel-default">
                        <div class="panel-heading">Payment Details</div>
                        <div class="panel-body">
                            <div id="message-contact">
                                <div class="row">
                                    <div class="col-md-12">

                                            <h3><strong>Payement Successfull !!!</strong></h3>
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Payment ID</th>
                                                    <td>{{$pid}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Type</th>
                                                    <td>Visa</td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td>{{ $date }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>Success</td>
                                                </tr>
                                                <tr>
                                                    <th>Unit Price</th>
                                                    <td>{{ $room->price }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Quantity</th>
                                                    <td>x1</td>
                                                </tr>
                                                <tr>
                                                    <th>Service Charges</th>
                                                    <td>10.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Discount</th>
                                                    <td>0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Total</th>
                                                    <td>{{ $room->price + 10.00 }}</td>
                                                </tr>
                                            </table>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">Order Summary</div>
                        <div class="panel-body">
                            <div id="message-contact">
                                <div class="row">
                                    <div class="col-md-12">
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Check In</th>
                                                    <th>Check Out</th>
                                                    <th>Room Type</th>
                                                    <th>No of Adults</th>
                                                    <th>No of Children</th>
                                                </tr>
                                                <tr>
                                                    <td>{{ Session::get('checkIn') }}</td>
                                                    <td>{{ Session::get('checkOut') }}</td>
                                                    <td>{{ Session::get('roomTypeValue') }}</td>
                                                    <td>{{ Session::get('adults') }}</td>
                                                    <td>{{ Session::get('children') }}</td>
                                                </tr>
                                            </table>


                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

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