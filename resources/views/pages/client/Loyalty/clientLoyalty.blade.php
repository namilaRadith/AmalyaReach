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

<meta name="csrf-token" content="{{ csrf_token() }}" />
//hosted by Microsoft Ajax CDN

<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
<style>
    /*SITE STYLING*/
    html{
        background:#4EC094;
        font-family: 'Lato', sans-serif;
        color:white;
    }
    #LoyaltyForm input[type="password"]{
        background:transparent;
        border: 2px solid #46AC84;
        color: #777;
        font-family: "Lato", sans-serif;
        font-size: 14px;
        padding: 9px 5px;
        height: 21px;
        text-indent: 6px;
        -webkit-appearance: none;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
        -webkit-transition: border .25s linear, color .25s linear;
        -moz-transition: border .25s linear, color .25s linear;
        -o-transition: border .25s linear, color .25s linear;
        transition: border .25s linear, color .25s linear;
        -webkit-backface-visibility: hidden;
        width:25%;
    }
    #LoyaltyForm input[type="password"]:focus{
        outline:0;
    }
    #myform{
        width: 500px;
        margin: 0 auto;
        position: relative;
        margin-bottom:60px;
    }
    .strength_meter{
        position: absolute;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 43px;
        z-index:-1;
        border-radius:5px;
        padding-right:13px;
    }
    .button_strength {
        text-decoration: none;
        color: #FFF;
        font-size: 13px;
    }
    .strength_meter div{
        width:0%;
        height: 43px;
        text-align: right;
        color: #000;
        line-height: 43px;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
        padding-right: 12px;
        border-radius:5px;
    }
    .strength_meter div p{
        position: absolute;
        top: 22px;
        right: 0px;
        color: #FFF;
        font-size:13px;
    }

    .veryweak{
        background-color: #FFA0A0;
        border-color: #F04040!important;
        width:25%!important;
    }
    .weak{
        background-color: #FFB78C;
        border-color: #FF853C!important;
        width:50%!important;
    }
    .medium{
        background-color: #FFEC8B;
        border-color: #FC0!important;
        width:75%!important;
    }
    .strong{
        background-color: #C3FF88;
        border-color: #8DFF1C!important;
        width:100%!important;
    }
    h1{
        color:white;
        font-size:50px;
        text-align:center;
        padding-top:30px;
        margin-bottom:20px;
    }
    h1 span{
        font-weight:bold;
        color:white;
        opacity:.3;
    }


</style>


@stop

