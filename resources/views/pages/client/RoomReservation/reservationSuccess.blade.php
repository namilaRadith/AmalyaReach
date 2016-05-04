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
                <h1>Reservation Successful</h1>
                <p>

                </p>
            </div>
        </div>
    </section>

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li>Reservation Success</li>
            </ul>
        </div>
    </div><!-- End Position -->

    <div class="container margin_60">
        <div class="row">

            <div class="col-lg-9 col-md-8">
                <h2>Reservation Successful</h2>
                <br>
                <h5>Thank you for your reservation. You will get a confirmation email shortly. We will contact you as soon as possible.</h5>
                <br>
                <table class="table table-striped">
                    <tr>
                        <th>Customer Name</th>
                        <th>Room Type</th>
                        <th>Check In</th>
                        <th>Check Out</th>
                    </tr>
                    <tr>
                        <td>{{$customer_name}}</td>
                        <td>{{$room_type}}</td>
                        <td>{{$checkIn}}</td>
                        <td>{{$checkOut}}</td>
                    </tr>
                </table>

            </div>



            <div class="col-lg-3 col-md-4">
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
            </div><!-- End col-lg-3 -->




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