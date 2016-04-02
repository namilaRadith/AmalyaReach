@extends('clientMasterPage')
@section('css_ref')
@parent
        <!-- SPECIFIC CSS -->
<link href="{{asset('/client/css/date_time_picker.css')}}" rel="stylesheet">
<style>


    .ui-widget-overlay {
        display:none;
        position:fixed;
        top:125px;
        left:100px;
        right:100px;


    }

    .popup-close {
        width:30px;
        height:30px;
        padding-top:4px;
        position:absolute;
        top:1px;
        right:10px;
        transform:translate(50%, -50%);
        border-radius:1000px;
        background:rgba(0,0,0,0.8);
        font-family:Arial, Sans-Serif;
        font-size:20px;
        text-align:center;
        line-height:100%;
        color:#fff;
    }

    .ui-dialog .ui-dialog-titlebar{
        display:none;
    }


</style>

@stop




@section('content')

<div class="wrap">
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
            <h2>Meeting Reservation Form</h2>
            <hr>
            <p>At Amalya we do everything possible to ensure your meetings and events run smoothly and professionally.<br>
               Please complete the below form and one of our Sales Representatives will be in contact with you to discuss your requirements further.</p>
            <div class="col-md-9" style="background-color:#b8c7ce;" >
            <h2>Request For Meeting Reservation</h2>
             <hr>
                <form method="post" action="meetingResFormSubmit" id="meetingsReservationForm" autocomplete="off">
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
                                          <input type="text" id="dateFrom" name="dateFrom" class="date-pick " size="40">
                                          <div class="error alert-danger" id="errorDateFrom" >{{ $errors->first('dateFrom')}}</div>
                                      </td>
                                      <td>
                                          <input type="text" id="dateTo" name="dateTo" class="date-pick" size="35">
                                          <div class="error alert-danger" id="errorDateTo">{{ $errors->first('dateTo')}}</div>
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
                                          <input name="dateFlex" id="dateFlex" type="radio" value="Yes" checked="checked" />
                                          <label for="dateFlexYes">Yes</label>
                                          </div>
                                          <div class="col-md-6" style="background-color: whitesmoke;border-left: solid #b8c7ce ">
                                          <input name="dateFlex" id="dateFlex" type="radio" value="No" />
                                          <label for="date_flex_n_id">No</label>
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
                                        <th>Number of guest rooms per night :</th>
                                        <th>Event Requirements :</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" size="40" id="noOfGuessRooms" name="noOfGuessRooms">
                                            <div class="error alert-danger" id="errorNoOfGuessRooms">{{ $errors->first('noOfGuessRooms') }}</div>
                                        </td>

                                        <td>
                                            <input name="mtnEvenReqFood" type="checkbox" id="mtnEvenReqFood" value="Yes" />
                                            <label for="mtnEvenReq">Food/Beverages</label>
                                            <input name="mtnEvenReqMedia" type="checkbox" id="mtnEvenReqMedia" value="Yes" />
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
                                            <input type="text" size="40" id="noOfGuests" name="noOfGuests">
                                            <div class="error alert-danger" id="errorNoOfGuests">{{ $errors->first('noOfGuests') }}</div>
                                        </td>
                                        <td>
                                            <input type="text" size="35" id="noOfMeetingRooms" name="noOfMeetingRooms">
                                            <div class="error alert-danger" id="errorNoOfMeetingRooms">{{ $errors->first('noOfMeetingRooms') }}</div>

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
                                        <td><input type="text" size="24" name="title" id="title"  value="{{ Session::get('userTitle') }}"></td>
                                        <td><input type="text" size="24" name="fname" id="fname"  value="{{ Session::get('userName') }}"></td>
                                        <td><input type="text" size="24" id="lnzme" name="lname" value="{{ Session::get('latsName') }}"></td>
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
                                        <td>
                                            <input type="text"  id="company" name="company" size="40">
                                            <div class="error alert-danger" id="errorCompany">{{ $errors->first('company') }}</div>
                                        </td>
                                        <td><input type="text" id="email" name="email" size="35" value="{{ Session::get('userEmail') }}"></td>
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
                                        <td><input type="text" id="country" name="country" size="79" value="{{ Session::get('userCountry') }}"></td>
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
                                        <td><input type="text" id="phone" name="phone" size="40" value="{{ Session::get('userPhone') }}"> </td>
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
                                                    <input name="phoneCall" id="phoneCall" type="radio" value="Yes" checked="checked" />
                                                    <label for="phoneCall">Yes</label>
                                                </div>
                                                <div class="col-md-3" style="background-color: whitesmoke;border-left: solid #b8c7ce ">
                                                    <input name="phoneCall" id="phoneCall" type="radio" value="No" />
                                                    <label for="phoneCall">No</label>
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
                          <input type="button" class="btn btn_full" id="btnMeetingRes" name="btnMeetingRes" style="background-color: purple" value="Send Request" onclick="popUpMsgSuccess()">
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
</div>
    <!--Reservation sucessfull pop up-->
    <div class=".ui-widget  ui-widget-overlay " id="sucessMsgPopUp" >
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-heading" style="background-color: #500a6f; color: white"> Amalya Resorts </div>

                    <input type="button" class="popup-close" id="btnSucessMsgClose" value="x">
                </div>
                <div class="panel-body col-md-12">
                    <div class="row">
                        <div class="col-md-12"></div>
                        <div class="col-md-10"></div>
                        <div class="col-md-2"></div>
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <h5>Thank you for making a reservation. We will contact you shortly to confirm the reservation details.</h5>
                            <div class="col-md-12"></div>
                            <div class="col-md-12"></div>
                            <div class="col-md-12"></div>
                        </div>
                    </div>
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


    <!-- --Scripts for pop ups-- -->
    <script src="{{asset('/client/js/jquery-1.11.2.min.js')}}"></script>
    <script src="{{asset('/client/js/jquery-ui.min.js')}}"></script>

    <script>
        function popUpMsgSuccess() {

            var noOfGuessRooms = $("#noOfGuessRooms").val();
            var noOfGuests = $("#noOfGuests").val();
            var noOfMeetingRooms = $("#noOfMeetingRooms").val();
            var company = $("#company").val();
            var dateTo = $("#dateTo").val();
            var dateFrom = $("#dateFrom").val();

            validateRequest();

       function validateRequest() {
           var validnoOfGuessRooms = validateNumbers("errorNoOfGuessRooms", noOfGuessRooms, "Number of guests rooms")
           var validnoOfGuests = validateNumbers("errorNoOfGuests", noOfGuests, "Number of guests")
           var validnoOfMeetingRooms = validateNumbers("errorNoOfMeetingRooms", noOfMeetingRooms, "Number of meeting rooms");
           var InvalidCompany = isEmpty("errorCompany", company, "Company")
           var validDateTo = validateResDate("errorDateFrom", dateTo)
           var validDateFrom = validateResDate("errorDateTo", dateFrom)

           if (validnoOfGuessRooms && validnoOfGuests &&  validnoOfMeetingRooms && (!InvalidCompany) && validDateTo && validDateFrom ) {
               $(function () {
                   var dialog,

                           dialog = $("#sucessMsgPopUp").dialog({
                               autoOpen: false,
                               modal: true,

                           });

                   $("#btnMeetingRes").button().on("click", function () {
                       dialog.dialog("open");


                       $(".wrap").css({
                           overflow: 'hidden',
                           opacity: .3,

                       });
                       $("body").css({
                           backgroundColor: 'dimgray'

                       });
                   });

                   $("#btnSucessMsgClose").button().on("click", function () {
                       dialog.dialog("close");
                       $(".wrap").css({
                           opacity: 1
                       });
                       $("body").css({
                           backgroundColor: ''

                       });
                       $('#meetingsReservationForm').submit();

                   });


               });

           }
           else{

               $("#errorCompany").val(validCompany);
           }


           //Validate empty fields
           function isEmpty(errorCls, val, field) {
               if (val == "") {
                   $("#" + errorCls).text(field + " field cannot be empty!");
                   return true;
               }
               else {
                   $("#" + errorCls).text("");
                   return false;
               }

           }


           //validate numbers
           function validateNumbers(errorCls, val, field) {
               if (!isEmpty(errorCls, val, field)) {
                   var isNum = /^[1-9]\d*$/;
                   if (!(isNum.test(val))) {
                       $("#" + errorCls).text(field + " field should be a positive number. ");
                       return false;
                   }
                   else {
                       $("#" + errorCls).text("");
                       return true;
                   }
               }
           }

           //validate reservation date
           function validateResDate(errorCls, val) {
               if (val == "") {
                   $("#" + errorCls).text("Please select a date for reservation");
                   return false;
               }
               else {
                   $("#" + errorCls).text("");
                   return true;
               }
           }

       }


        }
    </script>

<!--Script for date Picker -->
<script>
    // set default dates
    var start = new Date();
    // set end date to max one year period:
    var end = new Date(new Date().setYear(start.getFullYear()+1));

    $('#dateFrom').datepicker({
        startDate : start,
        endDate   : end
        // update "toDate" defaults whenever "fromDate" changes
    }).on('changeDate', function(){
        // set the "toDate" start to not be later than "fromDate" ends:
        $('#dateTo').datepicker('setStartDate', new Date($(this).val()));
    });

    $('#dateTo').datepicker({
        startDate : start,
        endDate   : end
        // update "fromDate" defaults whenever "toDate" changes
    }).on('changeDate', function(){
        // set the "fromDate" end to not be later than "toDate" starts:
        $('#dateFrom').datepicker('setEndDate', new Date($(this).val()));
    });
</script>


@stop