@section('content')


    <section class="sub_header" id="bg_room" style="background-image:url({{ URL::asset('client/img/loyalty.jpg')}})">

        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>AMALYA LOYALTY</h1>
                <p>
                     Discover the world with AMALYA loyalty and hotel rewards programme. From complimentary stays to exclusive privileges and a host of lifestyle treats, we understand the importance of recognising and rewarding our guests.
                </p>
            </div>
        </div>
    </section><!-- End Section -->

    <div class="container margin_60">
        <div class="row">

            <style>

                h2 { color: #990099; font-family: 'Sans-serif'; font-size: 36px; font-weight: normal; line-height: 48px; margin: 0 0 18px; text-shadow: 1px 0 0 #fff; }

                hr.UpperLine {
                    height: 10px;
                    border: 0;
                    box-shadow: 0 10px 10px -10px #8c8b8b inset;
                }



                hr.LowerLine {
                    height: 30px;
                    border-style: solid;
                    border-color: #8c8b8b;
                    border-width: 1px 0 0 0;
                    border-radius: 20px;
                }
                hr.LowerLine:before {
                    display: block;
                    content: "";
                    height: 30px;
                    margin-top: -31px;
                    border-style: solid;
                    border-color: #8c8b8b;
                    border-width: 0 0 1px 0;
                    border-radius: 20px;
                }
            </style>
                <link rel="stylesheet" href="{{asset('client/css/default.css')}}" >


                <div class="col-md-9 col-sm-9"  style=" text-align: center" >

                    {{--{!! Form::open(array('url' => 'cl-Cutomer-Loyalty-submit','id' => 'LoyaltyForm','class' => 'register','name' => 'LoyaltyForm')) !!}--}}
                    <form id = "LoyaltyForm" class="register">
                        <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }}" />

                        <h6  style="color: #990099">Loyalty Registration Form</h6>
                        <fieldset class="row1">
                            <legend>Account Details
                            </legend>
                            <p>

                                <label>Email * </label>
                                <input type="email" placeholder="example@gmail.com" name ="email" id="email">
                            </p>
                            <p>
                                <label>Password* </label>
                                <input type="password" id="password" name="password">
                                <label>Repeat Password * </label>
                                <input type="password" id="repassword" name="repassword">
                            </p>
                        </fieldset>
                        <fieldset class="row2">
                            <legend>Personal Details
                            </legend>
                            <p>
                                <label>Name * </label>
                                <input type="text" id="name" name="name">
                            </p>
                            <p>
                                <label>Phone * </label>
                                <input type="text" id="phone" name="phone" maxlength="10">
                            </p>
                            <p>
                                <label>Street </label>
                                <input type="text" id="street" name="street">
                            </p>
                            <p>
                                <label>City * </label>
                                <input type="text" id="city" name="city">
                            </p>
                            <p>
                                <label>Country * </label>
                               <select name="country" id="country">
                                   <option value="United States">United States</option>
                                   <option selected="selected" value="Srilanka">Srilanka</option>
                                   <option value="Greece">Greece</option>
                               </select>
                            </p>
                            <p>


                            </p>
                        </fieldset>
                        <fieldset class="row3">
                            <legend>Further Information
                            </legend>
                            <p>
                                <label>Gender * </label>
                                <input type="radio" value="Male" name="gender"><label class="gender">Male</label>
                                <input type="radio" value="Female" name="gender"><label class="gender">Male</label>

                            </p>
                            <p>
                                <label>Birthdate * </label>
                                <input type="text" id="bday" name="bday">
                            </p>
                            <p>
                                <label>Nationality * </label>
                                <select name = "nationality" id="nationality">
                                    <option value="United States">United States</option>
                                    <option selected="selected" value="Srilankan">Srilankan</option>
                                    <option value="Greece">Greece</option>
                                </select>
                            </p>
                            <p>
                                <label>Children * </label>
                                <input type="checkbox" name="children" id="children" value="true">
                            </p>
                            <div class="infobox"><h4>YOU DESERVE TO BE REWARDED
                                    JOIN NOW</h4>
                                <p>

                                    By creating this Amalya Reach account, you agree to the Amalya Reach Program Terms and Conditions, our Expiration Policy, our Global Privacy Statement (Updated Jan 2016), and our Cookies Statement (Updated Jan 2016).
                                </p>
                            </div>
                        </fieldset>
                        <fieldset class="row4">
                            <legend>Terms and Mailing
                            </legend>
                            <p class="agreement">


                                <input type="checkbox" name="termsConditions" id="termsConditions" value="true">
                                <label>I accept the Terms and Conditions</label>
                             </p>
                            <p class="agreement">

                                <input type="checkbox" name="recieve_p_offers" id="recieve_p_offers" value="true">
                                <label>I want to receive personalized offers by your site</label>
                            </p>
                            <p class="agreement">

                                <input type="checkbox" name="allow_p_p_offers" id="allow_p_p_offers" value="true">
                                <label>Allow partners to send me personalized offers and related services</label>

                            </p>
                        </fieldset>

                        <div> <input id="request_cust_loyalty" class="button" value="Register &raquo;" ></div>

                    </form>
                </div>


            <div class="col-lg-3 col-md-3">
                <div class="box_style_1" id="general_facilities">
                    <h3>Special Offers</h3>
                    <img width = "175px" src="{{ asset('client/img/images.jpg') }}" alt="">

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
                <div class="box_style_1" id="general_facilities">
                    <h3>Other Local Experiences</h3>
                    <ul>

                    </ul>
                    <p>
                        Sri Lanka is rich in unusual experiences that can be safely enjoyed on our especially arranged excursions. Whether you want to join in activities, learn more about the island’s fascinating legends, see how village people live, explore the lush wilderness, photograph wildlife or taste tea at its source, we have designed tours to satisfy both the intrepid adventurer and the more relaxed traveller.
                    </p>
                </div>
            </div><!-- End col-lg-3 -->
        </div><!-- End row -->
    </div><!-- End Container -->
    <button id="create-user">Email Verification</button>
    <div id="dialog-form" class= "dialog-form" title="Email Verification">
        <p id="old_code_link" class="validateTips">A verification Code has been sent to te email provided. Please Enter the verification Code Below</p>
        <p id="new_code_link" style="display: none" class="validateTips">A <span style="color:red">New</span> verification Code has been sent to te email provided. Please Enter the verification Code Below</p>
        <p id="resend_code_link" style="color:red;display: none" onclick="resend_email_ver_code()">Click HERE to re - send a new Verification Code</p>

        <form>
            <fieldset>
                <label for="name">Code</label>
                <input type="text" name="code" id="code" value="******" class="text ui-widget-content ui-corner-all">
                <input type="submit" tabindex="-1" style="position:absolute; top:-1000px" value="Verify">
                <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
            </fieldset>
        </form>
    </div>


    @stop
    @section('js_ref')
    @parent
            <!-- Specific scripts -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script type="text/javascript" src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="{{asset('/client/js/jquery_ui_block.js')}}"></script>
    <style>
        body { font-size: 62.5%; }
        label, input { display:block; }
        input.text { margin-bottom:12px; width:95%; padding: .4em; }
        fieldset { padding:0; border:0; margin-top:25px; }
        h1 { font-size: 1.2em; margin: .6em 0; }
        div#users-contain { width: 350px; margin: 20px 0; }
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 10px; text-align: left; }
        .ui-dialog .ui-state-error { padding: .3em; }
        .validateTips { border: 1px solid transparent; padding: 0.3em; }
    </style>
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        verification_code = "";

            var dialog, form,

            // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
                    emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                    name = $( "#code" ),
                    email = $( "#email" ),
                    password = $( "#password" ),
                    allFields = $( [] ).add( code ).add( email ).add( password ),
                    tips = $( ".validateTips" );

            function updateTips( t ) {
                tips
                        .text( t )
                        .addClass( "ui-state-highlight" );
                setTimeout(function() {
                    tips.removeClass( "ui-state-highlight", 1500 );
                }, 500 );
            }

            function checkLength( o, n, min, max ) {
                if ( o.val().length > max || o.val().length < min ) {
                    o.addClass( "ui-state-error" );
                    updateTips( "Length of " + n + " must be between " +
                            min + " and " + max + "." );
                    return false;
                } else {
                    return true;
                }
            }

            function checkRegexp( o, regexp, n ) {
                if ( !( regexp.test( o.val() ) ) ) {
                    o.addClass( "ui-state-error" );
                    updateTips( n );
                    return false;
                } else {
                    return true;
                }
            }
            function addUser() {
                $.blockUI({ message: '<h1><img src=\"{{asset('/client/img/477.gif')}}\" /> Please wait kindly we are Processing your Request...</h1>' });
                $.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
                $.blockUI();
                var code = $("#code").val();
                n = verification_code.localeCompare(code);

                                if(n == 0) {
                                    var email = $("#email").val();
                                    var password = $("#password").val();
                                    var name = $("#name").val();
                                    var phone = $("#phone").val();
                                    var street = $("#street").val();
                                    var city = $("#city").val();
                                    var country = $("#country").val();
                                    var gender = $('input[name=gender]:checked', '#LoyaltyForm').val();
                                    var bday = $("#bday").val();
                                    var nationality = $("#nationality").val();
                                    var children = $("#children").val();
                                    var termsConditions = $("#termsConditions").val();
                                    var recieve_p_offers = $("#recieve_p_offers").val();
                                    var allow_p_p_offers = $("#allow_p_p_offers").val();
                                    var _token = $('input[name=_token]').val();


                                    $.post("cl-Cutomer-Loyalty-submit", {
                                        email: email,
                                        password: password,
                                        name: name,
                                        phone: phone,
                                        street: street,
                                        city: city,
                                        country: country,
                                        gender: gender,
                                        bday: bday,
                                        nationality: nationality,
                                        children: children,
                                        recieve_p_offers: recieve_p_offers,
                                        allow_p_p_offers: allow_p_p_offers

                                    }, function (data) {
                                        console.log(data);
                                        $.unblockUI();
                                    }, "json");

                                }
                                else{

                                    $("#resend_code_link").show();
                                    $.unblockUI();                                }

                }


            dialog = $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 300,
                width: 350,
                modal: true,
                buttons: {
                    "Verify Email": addUser,
                    Cancel: function() {
                        dialog.dialog( "close" );
                    }
                },
                close: function() {
                    form[ 0 ].reset();
                    allFields.removeClass( "ui-state-error" );
                }
            });

            form = dialog.find( "form" ).on( "submit", function( event ) {
                event.preventDefault();
                addUser();
            });

