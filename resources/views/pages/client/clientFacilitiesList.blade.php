@extends('clientMasterPage')
@section('css_ref')
    @parent


@stop

@section('content')


    <section class="sub_header" id="bg_general">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>All Activities</h1>
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
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <section class="box_cat_wp">
                            <div class="box_cat cat-hover">
                                <a href="horses.html" class="cat-overlay">
                                    <h2>Horses</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, postulant adipiscing dissentiunt nec no, ius ea illud soluta salutandi. Ex vis impetus nostrud, his id magna munere blandit. Ea duo error putent constituam, dicit elitr regione quo id, at euismod recteque mei...
                                    </p>
                                    <span class="box_cat_bt">Read more</span>
                                </a>
                                <div class="cat-img">
                                    <img src="{{asset('/client/img/activities_3.jpg')}}" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <section class="box_cat_wp">
                            <div class="box_cat cat-hover">
                                <a href="local_food.html" class="cat-overlay">
                                    <h2>Discover Typical foods</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, postulant adipiscing dissentiunt nec no, ius ea illud soluta salutandi. Ex vis impetus nostrud, his id magna munere blandit. Ea duo error putent constituam, dicit elitr regione quo id, at euismod recteque mei...
                                    </p>
                                    <span class="box_cat_bt">Read more</span>
                                </a>
                                <div class="cat-img">
                                    <img src="{{asset('/client/img/activities_2.jpg')}}" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <section class="box_cat_wp">
                            <div class="box_cat cat-hover">
                                <a href="cooking.html" class="cat-overlay">
                                    <h2>Cooking Local foods</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, postulant adipiscing dissentiunt nec no, ius ea illud soluta salutandi. Ex vis impetus nostrud, his id magna munere blandit. Ea duo error putent constituam, dicit elitr regione quo id, at euismod recteque mei...
                                    </p>
                                    <span class="box_cat_bt">Read more</span>
                                </a>
                                <div class="cat-img">
                                    <img src="{{asset('/client/img/activities_1.jpg')}}" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-6">
                        <section class="box_cat_wp">
                            <div class="box_cat cat-hover">
                                <a href="farm.html" class="cat-overlay">
                                    <h2>Farm activities</h2>
                                    <p>
                                        Lorem ipsum dolor sit amet, postulant adipiscing dissentiunt nec no, ius ea illud soluta salutandi. Ex vis impetus nostrud, his id magna munere blandit. Ea duo error putent constituam, dicit elitr regione quo id, at euismod recteque mei...
                                    </p>
                                    <span class="box_cat_bt">Read more</span>
                                </a>
                                <div class="cat-img">
                                    <img src="{{asset('/client/img/activities_4.jpg')}}" alt="">
                                </div>
                            </div>
                        </section>
                    </div>
                </div><!-- End row -->
            </div><!-- End col-lg-9 -->

            <div class="col-lg-3 col-md-4">
                <div class="box_style_1" id="general_facilities">
                    <h3>General facilities</h3>
                    <ul>
                        <li><i class="icon_set_1_icon-86"></i>Free Wifi</li>
                        <li><i class="icon_set_2_icon-103"></i>Loundry service</li>
                        <li><i class="icon_set_2_icon-110"></i>Swimming pool</li>
                        <li><i class="icon_set_1_icon-58"></i>Restaurant</li>
                        <li><i class="icon_set_2_icon-106"></i>Safe box</li>
                    </ul>
                    <p>His <strong>civibus tacimates</strong> ex, an quo nominavi qualisque. In erant dissentiunt vel, dicit legimus docendi an nam. Te congue perfecto eos, aliquid corrumpit ea est, eam petentium repudiandae ad.</p>
                </div>
            </div><!-- End col-lg-3 -->
        </div><!-- End row -->
    </div><!-- End Container -->



@stop
@section('js_ref')
    @parent
    <!-- Specifi scripts -->
    <script src="{{asset('client/js/mosaic.1.0.1.js')}}"></script>
    <script type="text/javascript">
        jQuery(function ($) {
            $('.cat-hover').mosaic({
                animation: 'slide'		//fade or slide
            });
        });
    </script>

@stop