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
<link rel="stylesheet" href="{{asset('client/css/weather.css')}}" >

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
            <div class="bg_gray add_bottom_60">
            <!--
                <div class="col-md-3 col-sm-3"  style=" text-align: center;" >

                <h3>Special Offers</h3>
                    <span style="font-size: small">DISCOVERY

Make your travel unforgettable with Discoveries.

AVANI is a proud partner of the Global Hotel Alliance, GHA, is the world’s largest alliance of independent luxury hotel brands comprising of hotels, palaces, and resorts around the world. The loyalty DISCOVERY programme rewards guest by enriching their travel experiences with hotel benefits and exclusive extras that make each stay even more enjoyable and gratifying.</span>
                    <img src="{{ asset('client/img/images.jpg') }}" alt="">
                    <ul style="font-size: small">
                        <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
                        <li><i class="icon_set_2_icon-103"></i>Loundry service</li>
                        <li><i class="icon_set_2_icon-110"></i>Swimming pool</li>
                        <li><i class="icon_set_1_icon-58"></i>Restaurant</li>
                        <li><i class="icon_set_1_icon-27"></i>Parking</li>
                    </ul>
                    <p>
                        His <strong>civibus tacimates</strong> ex, an quo nominavi qualisque. In erant dissentiunt vel, dicit legimus docendi an nam. Te congue perfecto eos, aliquid corrumpit ea est, eam petentium repudiandae ad.
                    </p>
                </div> -->
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
                <div class="col-md-9 col-sm-9"  style=" text-align: center;" >
                    <form method="post"  action="LoyaltyFormSubmit" id="LoyaltyForm" name="LoyaltyForm" class="register">
                        <h1  style="color: #990099">Loyalty Registration Form</h1>
                        <fieldset class="row1">
                            <legend>Account Details
                            </legend>
                            <p>
                                <label>Email *
                                </label>
                                <input type="text" name="email" id="email"/>
                                <label>Repeat email *
                                </label>
                                <input type="text" name="emailRepeat" id="emailRepeat"/>
                            </p>
                            <p>
                                <label>Password*
                                </label>
                                <input type="text" name="password" id="password"/>
                                <label>Repeat Password*
                                </label>
                                <input type="text" name="passwordRepeat" id="passwordRepeat"/>
                                <label class="obinfo">* obligatory fields
                                </label>
                            </p>
                        </fieldset>
                        <fieldset class="row2">
                            <legend>Personal Details
                            </legend>
                            <p>
                                <label>Name *
                                </label>
                                <input type="text" class="long" name="cust_name" id="cust_name"/>
                            </p>
                            <p>
                                <label>Phone *
                                </label>
                                <input type="text" maxlength="10" name="phone" id="phone"/>
                            </p>
                            <p>
                                <label class="optional">Street
                                </label>
                                <input type="text" class="long" name="Street" id="Street"/>
                            </p>
                            <p>
                                <label>City *
                                </label>
                                <input type="text" class="long" name="city" id="city"/>
                            </p>
                            <p>
                                <label>Country *
                                </label>
                                <select name="country" id="country">
                                    <option>
                                    </option>
                                    <option value="1">United States
                                    </option>
                                </select>
                            </p>
                            <p>


                            </p>
                        </fieldset>
                        <fieldset class="row3">
                            <legend>Further Information
                            </legend>
                            <p>
                                <label>Gender *</label>
                                <input type="radio" value="radio" name="gender" id="mail"/>
                                <label class="gender">Male</label>
                                <input type="radio" value="radio" name="gender" id="female"/>
                                <label class="gender">Female</label>
                            </p>
                            <p>
                                <label>Birthdate *
                                </label>
                                <select class="date" name="bday" id="bday">
                                    <option value="1">01
                                    </option>
                                    <option value="2">02
                                    </option>
                                    <option value="3">03
                                    </option>
                                    <option value="4">04
                                    </option>
                                    <option value="5">05
                                    </option>
                                    <option value="6">06
                                    </option>
                                    <option value="7">07
                                    </option>
                                    <option value="8">08
                                    </option>
                                    <option value="9">09
                                    </option>
                                    <option value="10">10
                                    </option>
                                    <option value="11">11
                                    </option>
                                    <option value="12">12
                                    </option>
                                    <option value="13">13
                                    </option>
                                    <option value="14">14
                                    </option>
                                    <option value="15">15
                                    </option>
                                    <option value="16">16
                                    </option>
                                    <option value="17">17
                                    </option>
                                    <option value="18">18
                                    </option>
                                    <option value="19">19
                                    </option>
                                    <option value="20">20
                                    </option>
                                    <option value="21">21
                                    </option>
                                    <option value="22">22
                                    </option>
                                    <option value="23">23
                                    </option>
                                    <option value="24">24
                                    </option>
                                    <option value="25">25
                                    </option>
                                    <option value="26">26
                                    </option>
                                    <option value="27">27
                                    </option>
                                    <option value="28">28
                                    </option>
                                    <option value="29">29
                                    </option>
                                    <option value="30">30
                                    </option>
                                    <option value="31">31
                                    </option>
                                </select>
                                <select name="bmonth" id="bmonth">
                                    <option value="1">January
                                    </option>
                                    <option value="2">February
                                    </option>
                                    <option value="3">March
                                    </option>
                                    <option value="4">April
                                    </option>
                                    <option value="5">May
                                    </option>
                                    <option value="6">June
                                    </option>
                                    <option value="7">July
                                    </option>
                                    <option value="8">August
                                    </option>
                                    <option value="9">September
                                    </option>
                                    <option value="10">October
                                    </option>
                                    <option value="11">November
                                    </option>
                                    <option value="12">December
                                    </option>
                                </select>
                                <input class="year" type="text" size="4" maxlength="4" name="byear" id="byear"/>e.g 1976
                            </p>
                            <p>
                                <label>Nationality *
                                </label>
                                <select name="national" id="national">
                                    <option value="0">
                                    </option>
                                    <option value="1">United States
                                    </option>
                                </select>
                            </p>
                            <p>
                                <label>Children *
                                </label>
                                <input type="checkbox" value="" name="children" id="children"/>
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
                                <input type="checkbox" value=""/>
                                <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                            </p>
                            <p class="agreement">
                                <input type="checkbox" value=""/>
                                <label>I want to receive personalized offers by your site</label>
                            </p>
                            <p class="agreement">
                                <input type="checkbox" value=""/>
                                <label>Allow partners to send me personalized offers and related services</label>
                            </p>
                        </fieldset>

                        <div><button class="button">Register &raquo;</button></div>
                    </form>
                </div>
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
                </div>            </div><!-- End col-lg-3 -->
        </div><!-- End row -->
    </div><!-- End Container -->


    @stop
    @section('js_ref')
    @parent
            <!-- Specific scripts -->
    <script src="{{asset('client/js/jquery.zweatherfeed.js')}}"></script>
    <script>
        $('#weather').weatherfeed(['FRXX0059'], {
            language : 'en',
            forecast: true
        });
    </script>

@stop