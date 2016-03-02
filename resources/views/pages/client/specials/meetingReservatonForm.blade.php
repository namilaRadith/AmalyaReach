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


    <div class="container margin_60">
        <div class="row">
            <h2>Meeting Request Form</h2>
            <hr>
            <p>At Amalya we do everything possible to ensure your meetings and events run smoothly and professionally.<br>
               Please complete the below form and one of our Sales Representatives will be in contact with you to discuss your requirements further.</p>
            <div class="col-md-9" style="background-color:#b8c7ce;" >
            <h2>Request For Proposal</h2>
             <hr>
                <form method="post" action="meetingResFormSubmit" id="meetingsReservationForm">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
                      <div class="col-md-8">
                          <div class="form-group">
                              <table class=" table-condensed">
                                  <tr>
                                      <th>Date From :</th>
                                      <th>Date To :</th>
                                  </tr>
                                  <tr>
                                      <td>
                                          <input type="text" id="dateTo" class="date-pick " size="40">
                                          <div class="error alert-danger">{{ $errors->first('dateTo') }}</div>
                                      </td>
                                      <td>
                                          <input type="text" id="dateFrom" class="date-pick" size="35">
                                          <div class="error alert-danger">{{ $errors->first('dateFrom') }}</div>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <table class=" table-condensed">
                                  <tr>
                                      <th >My Dates are Flexible :</th>
                                  </tr>
                                  <tr>
                                      <td >
                                          <div class="row">
                                          <div class="col-md-6" style="background-color: whitesmoke">
                                          <input name="date_flex" id="dateFlex" type="radio" value="Yes" checked="checked" />
                                          <label for="date_flex_y_id">Yes</label>
                                          </div>
                                          <div class="col-md-6" style="background-color: whitesmoke;border-left: solid #b8c7ce ">
                                          <input name="date_flex" id="dateFlex" type="radio" value="No" />
                                          <label for="date_flex_n_id">No</label>
                                          </div>
                                          </div>
                                          <div class="error alert-danger">{{ $errors->first('date_flex') }}</div>
                                      </td>
                                  </tr>
                              </table>
                          </div>
                      </div>
                  </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Number of guest rooms per night :</th>
                                        <th>Event Requirements :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" size="40" id="noGuessRooms">
                                            <div class="error alert-danger">{{ $errors->first('noGuessRooms') }}</div>
                                        </td>

                                        <td>
                                            <input name="mtnEvenReq" type="checkbox" id="mtnEvenReq" value="Yes" />
                                            <label for="mtnEvenReq">Food/Beverages</label>
                                            <input name="mtnEvenReq" type="checkbox" id="mtnEvenReq" value="Yes" />
                                            <label for="mtnEvenReq">Audio/Visual</label></td>
                                          <!--  <div class="error alert-danger"></div> -->
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th >My Location is Flexible :</th>
                                    </tr>
                                    <tr>
                                        <td >
                                            <div class="row">
                                                <div class="col-md-6" style="background-color: whitesmoke">
                                                    <input name="locFlex" id="locFlex" type="radio" value="Yes" checked="checked" />
                                                    <label for="locFlex">Yes</label>
                                                </div>
                                                <div class="col-md-6" style="background-color: whitesmoke;border-left: solid #b8c7ce ">
                                                    <input name="locFlex" id="locFlex" type="radio" value="No" />
                                                    <label for="locFlex">No</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Number of Guests / Attendees :</th>
                                        <th>Number of Meeting Rooms :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" size="40" id="noGuests" name="noGuests">
                                            <div class="error alert-danger">{{ $errors->first('noGuests') }}</div>
                                        </td>
                                        <td>
                                            <input type="text" size="35" id="noMeetingRooms" name="noMeetingRooms">
                                            <div class="error alert-danger">{{ $errors->first('noMeetingRooms') }}</div>

                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Other Details :</th>
                                    </tr>
                                    <tr>
                                        <td><textarea rows="4" cols="76" id="addDetails" name="addDetails"></textarea> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                     <hr>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Salutation:</th>
                                        <th>First Name :</th>
                                        <th>Last Name :</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" size="24"></td>
                                        <td><input type="text" size="24"></td>
                                        <td><input type="text" size="24"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Company :</th>
                                        <th>Email Address :</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text"  id="company" size="40"> </td>
                                        <td><input type="text" id="email" size="35"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                     </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Country :</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text"  size="79"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th>Enter your phone number :</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text"  size="40"> </td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <table class=" table-condensed">
                                    <tr>
                                        <th >I would like a Sales Representative to contact me :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-3" style="background-color: whitesmoke;border-left: solid 10px #b8c7ce ">
                                                    <input name="phone_call" id="phone_call" type="radio" value="Yes" checked="checked" />
                                                    <label for="phone_call">Yes</label>
                                                </div>
                                                <div class="col-md-3" style="background-color: whitesmoke;border-left: solid #b8c7ce ">
                                                    <input name="phone_call" id="phone_call" type="radio" value="No" />
                                                    <label for="phone_call">No</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                  <div class="row">
                      <div class="col-md-5">
                          <input type="submit" class="btn btn_full" style="background-color: purple" value="Send Request" >
                      </div>
                  </div>


                </form>
            </div>

            <div class="col-md-3">
                <div class="box_style_1">
                    <h2>Contacts</h2>
                    <h5>Address</h5>
                    <p> 556, Moragahahena Road,Pitipana North,Homagama<br>Sri lanka 10200</p>
                    <h5>Telephone</h5>
                    <p><a href="tel://0094114404040">+94 114404040</a> / <a href="tel://0094114368291">+94 114368291</a> / <a href="tel://0094777743612">+94 777743612</a></p>
                    <h5>Tele/Fax</h5>
                    <p><a href="tel://0094112748913">+94 112748913</a></p>
                    <h5>Email</h5>
                    <p><a href="mailto:amalyareach@yahoo.com">amalyareach@yahoo.com</a></p>
                    <p>Located on a place so Nice, a short distance from the famous Kalutara town, Hotel Amalya is one of the best hotels able to satisfy the different needs of its guests with comfort and first rate services.</p>
                </div>
                <div class=" box_style_2">
                    <i class="icon_set_1_icon-90"></i>
                    <h4>Need help? Call us</h4>
                    <a href="tel://0094114404040" class="phone">+94 1144040430</a>
                </div>

            </div>

        </div>
    </div>



@stop

@section('js_ref')
@parent
        <!-- Specific scripts -->
    <script src="{{asset('/client/js/quantity-bt.js')}}"></script>
    <script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>
    <script>$('input.date-pick').datepicker();</script>
    <
@stop