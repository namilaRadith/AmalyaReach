@extends('clientMasterPage')
@section('css_ref')
@parent
        <!-- SPECIFIC CSS -->
<link rel="stylesheet" href="{{asset('client/css/weather.css')}}" >

@stop

@section('content')



    <section class="sub_header" id="bg_general">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>Page Not Found</h1>
                <p>

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
        <div class="main_title">
            <p>

            </p>
            <span></span>
            <h2></h2>
            <p class="lead"></p>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <p style="font-size: 60px">404 Error Page</p>
                    <br>
                    <br>
                    <p style="font-size: 25px">Requested Page not found...</p>
                </div>
            </div>
        </div>
    </div>


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