@extends('client_master_page')

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



<!--
Hello
-->

    <div class="container margin_60">
        <div class="row">

            <div class="col-lg-9 col-md-8">



                <div class="strip_all_rooms_list wow fadeIn" data-wow-delay="0.3s">

                </div>




                <div id="roomList">
                    <h3>Section 1</h3>
                    <div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="img_list">
                                    <a href="room_details.html"><img src="{{ asset('client/sampleImages/room3.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="clearfix visible-xs-block">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="rooms_list_desc">
                                    <h3><strong>Single</strong> room</h3>
                                    <p>
                                        Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit....
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
                                        <sup>$</sup>89*<span class="normal_price_list">$99</span><small>*Pax/Per night</small>
                                        <p>
                                            <a href="room_details.html" class="btn_1">Select</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Section 2</h3>
                    <div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="img_list">
                                        <a href="room_details.html"><img src="{{ asset('client/sampleImages/room2.jpg') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="clearfix visible-xs-block">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="rooms_list_desc">
                                        <h3><strong>Double</strong> room</h3>
                                        <p>
                                            Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit....
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
                                            <sup>$</sup>89*<span class="normal_price_list">$99</span><small>*Pax/Per night</small>
                                            <p>
                                                <a href="room_details.html" class="btn_1">Select</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <h3>Section 3</h3>
                    <div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="img_list">
                                    <a href="room_details.html"><img src="{{ asset('client/sampleImages/room1.jpg') }}" alt=""></a>
                                </div>
                            </div>
                            <div class="clearfix visible-xs-block">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="rooms_list_desc">
                                    <h3><strong>King double</strong> room</h3>
                                    <p>
                                        Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit....
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
                                        <sup>$</sup>89*<span class="normal_price_list">$99</span><small>*Pax/Per night</small>
                                        <p>
                                            <a href="room_details.html" class="btn_1">Select</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Section 4</h3>
                    <div>
                        <p>
                            Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                            et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                            faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                            mauris vel est.
                        </p>
                        <p>
                            Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                            inceptos himenaeos.
                        </p>
                    </div>
                </div>




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
            $( "#roomList" ).accordion({
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