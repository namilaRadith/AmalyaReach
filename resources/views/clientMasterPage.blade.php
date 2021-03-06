<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>
<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="farm activities, itineraries, farm holidays, country holidays, bed and breakfast, hotel, country hotel"/>
    <meta name="description" content="Country Holidays - Premium site template for a country accommodation.">
    <meta name="author" content="Ansonika">
    <title>Country Holidays - Premium site template for a country accommodation.</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('/client/img/favicon.ico" type="image/x-icon')}}">
    <link rel="apple-touch-icon" type="image/x-icon"
          href="{{asset('/client/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="{{asset('/client/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{asset('/client/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{asset('/client/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- Google web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Gochi+Hand' rel='stylesheet' type='text/css'>
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/sweetAlert/sweetalert.css')}}">

    @section('css_ref')
            <!-- BASE CSS -->
    <link href="{{asset('/client/css/base.css')}}" rel="stylesheet">
    <!-- REVOLUTION SLIDER CSS -->
    <link href="{{asset('/client/rs-plugin/css/settings.css')}}" rel="stylesheet">
    <link href="{{asset('/client/css/extralayers.css')}}" rel="stylesheet">

    {{--star rating CSS--}}
    <link rel="stylesheet" href="{{asset('/admin/plugins/bootstrap-star-rating/css/star-rating.min.css')}}">
    <link rel="stylesheet" href="{{asset('/admin/plugins/bootstrap-star-rating/css/theme-krajee-fa.min.css')}}">


    <style>
        label.error {
            color: red;
        }

        input.error {
            border: 1px solid red;
        }

    </style>

    @show

</head>

<body>

<!--[if lte IE 8]>
<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a>.</p>
<![endif]-->

<div id="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- End Preload -->


<div class="layer"></div>
<!-- Mobile menu overlay mask -->

<!-- Header================================================== -->
<header>


   {{\App\Facades\TrackingFacade::store_request_data()}}

    <div id="top_line">
        <div class="container">
            <ul id="top_links">
                <li><a href="#">En</a></li>
                <li><a href="#">Fr</a></li>
                <li><a href="#">Es</a></li>
            </ul>
            @if(Auth::user())

                <a href="auth/logout" id="link_bt">Log Out</a>
                <a href="{{action('UserController@showMyProfile')}}" id="link_bt">My Profile</a>

                @if(Q::isUserEligible())

                    <a href="#" id="link_bt" class="feedback_btn"  data-toggle="modal" data-target="#questionerModal">Feedback Session</a>
                    <!-- Modal -->
                    <div class="modal fade" id="questionerModal" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title"
                                        id="myModalLabel">{{Q::presentQuestioner()['questioner']->questioner_title}}</h4>
                                </div>
                                <div class="modal-body">
                                    {{ $i=1 }}
                                    @foreach( Q::presentQuestioner()['questions']  as $d)

                                        <label for="input-1" style="color: black;"
                                               class="control-label">{{$i." ".")"." "}}{{$d['question']}}</label>
                                        @if($d['question_type'] == 'R')
                                            <input id="{{"feedback-".$d['id']." "}} input-1-ltr-star-xs"
                                                   class="rating rating-loading" data-min="0" data-max="5"
                                                   data-size="xs" data-step="1">
                                        @else
                                            <input type="text " name="" id="{{"feedback-".$d['id']." "}}"
                                                   class="form-control">
                                        @endif
                                        {{ $i++ }}
                                    @endforeach

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" onclick="submitFeedback()" class="btn btn-primary" data-dismiss="modal">Save
                                        changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif








                @if(Auth::user()->isAdmin())
                    <a href="{{action('AdminDashboardController@index')}}" id="link_bt">Admin Dashboard</a>
                @endif
            @else
                <a href="auth/login" id="link_bt">Login</a>
            @endif


        </div>
        <!-- End container-->
    </div>
    <!-- End top line-->

    <div id="top_header">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <div id="logo">
                        <a href="{{action('WelcomeController@index')}}"><img src="{{asset('/client/img/logo.png')}}"
                                                                             width="240" height="40"
                                                                             alt="CountryHolidays"
                                                                             data-retina="true"></a>
                    </div>
                </div>
                <nav class="col-md-10 col-sm-10 col-xs-10">
                    <a class="cmn-toggle-switch cmn-toggle-switch__rot  open_close" href="javascript:void(0);"><span>Menu mobile</span></a>

                    <div class="main-menu">
                        <div id="header_menu">
                            <img src="{{asset('/client/img/logo.png')}}" width="240" height="40" alt="CountryHolidays"
                                 data-retina="true">
                        </div>
                        <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                        <ul>
                            <li><a href="{{action('WelcomeController@index')}}">Home</a></li>
                            <li><a href="{{action('clientNavigationController@showAbout')}}">About</a></li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Dinning <i
                                            class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{action('clientNavigationController@showDinningList')}}">All Recipes
                                            List</a></li>
                                    <li><a href="#">Horses</a></li>
                                    <li><a href="#">Discover local food</a></li>
                                    <li><a href="#">Cooking local food</a></li>
                                    <li><a href="#">Farm activities</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{action('clientNavigationController@showSpecialOffers')}}">SPECIAL
                                    OFFERS<i></i></a>
                            </li>
                            <li>
                                <a href="{{action('clientNavigationController@showLoyalty')}}" style = "color: purple">Loyalty<i></i></a>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Accomadation <i
                                            class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{action('clientNavigationController@showRoomList')}}">Accommodation
                                            List</a></li>
                                    <li><a href="#">Horses</a></li>
                                    <li><a href="#">Discover local food</a></li>
                                    <li><a href="#">Cooking local food</a></li>
                                    <li><a href="#">Farm activities</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Facilities <i
                                            class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{action('clientNavigationController@showFacilitiesList')}}">All
                                            Facilities</a></li>
                                    <li><a href="#">Horses</a></li>
                                    <li><a href="#">Discover local food</a></li>
                                    <li><a href="#">Cooking local food</a></li>
                                    <li><a href="#">Farm activities</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:void(0);" class="show-submenu">Functions<i
                                            class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="{{action('clientNavigationController@showFunctionList')}}">All
                                            Functions</a></li>
                                    <li><a href="#">Horses</a></li>
                                    <li><a href="#">Discover local food</a></li>
                                    <li><a href="#">Cooking local food</a></li>
                                    <li><a href="#">Farm activities</a></li>
                                </ul>
                            </li>

                            {{--contact page navigation link	--}}
                            <li><a href="{{action('feedbackController@create')}}">Contact us </a></li>


                        </ul>
                    </div>
                    <!-- End main-menu -->

                </nav>
            </div>
        </div>
    </div>
</header>
<!-- End Header -->

@yield('content')


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-3">
                <h3>Contacts</h3>
                <ul id="contact_details_footer">
                    <li>Route de Sablet 1023, Marseille<br>France 01923</li>
                    <li><a href="tel://004542344599">+45 423 445 99</a> / <a href="tel://004542344599">+45 423 445
                            99</a></li>
                    <li><a href="mailto:info@countryholidays.com">info@countryholidays.com</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-2">
                <h3>About</h3>
                <ul>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Rooms</a></li>
                    <li><a href="#">Activities</a></li>
                    <li><a href="#">Contact us</a></li>
                    <li><a href="{{action('clientNavigationController@showGallery')}}">Gallery</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3">
                <h3>Change language</h3>
                <ul>
                    <li><a href="#">English</a></li>
                    <li><a href="#">French</a></li>
                    <li><a href="#">Spanish</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3" id="newsletter">
                <h3>Newsletter</h3>

                <p>Join our newsletter to keep be informed about offers and news.</p>

                <div id="message-newsletter_2"></div>
                <form action="#" name="newsletter_5" id="newsletter_5">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <input name="email_newsletter_5" id="email_newsletter_5" type="email" value=""
                               placeholder="Your mail" class="form-control">
                    </div>
                    <input type="submit" value="Subscribe" class="btn_1 white" id="submit-newsletter_5">
                </form>
            </div>
        </div>
        <!-- End row -->
        <div class="row">
            <div class="col-md-12">
                <div id="social_footer">
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-google"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                        <li><a href="#"><i class="icon-pinterest"></i></a></li>
                        <li><a href="#"><i class="icon-vimeo"></i></a></li>
                        <li><a href="#"><i class="icon-youtube-play"></i></a></li>
                    </ul>
                    <p>� CountryHolidays 2015</p>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</footer>
<!-- End footer -->

<div id="toTop"></div>
<!-- Back to top button -->

@section('js_ref')
        <!-- Common scripts -->
<script src="{{ asset('/client/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{ asset('/client/js/common_scripts_min.js')}}"></script>
<script src="{{ asset('/client/js/functions.js')}}"></script>
<script src="{{ asset('/client/assets/validate.js')}}"></script>

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script src="{{ asset('/client/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{ asset('/client/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{ asset('/client/js/revolution_func.js')}}"></script>
<script src="{{ asset('/admin/plugins/validator/jquery.validate.min.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('/admin/plugins/sweetAlert/sweetalert.min.js')}}"></script>
<!-- Star Rating JS -->
<script src="{{asset('/admin/plugins/bootstrap-star-rating/js/star-rating.min.js')}}"></script>
<script>

    $(document).ready(function () {
        $("#newsletter_5").validate({
            //set rules
            rules: {
                email_newsletter_5: {
                    required: true,
                    email: true,


                }

            },

            //set messages
            messages: {
                email_newsletter_5: {
                    required: "Please enter email address",
                    email: "Please enter valid email address",

                }
            }
        });


        //listen submit event
        $("#newsletter_5").submit(function (e) {
            //check is validation successes
            if ($("#newsletter_5").valid()) {
                // CSRF protection
                $.ajaxSetup(
                        {
                            headers: {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            }
                        });


                //create and senf ajax request to the server
                $.ajax({

                    method: "post",
                    url: '/add-subscriber',
                    data: {
                        email: $("#email_newsletter_5").val(),


                    },

                    //on success remove loading animation & clear fields
                    success: function (data) {
                        $("#email_newsletter_5").val('');
                        //alert(data);
                        swal("success!", data, "success")
                    }


                });

            }

            // stop the form from submitting the normal way and refreshing the page
            event.preventDefault();

        });


    });


</script>
<script>
    @if (Notify::has('success'))
swal("success!", "{{ Notify::first('success') }}", "success");

    @endif

    @if (Notify::has('error'))
        swal("error!", "{{ Notify::first('error') }}", "error");
    @endif

    @if (Notify::has('warning'))
        swal("warning!", "{{ Notify::first('warning') }}", "warning");
    @endif

    @if (Notify::has('info'))
        swal("info!", "{{ Notify::first('info') }}", "info");
    @endif

    function submitFeedback() {
        console.log("Length : " + $('input[id^="feedback-"]').length);

        JSONAsnwers = [];

        $('input[id^="feedback-"]').each(function (input) {


            var value = $(this).val();
            var id = $(this).attr('id');
            id = id.split(" ");
            id = id[0].split("-");
            id = id[1];

            JSONAsnwers.push({id: id, value: value});


            //console.log('ID : '+id + ' VALUE : ' + value);
            //console.log("loop");
        });

        var data2 = JSON.stringify(JSONAsnwers);
        console.log(data2);
        $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-Token': "{!! csrf_token() !!}"
                    }
                });


        //create and senf ajax request to the server
        $.ajax({

            method: "post",
            dataType: "json",
            url: '/send-feedback',
            data: {data: JSONAsnwers},

            //on success remove loading animation & clear fields
            success: function (data) {
                $(".feedback_btn").hide();

                swal("success!", "Thank you for your feedback", "success");

                // console.log("sucess");
                // console.log(data);
            },
            error:function(d){
                //swal("success!", "Thank you for your feedback", "error");
            }



        });

    }
</script>
@show


</body>
</html>