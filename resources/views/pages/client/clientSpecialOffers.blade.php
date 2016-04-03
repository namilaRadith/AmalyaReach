<?php
/**
 * Created by PhpStorm.
 * User: DeAlwis
 * Date: 1/30/2016
 * Time: 11:02 PM
 */
?>
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
    </div><!-- End Position -->

    <div class="container margin_60">
        <div class="row">

    <div class="col-lg-9 col-md-8">

            @foreach($offer as $offers)
                <?php {?> <label ><h3 style="color:purple;">{{$offers->name}}</h3></label> - <label ><h3 style="color:purple;">{{$offers->discount}}%</h3></label>



                <div class="strip_all_rooms_list wow fadeIn" data-wow-delay="0.3s">

                </div>

                <div class="roomList">
                    @foreach($rooms as $room)
                        <?php if($offers->offer_code == $room->offer_id ){ ?>
                        <h3>{{ $room->name }}</h3>
                        <div>
                            <div class="row">
                                <form name="roomSelectForm" id="" action="selectRoomFormReservation" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="img_list">
                                            <a href="room_details.html"><img src="{{ asset('client/sampleImages/room3.jpg') }}" alt=""></a>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{ $room->id }}" id="selected_room_id" name="selected_room_id" />
                                    <div class="clearfix visible-xs-block">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="rooms_list_desc">
                                            <h3><strong> {{ $room->value  }}</strong></h3>
                                            <p>
                                                {{ $room->description  }}
                                            </p>
                                            <ul class="add_info">
                                                <li>
                                                    <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Plasma TV with cable channels"><i class="icon_set_2_icon-116"></i></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Breakfast included"><i class="icon_set_1_icon-59"></i></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="King size bed"><i class="icon_set_2_icon-104"></i></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="Shower"><i class="icon_set_2_icon-118"></i></a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0);" class="tooltip-1" data-placement="top" title="No smoking"><i class="icon_set_1_icon-47"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2">
                                        <div class="price_list">
                                            <div>
                                                <sup>$</sup>{{($room->price - $room->discount)}}<span class="normal_price_list">{{$room->price}}</span><small>*Pax/Per night</small>
                                                <small>
                                                    {{--<input type="submit" value="Select" class="btn_1" id="submit-contact">--}}
                                                </small>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                            <?php } ?>
                    @endforeach
                </div>






                    <?php } ?>
            @endforeach

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
                    <img src="{{asset('/client/img/Forbes-Magazine-Logo-Font.jpg')}}" style="width: 100px"></img>
                    <h4>10 coolest places to visit 2015:
                        </h4>

                    <small>The Forbes magazine announced its top ten countries to visit in 2015 and yes, the island of Sri Lanka is on the list. Golden sandy beaches, incredible ancient cities and lots more are there but Forbes says the main draw is Sri Lanka's wildlife.</small>
                </div>
            </div><!-- End col-lg-3 -->




        </div><!-- End row -->
    </div>



    @stop
    @section('js_ref')
    @parent



            <!-- This Jquery Part is used for JQuery Accordion -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function() {
            $( ".roomList" ).accordion({
                event: "click hoverintent"
            });
        });

        $.event.special.hoverintent = {
            setup: function() {
                $( this ).bind( "mouseover", jQuery.event.special.hoverintent.handler );
            },
            teardown: function() {
                $( this ).unbind( "mouseover", jQuery.event.special.hoverintent.handler );
            },
            handler: function( event ) {
                var currentX, currentY, timeout,
                        args = arguments,
                        target = $( event.target ),
                        previousX = event.pageX,
                        previousY = event.pageY;

                function track( event ) {
                    currentX = event.pageX;
                    currentY = event.pageY;
                };

                function clear() {
                    target
                            .unbind( "mousemove", track )
                            .unbind( "mouseout", clear );
                    clearTimeout( timeout );
                }

                function handler() {
                    var prop,
                            orig = event;

                    if ( ( Math.abs( previousX - currentX ) +
                            Math.abs( previousY - currentY ) ) < 7 ) {
                        clear();

                        event = $.Event( "hoverintent" );
                        for ( prop in orig ) {
                            if ( !( prop in event ) ) {
                                event[ prop ] = orig[ prop ];
                            }
                        }
                        // Prevent accessing the original event since the new event
                        // is fired asynchronously and the old event is no longer
                        // usable (#6028)
                        delete event.originalEvent;

                        target.trigger( event );
                    } else {
                        previousX = currentX;
                        previousY = currentY;
                        timeout = setTimeout( handler, 100 );
                    }
                }

                timeout = setTimeout( handler, 100 );
                target.bind({
                    mousemove: track,
                    mouseout: clear
                });
            }
        };
    </script>




    <!-- Specific scripts -->
    <script src="{{asset('/client/js/quantity-bt.js')}}"></script>
    <script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>
    <script>$('input.date-pick').datepicker();</script>
@stop