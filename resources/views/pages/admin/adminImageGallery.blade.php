@extends('admin_master_page')
@section('css_ref')
    @parent
    <link href="{{asset('/client/css/magnific-popup.css')}}" rel="stylesheet">

@stop

@section('content')







    <div class="row magnific-gallery add_bottom_60 ">
        {{--<div class="col-md-3 col-sm-3">--}}
            {{--<form action = "{{action('AdminDashboardController@uploadImageToGallery')}}" method="post" enctype="multipart/form-data">--}}
                {{--<input type="file" name="image" class="btn btn-default" >--}}
                {{--<input type="submit" name="submit"  class="btn btn-default">--}}
                {{--<input type="hidden" value="{{csrf_token()}}" name="_token">--}}
            {{--</form>--}}
        {{--</div>--}}

        <!-- left column -->
        <div class="col-md-3 col-sm-3">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Image </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" action = "{{action('AdminDashboardController@uploadImageToGallery')}}" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Image Title</label>
                            <input type="text" class="form-control" name="contentTitle" id="exampleInputEmail1" placeholder="Enter title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Choose image</label>
                            <input input type="file" name="image">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit"  class="btn btn-primary">Upload</button>
                        <input type="hidden" value="{{csrf_token()}}" name="_token">
                    </div>
                </form>
            </div>
            <!-- /.box -->
         </div>




    @foreach( $imageList as $data )
        <div class="col-md-3 col-sm-3">
            <a href="{{asset('client/img/img-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}" title="{{$data->contentDescription}}"><img src="{{asset('client/img/img-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}" alt="" class="img-responsive styled"></a>
        </div>
    @endforeach

    </div><!-- End row -->

@stop



@section('js_ref')
    @parent
    {{--magnific-popup--}}
    <script src="{{ asset('/client/js/jquery.magnific-popup.min.js')}}"></script>
    <script>
        $('.magnific-gallery').each(function() {
            'use strict';
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery:{enabled:true}
            });
        });

    </script>




@stop