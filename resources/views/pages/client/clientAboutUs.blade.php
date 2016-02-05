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
                <h1>About</h1>
                <p>
                    Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
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
                <img src="{{asset('/client/img/best_price.')}}png" alt="">
            </p>
            <span></span>
            <h2>{{$aboutUs{0}->header}}</h2>
            <p class="lead">{{$aboutUs{0}->description}}</p>

        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <img src="{{asset('/client/img/about_1.jpg')}}" alt="" class="img-responsive styled">
                        <h3>A beatiful contest</h3>
                        <p>
                            Esse dicit accusam duo an. Modus simul ei nec. Sea et explicari pertinacia, <strong>cu vitae bonorum</strong> vocibus nec, corpora signiferumque no vim. Ad principes scriptorem duo, te omnium gubergren eam, et eam ancillae appareat dissentiet. Quando tantas animal vis ut, mandamus voluptatum duo ne, ne odio vidit commodo has.
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="{{asset('/client/img/about_2.jpg')}}" alt="" class="img-responsive styled">
                        <h3>Charming rooms</h3>
                        <p>
                            Esse dicit accusam duo an. Modus simul ei nec. Sea et explicari pertinacia, <strong>cu vitae bonorum</strong> vocibus nec, corpora signiferumque no vim. Ad principes scriptorem duo, te omnium gubergren eam, et eam ancillae appareat dissentiet. Quando tantas animal vis ut, mandamus voluptatum duo ne, ne odio vidit commodo has.
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="{{asset('/client/img/about_3.jpg')}}" alt="" class="img-responsive styled">
                        <h3>Enjoy and relax</h3>
                        <p>
                            Esse dicit accusam duo an. Modus simul ei nec. Sea et explicari pertinacia, <strong>cu vitae bonorum</strong> vocibus nec, corpora signiferumque no vim. Ad principes scriptorem duo, te omnium gubergren eam, et eam ancillae appareat dissentiet.
                        </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <img src="{{asset('/client/img/about_4.jpg')}}" alt="" class="img-responsive styled">
                        <h3>Country activities</h3>
                        <p>
                            Esse dicit accusam duo an. Modus simul ei nec. Sea et explicari pertinacia, <strong>cu vitae bonorum</strong> vocibus nec, corpora signiferumque no vim. Ad principes scriptorem duo, te omnium gubergren eam, et eam ancillae appareat dissentiet.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="feat" id="about">
                    <li>
                        <i class="icon_set_1_icon-86"></i>
                        <h4>Free wifi</h4>
                        <p>
                            Eum purto epicurei cotidieque at, ius luptatum invidunt no, vim at sint pertinacia repudiandae. Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has.
                        </p>
                    </li>
                    <li>
                        <i class="icon_set_2_icon-110"></i>
                        <h4>Swimming pool</h4>
                        <p>
                            Eum purto epicurei cotidieque at, ius luptatum invidunt no, vim at sint pertinacia repudiandae. Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has.
                        </p>
                    </li>
                    <li>
                        <i class="icon_set_1_icon-58"></i>
                        <h4>Restaurant</h4>
                        <p>
                            Eum purto epicurei cotidieque at, ius luptatum invidunt no, vim at sint pertinacia repudiandae. Ad cum dicant laboramus delicatissimi, ex has nonumes explicari prodesset, brute tincidunt conclusionemque no has.
                        </p>
                    </li>
                </ul>
            </div>
        </div><!-- End Row -->
        <hr>
        <div id="testimonials">
            <div class='row'>
                <div class='col-md-offset-1 col-md-10'>
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#quote-carousel" data-slide-to="1"></li>
                            <li data-target="#quote-carousel" data-slide-to="2"></li>
                        </ol><!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner">
                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <img class="img-circle" src="{{ asset('/client/img/testimonial_1.jpg')}}" alt="">
                                    <p>
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris."
                                    </p>
                                    <small>Someone famous</small>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <img class="img-circle" src="{{ asset('/client/img/testimonial_1.jpg')}}" alt="">
                                    <p>
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris."
                                    </p>
                                    <small>Someone famous</small>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <img class="img-circle" src="{{ asset('/client/img/testimonial_1.jpg')}}" alt="">
                                    <p>
                                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum elit in arcu blandit, eget pretium nisl accumsan. Sed ultricies commodo tortor, eu pretium mauris."
                                    </p>
                                    <small>Someone famous</small>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End row -->
        </div><!-- End testimonials -->

        <div class="main_title add_bottom_45">
            <span></span>
            <h2>Weather forecast</h2>
            <p>
                Ad principes scriptorem duo, te omnium gubergren eam, et eam ancillae appareat dissentiet.
            </p>
        </div>
        <div id="weather" class="clearfix"></div><!-- Weather widget -->
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