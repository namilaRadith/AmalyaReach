@extends('clientMasterPage')

@section('css_ref')
@parent
        <!-- SPECIFIC CSS -->
<link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">

@stop


@section('content')


    <script>
        function updateTextInput(val) {
            document.getElementById('textInput').value=val;
        }

        function myFunction(){
            document.getElementById("check_availability").submit();
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
                <li>pool Reservation</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="row">
            <div class="col-md-8" id="single_tour_desc">
                <h3>Capacity: 80 Guets<span class="price_home">$90<em>Per day</em></span></h3>
                <div id="Img_carousel" class="slider-pro">
                    <div class="sp-slides">
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/03.jpg')}}"
                                 data-src="{{asset('client/img/03.jpg')}}"
                                 data-small="{{asset('client/img/03.jpg')}}"
                                 data-medium="{{asset('client/img/03.jpg')}}"
                                 data-large="{{asset('client/img/03.jpg')}}"
                                 data-retina="{{asset('client/img/03.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                        <div class="sp-slide">
                            <img alt="" class="sp-image" src="{{asset('client/img/02.jpg')}}"
                                 data-src="{{asset('client/img/02.jpg')}}"
                                 data-small="{{asset('client/img/02.jpg')}}"
                                 data-medium="{{asset('client/img/02.jpg')}}"
                                 data-large="{{asset('client/img/02.jpg')}}"
                                 data-retina="{{asset('client/img/02.jpg')}}">
                        </div>
                    </div>
                    <div class="sp-thumbnails">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                        <img alt="" class="sp-thumbnail" src="{{asset('client/img/02.jpg')}}">
                    </div>
                </div>
            </div>


            <div class="col-md-4" id="availabilityForm">
                <center><B><h2 style="color: #500a6f">Check Availability</h2></B></center>
                <div id="book" style="color: #f3f3f3;">
                    <form id="check_availability" name="check_availability" action="poolReservation" method="POST" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    <input  class="date-pick form-control" id="start_date" type="text" name="start_date" placeholder="Start Date" >
                                    <span class="input-icon"><i class=" icon-calendar"></i></span>
                                </div>
                                <div class="error alert-danger " >{{ $errors->first('start_date') }}</div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>End Date</label>
                                    <input class="date-pick form-control"  type="text" id="end_date" name="end_date" placeholder="End Date">
                                    <span class="input-icon"><i class="icon-calendar"></i></span>
                                </div>
                                <div class="error alert-danger">{{ $errors->first('end_date') }}</div>
                            </div>
                        </div><!-- End row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Event type</label>
                                    <select class="form-control" name="activity_type" id="activity_type" >
                                        <option value="">Activity Type</option>
                                        <option value="Sports-Adult">Sports - Adult</option>
                                        <option value="Sports-Elementary">Sports - Elementary</option>
                                        <option value="Sports-MiddleSchool">Sports - Middle School</option>
                                        <option value="Volunteer-Program">Volunteer Program</option>
                                        <option value="Social-Activity">Social Activity</option>
                                        <option value="Aquatics/Swim_Group Lessons">Aquatics/Swim - Group Lessons</option>
                                        <option value="Arts-Enrichment">Arts & Enrichment</option>
                                        <option value="Camps">Camps</option>\
                                        <option value="Childcare">Childcare  </option>
                                        <option value="Fitness">Fitness  </option>
                                        <option value="Wellness">Wellness</option>
                                    </select>
                                </div>
                                <div class="error alert-danger">{{ $errors->first('activity_type') }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Start Time</label>
                                    <input type="text" id="start_time" name="start_time" placeholder="h:mm PM" data-default-time="true">
                                </div>
                                <div class="error alert-danger " >{{ $errors->first('event_time') }}</div>
                            </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input type="text" id="end_time" name="end_time" class="timepicker" placeholder="h:mm PM" data-default-time="false">
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Age Group</label>
                                    <select class="form-control" name="age_group" id="age_group" >
                                        <option value="">Age Group</option>
                                        <option value="Sports_Adult">Sports - Adult</option>
                                        <option value="Sports_Elementary">Sports - Elementary</option>
                                        <option value="Sports_MiddleSchool">Sports - Middle School</option>
                                    </select>
                                </div>
                                <div class="error alert-danger">{{ $errors->first('age_group') }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label for="points">Age Range:</label>
                                <input type="range" min="0" max="100" value="0" onchange="updateTextInput(this.value)">
                            </div>
                            <div class="col-md-4">
                                </br>
                                <input type="text" id="textInput" value="" class="form-control" id="ageRange" name="ageRange">
                            </div>
                        </div>
                        <br/>
                        <div class="error alert-danger">{{ $errors->first('ageRange') }}</div>
                        <div class="row">
                            <div class="col-md-12">
                                </br>
                                <input type="button" value="Check Availability" class="btn_full" id="checkAvailability" onclick="myFunction()">
                            </div>
                        </div>
                        <br/>
                    </form>
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
    <!-- SPECIFIC CSS -->
    <link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">


    <!-- Common scripts -->
    <script src="{{asset('client/js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{asset('client/js/common_scripts_min.js') }}"></script>
    <script src="{{asset('client/js/functions.js') }}"></script>
    <script src="{{asset('client/assets/validate.js') }}"></script>


    <!-- Specific scripts -->
    <script src="{{asset('client/js/jquery.sliderPro.min.js') }}"></script>
    <script type="text/javascript">
        $( document ).ready(function( $ ) {
            $( '#Img_carousel' ).sliderPro({
                width: 960,
                height: 500,
                fade: true,
                arrows: true,
                buttons: false,
                fullScreen: false,
                smallSize: 500,
                startSlide: 0,
                mediumSize: 1000,
                largeSize: 3000,
                thumbnailArrows: true,
                autoplay: false
            });
        });
    </script>




    @stop

    @section('js_ref')
    @parent
            <!-- Specific scripts -->
    <script src="{{asset('/client/js/quantity-bt.js')}}"></script>
    <script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>

    //Script for date Picker
    <script>
        // set default dates
        var start = new Date();
        // set end date to max one year period:
        var end = new Date(new Date().setYear(start.getFullYear()+1));

        $('#start_date').datepicker({
        startDate : start,
        endDate   : end
        // update "toDate" defaults whenever "fromDate" changes
        }).on('changeDate', function(){
        // set the "toDate" start to not be later than "fromDate" ends:
        $('#end_date').datepicker('setStartDate', new Date($(this).val()));
        });

        $('#end_date').datepicker({
        startDate : start,
        endDate   : end
        // update "fromDate" defaults whenever "toDate" changes
        }).on('changeDate', function(){
        // set the "fromDate" end to not be later than "toDate" starts:
        $('#start_date').datepicker('setEndDate', new Date($(this).val()));
        });
   </script>

@stop