//            $( "#create-user" ).button().on( "click", function() {
//
//            });

    </script>
    <script type="text/javascript">

        $(function() {
            $( "#bday" ).datepicker();
        });


        function resend_email_ver_code(){
            $.blockUI({ message: '<h1><img src=\"{{asset('/client/img/477.gif')}}\" /> Please wait kindly we are Processing your Request...</h1>' });
            $.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
            $.blockUI();
            var email  = $("#email").val();


            $.getJSON(
                    "verifyemail/?email=" + email,
                    null,
                    function(data) {
                        console.log(data);
                        verification_code = data;
                        $("#old_code_link").hide();
                        $("#new_code_link").show();
                        $("#resend_code_link").hide();
                        $.unblockUI();

                    }
            );

        }


        function verify_email(){

            $.blockUI({ message: '<h1><img src=\"{{asset('/client/img/477.gif')}}\" /> Please wait kindly we are Processing your Request...</h1>' });
            $.blockUI({ css: { backgroundColor: '#f00', color: '#fff'} });
            $.blockUI();



            var email  = $("#email").val();


            $.getJSON(
                    "verifyemail/?email=" + email,
                    null,
                    function(data) {
                        console.log(data);
                        verification_code = data;

                        $.unblockUI();
                        dialog.dialog( "open" );
                    }
            );

        }
        $(document).ready(function () {
        $('#request_cust_loyalty').click(function() {
            if ($('#LoyaltyForm').valid()) {
                verify_email();
            }
        });







                $("#LoyaltyForm").validate({
                    rules: {
                        name: "required",
                        phone: "required",
                        street: "required",
                        city: "required",
                        country: "required",
                        gender: "required",
                        bday: "required",
                        nationality: "required",
                        termsConditions: "required",
                        password: {
                            required: true,
                            minlength: 5
                        },
                        repassword: {
                            required: true,
                            minlength: 5,
                            equalTo: "#password"
                        },
                        email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        name: "Please enter your firstname",
                        phone: "Please enter your phone no",
                        street: "Please enter your address Street",
                        city: "Please enter your address city",
                        country: "Please enter your country",
                        gender: "Please enter your address gender",
                        bday: "Please enter your Birthday",
                        nationality: "Please enter your Nationality",
                        termsConditions: "Please tick if u Agree to continue",
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        repassword: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long",
                            equalTo: "Please enter the same password as above"
                        },
                        email: "Please enter a valid email address"

                    }
                });


        });
    </script>

@stop