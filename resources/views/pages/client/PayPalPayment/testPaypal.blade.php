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
    </div>

    <div class="container margin_60">
        <div class="row">
            <h1>PayPal Test</h1>
            <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

                <!-- Identify your business so that you can collect the payments. -->
                <input type="hidden" name="business" value="sameerachandrasena-facilitator@gmail.com">

                <!-- Specify a Buy Now button. -->
                <input type="hidden" name="cmd" value="_xclick">

                <!-- Specify details about the item that buyers will purchase. -->
                <input type="hidden" name="item_name" value="Roommmm">
                <input type="hidden" name="amount" value="100">
                <input type="hidden" name="currency_code" value="USD">

                <!-- Display the payment button. -->
                <input type="image" name="submit" border="0"
                       src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                       alt="PayPal - The safer, easier way to pay online">
                <img alt="" border="0" width="1" height="1"
                     src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

            </form>
        </div>
    </div>




    @stop

    @section('js_ref')
    @parent

            <!-- Specific scripts -->
    <script src="{{asset('/client/js/quantity-bt.js')}}"></script>
    <script src="{{asset('/client/js/bootstrap-datepicker.js')}}"></script>
    <script>$('input.date-pick').datepicker();</script>

@stop