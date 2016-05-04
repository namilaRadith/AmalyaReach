@extends('clientMasterPage')
@section('css_ref')
@parent
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

    <div class="container padd_bottom_20">
        <div class="col-md-2 ">
            <div class="img_zoom" >
                <a href="room_details.html"><img src="{{asset('client/img/11.jpg')}}" alt="" class="img-responsive"></a>
            </div>
            <div class="img_zoom">
                <a href="room_details.html"><img src="{{asset('client/img/10.jpg')}}" alt="" class="img-responsive"></a>
            </div>
            <div class="img_zoom" >
                <a href="room_details.html"><img src="{{asset('client/img/11.jpg')}}" alt="" class="img-responsive"></a>
            </div>
            <div class="img_zoom" >
                <a href="room_details.html"><img src="{{asset('client/img/10.jpg')}}" alt="" class="img-responsive"></a>
            </div>
        </div>


        <div class="col-md-10">
            <div class="pg-hd">
                <div class="pg-hd-bdr">
                    <h1>Meetings</h1>
                </div>
            </div>
           <hr>
            <p>Amalya Resort takes care of all our business guests’ needs so that work and play feels seamless.
            <p>Amalya Resort takes care of all our business guests&rsquo; needs so that work and play feels seamless.  </p>
            <p>For meetings and events, a choice of stylish indoor and outdoor conference facilities are fully equipped and you can leave it to our experienced planner to take care of all the details that matter.  If you&rsquo;re looking to build team spirit and bonding, ask about our inspiring range of team building activities.  </p>
            <p>Celebrating a day well spent is effortless, with a cocktail reception and dinner of customised menus and great entertainment options.</p>
            <div class="clear"></div>
            <p></p>

            <div class="row">
                <div class="col-md-3 box_style_2" style="background-color: purple">
                   <h3 style="color:white">Seating</h3>
                   <h1 style="color:white">Capacities</h1>
                </div>
            <div class="col-md-9"  style=" border-left: solid grey;border-bottom: solid grey; border-top: solid grey;border-right:  solid grey">
              <div class="det-tbl2-icons">
                <div>&nbsp;</div>
                  <div class="col-md-2"></div>
                  <div class="col-md-10">
                      <img src="{{asset('client/img/meet-icons.gif')}}">
                  </div>
                  <hr>
              </div>
                <br>
               <hr>
                <div class="col-md-2 ">
                <p><B>Capacity</B></p>
                </div>
                <div class="col-md-9">
                    <p><B>Upto 85 Guests</B></p>
                </div>
            </div>
           </div>

          </div>

            <div class="col-md-2" >
            </div>
            <div class="col-md-10">
                    @if(Auth::user())
                     <a href="{{URL::to('meetingReservationForm')}}" class="btn_full btn" style="background-color: #4d536d;color: white" >Meeting Resrvation Form</a>
                    @endif
                        @if(!Auth::user())
                            <a href="auth/login" class="btn_full btn" style="background-color: #4d536d;color: white" >Meeting Resrvation Form</a>
                        @endif
          </div>

        </div>





@stop
