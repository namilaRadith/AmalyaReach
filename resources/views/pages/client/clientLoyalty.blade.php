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

                    {!! Form::open(array('url' => 'cl-Cutomer-Loyalty-submit','id' => 'LoyaltyForm','class' => 'register','name' => 'LoyaltyForm')) !!}



                        <h1  style="color: #990099">Loyalty Registration Form</h1>
                        <fieldset class="row1">
                            <legend>Account Details
                            </legend>
                            <p>
                                        <!-- Email -->
                                {!! Form::label('email','Email *') !!}
                                {!! Form::text('email', '' ,['placeholder' => 'example@gmail.com']) !!}

                            </p>
                            <p>
                                     <!-- Password -->
                                {!! Form::label('password','Password*') !!}
                                {!! Form::password('password') !!}


                                        <!-- Repeat Password -->
                                {!! Form::label('repassword','Repeat Password *') !!}
                                {!! Form::password('repassword') !!}

                                {!! Form::label('fields','* obligatory fields',['class' => 'obinfo']) !!}

                            </p>
                        </fieldset>
                        <fieldset class="row2">
                            <legend>Personal Details
                            </legend>
                            <p>

                                {!! Form::label('name','Name * ') !!}
                                {!! Form::text('name', ' ', ['class'=>'long']) !!}

                            </p>
                            <p>

                                {!! Form::label('phone','Phone *') !!}
                                {!! Form::text('phone', ' ', array('maxlength'=>'10','id' => 'phone')) !!}

                            </p>
                            <p>

                                {!! Form::label('street','Street',['class' => 'optional']) !!}
                                {!! Form::text('street', ' ', ['class'=>'long']) !!}

                            </p>
                            <p>

                                {!! Form::label('city','City *') !!}
                                {!! Form::text('city', ' ', ['class'=>'long']) !!}
                            </p>
                            <p>
                                {!! Form::label('country','Country *') !!}
                                {!! Form::select('country', array('1' => 'United States', '2' => 'Srilanka'), '2') !!}

                            </p>
                            <p>


                            </p>
                        </fieldset>
                        <fieldset class="row3">
                            <legend>Further Information
                            </legend>
                            <p>
                                {!! Form::label('gender','Gender *') !!}

                               {!! Form::radio('gender', 'male') !!}
                                {!! Form::label('gender','Male',['class' => 'gender']) !!}

                                {!! Form::radio('gender', 'female') !!}
                                {!! Form::label('gender','Female',['class' => 'gender']) !!}


                            </p>
                            <p>

                                {!! Form::label('bday', 'Birthdate *') !!}

                                {!! Form::selectRange('bday', 01, 31,['class' => 'date']) !!}

                                {!! Form::selectMonth('bmonth') !!}

                                {!! Form::selectRange('byear', 1987, 1997) !!}
                            </p>
                            <p>

                                {!! Form::label('nationality', 'Nationality *') !!}
                                {!! Form::select('nationality', array('1' => 'United States', '2' => 'Srilankan'), '2') !!}

                            </p>
                            <p>
                                {!! Form::label('children', 'Children *') !!}
                                {!! Form::checkbox('children', 'true', false) !!}

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
                                {!! Form::checkbox('termsConditions', 'true', false) !!}
                                {!! Form::label('termsConditions', '*  I accept the Terms and Conditions') !!}
                             </p>
                            <p class="agreement">
                                {!! Form::checkbox('recieve_p_offers', 'true', false) !!}
                                {!! Form::label('recieve_p_offers', 'I want to receive personalized offers by your site') !!}
                            </p>
                            <p class="agreement">
                                {!! Form::checkbox('allow_p_p_offers', 'true', false) !!}
                                {!! Form::label('allow_p_p_offers', 'Allow partners to send me personalized offers and related services') !!}

                            </p>
                        </fieldset>

                        <div> <input class="button" type="submit" name="submit" value="Register &raquo;"></div>

                    {!! Form::close() !!}
                    <!--/form-->


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
                        His <strong>civibus tacimates</strong> ex, an quo nominavi qualisque. In erant dissentiunt vel, dicit legimus docendi an nam. Te congue perfecto eos, aliquid corrumpit ea est, eam petentium repudiandae ad.
                    </p>
                </div>
            </div><!-- End col-lg-3 -->
        </div><!-- End row -->
    </div><!-- End Container -->


    @stop
    @section('js_ref')
    @parent
            <!-- Specific scripts -->

    <script type="text/javascript" src="{{asset('/client/js/jquery.js')}}"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
    <script>



        $().ready(function() {


            // validate signup form on keyup and submit
            $("#LoyaltyForm").validate({
                rules: {
                    cust_name: "required",
                    phone: "required",
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
                    },
                    termsConditions: "Please tick if u Agree"
                },
                messages: {
                    cust_name: "Please enter your firstname",
                    phone: "Please enter your lastname",
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    repassword: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    termsConditions: "Please tick if u Agree"
                }
            });


        });
    </script>

    <script type="text/javascript" src="{{asset('/client/js/strength.js')}}"></script>
    <script type="text/javascript" src="{{asset('/client/js/js.js')}}"></script>
    <script type="text/javascript">

        $(document).ready(function($) {

            $('#123').strength({
                strengthClass: 'strength',
                strengthMeterClass: 'strength_meter',
                strengthButtonClass: 'button_strength',
                strengthButtonText: 'Show Password',
                strengthButtonTextToggle: 'Hide Password'
            });

        });



    </script>

@stop