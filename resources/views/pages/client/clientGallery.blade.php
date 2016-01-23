@extends('clientMasterPage')
@section('css_ref')
    @parent


@stop

@section('content')

    <section class="sub_header" id="bg_general">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>Gallery page</h1>
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
            <span></span>
            <h2>Some images from travellers</h2>
            <p>
                Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
            </p>
        </div>
        <hr>
        <div class="row magnific-gallery add_bottom_60 ">
            @foreach( $imageList as $data )
                <div class="col-md-3 col-sm-3">
                    <a href="{{asset('client/img/img-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}" title="{{$data->contentDescription}}"><img src="{{asset('client/img/img-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}" alt="" class="img-responsive styled"></a>
                </div>
            @endforeach
        </div><!-- End row -->

        <div class="main_title">
            <span></span>
            <h2>Some videos from travellers</h2>
            <p>
                Quisque at tortor a libero posuere laoreet vitae sed arcu. Curabitur consequat.
            </p>
        </div>
        <hr>
        <div class="row magnific">
            <div class="col-md-4 col-sm-4">
                <a href="https://vimeo.com/45830194" class="video" title="Video Vimeo"><img src="{{asset('client/img/pic_1.jpg')}}" alt="" class="img-responsive styled"></a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="https://www.youtube.com/watch?v=Zz5cu72Gv5Y" class="video" title="Video Youtube"><img src="{{asset('client/img/pic_2.jpg')}}" alt="" class="img-responsive styled"></a>
            </div>
            <div class="col-md-4 col-sm-4">
                <a href="https://vimeo.com/45830194" class="video" title="Video Vimeo"><img src="{{asset('client/img/pic_3.jpg')}}" alt="" class="img-responsive styled"></a>
            </div>
        </div><!-- End row -->
    </div>



@stop
@section('js_ref')
@parent

@stop