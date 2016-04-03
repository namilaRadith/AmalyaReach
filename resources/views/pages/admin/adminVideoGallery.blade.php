@extends('admin_master_page')
@section('css_ref')
    @parent
    <link href="{{asset('/client/css/magnific-popup.css')}}" rel="stylesheet">

@stop

@section('content')







    <div class="row magnific-gallery add_bottom_60 ">
        <!-- left column -->
        <div class="col-md-3 col-sm-3">

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Upload Video </h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" id="videoUploadForm" action="{{action('AdminDashboardController@uploadVideoToGallery')}}" method="post"
                      enctype="multipart/form-data" files=true >
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Video Title</label>
                            <input type="text" class="form-control" name="videoTitle" id="videoTitle"
                                   placeholder="Enter title">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Choose video</label>
                            <input input type="file" name="video" id="video">
                            <input type="hidden" value="{{csrf_token()}}" name="_token">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
                        <input type="hidden" value="{{csrf_token()}}" name="_token">

                        @if( $errors->any())
                            <div class="alert alert-danger" role="alert" style="margin-top: 2em;">

                                @foreach($errors -> all() as $error)
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <span class="sr-only">Error:</span>
                                    {{ $error }}<br/>

                                @endforeach

                            </div>
                        @endif

                    </div>
                </form>
            </div>
            <script>


            </script>
            <!-- /.box -->
        </div>


        <div class="col-md-9">
            <div class="row magnific">
                @foreach( $videoList as $data )
                    <div class="col-md-4 col-sm-4">
                        <a href="{{asset('client/video/vid-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}" title="{{$data->contentDescription}}" class="video"><img src="{{asset('client/img/pic_1.jpg')}}" alt="" class="img-responsive styled"></a>
                        <br>
                        <button class="btn btn-danger" onclick="deleteImage({{$data->id}})"><i class="fa fa-trash"></i></button>

                    </div>
                @endforeach
            </div><!-- End row -->
        </div>
    </div><!-- End row -->

@stop



@section('js_ref')
    @parent
    {{--magnific-popup--}}
    <script src="{{ asset('/client/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('/admin/plugins/validator/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/admin/plugins/validator/additional-methods.min.js')}}"></script>
    <script>
        $(function(){
                'use strict';
                $('.video').magnificPopup({type:'iframe'});
        });

        //valicate input
        $(document).ready(function () {
            $('#videoUploadForm').validate({
               rules : {
                   videoTitle: {
                       required: true,
                       pattern: "^[a-zA-Z0-9]*$"
                   },

                   video: {
                       required: true,
                       extension:"mp4|ogv"
                   }


               },

                messages:{
                    videoTitle: {
                        required: "title cant be empty",
                        pattern: "special characters not allowed"
                    },

                    video: {
                        required: "please select a video file",
                        extension:"video file format should be mp4 or ogv"
                    }

                }
            });




        });


        //delete image
        function deleteImage(id) {
            swal({
                title: "Are you sure?",
                text: "Selected video will be removed from the server permanently",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            }, function (isConfirm) {
                if (isConfirm) {
                    deleteNow(id);

                } else {
                    swal("Cancelled", "Operation aborted", "error");
                }
            });

        };

        //trigger delete
        function deleteNow(id){
            $.ajax({
                method: "GET",
                url: 'vd-gallery/delete/' + id,
                success: function (data) {
                    location.reload(true);
                    swal("Deleted!", "Selected video was successfully deleted.", "success");
                },
                error: function(d) {
                    swal("Error", "Operation was fail due to internal error ", "error");
                }

            });
        };

    </script>




@stop