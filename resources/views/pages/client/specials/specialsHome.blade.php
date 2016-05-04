@extends('clientMasterPage')




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

    <div class="container margin_60 padd_bottom_20">
        <div class="main_title">
            <span></span>
            <h2>Make your reservation now!</h2>
            <p>
                Feel the excellence of our services.Make your reservation now.
            </p>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="box_home">
                    <i class=" icon_set_2_icon-107"></i>
                    <h3>Dinning</h3>
                    <p>
                        If you are looking for peace and tranquillity after days spent walking amongst the city streets or under the sun, the Hotel Amalya of Nice offers refreshments in its refined indoor rooms.
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_home">
                    <i class="icon_set_2_icon-108"></i>
                    <h3>Swimming pool</h3>
                    <p>
                        Constructed in the loft style and designed by the famous architecture methods, our Villa is distributed around a magnificent swimming pool in harmony with a beautiful garden
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box_home">
                    <i class=" icon_set_2_icon-105"></i>
                    <h3>Meetings</h3>
                    <p>
                        Your meetings are destined for success from the moment that you decide on Amalya resorts.We provide you with the space, service, personalized options and style to make any event a success.
                    </p>
                </div>
            </div>
        </div><!-- End row -->
    </div><!-- End container -->

    <div class="bg_gray add_bottom_60">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href="{{URL::to('dinningMenuDisplay')}}"><img src="{{asset('client/img/27.jpg')}}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Dinning</h3>
                    <p>
                        Hotel Amalya has a choice of surprising dining areas with their own personality where you can enjoy the finest gourmet experience in tasty specialities from traditional island cuisine, plus international and signature dishes
                    </p>
                    <p>
                        <a href="{{URL::to('dinningReservation')}}" class="btn_1">Book Now</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href=""><img src="{{asset('client/img/02.jpg')}}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Swimming pool</h3>
                    <p>
                        Make your stay in Amalya resorts a lifetime experience!  All our customers can enjoy the services and facilities at the Amalya swimming pool a location known for its water sports.
                    </p>
                    <p>
                        <a href="{{URL::to('pool')}}" class="btn_1">Book Now</a>
                    </p>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="img_zoom">
                        <a href=""><img src="{{asset('client/img/11.jpg')}}" alt="" class="img-responsive"></a>
                    </div>
                    <h3>Meetings</h3>
                    <p>
                        We provides meeting rooms, specially designed to the organisation of events and meetings.We provide a coordinator exclusively for the event who is completely dedicated to the group and a special activities program.
                    </p>
                    <p>
                        <a href="{{URL::to('meetingReservation')}}" class="btn_1">Book now</a>
                    </p>
                </div>
            </div><!-- End row -->
        </div><!-- End container -->
    </div>

@stop