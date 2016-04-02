@extends('admin_master_page')
@section('css_ref')
    @parent
    <link href="{{asset('/client/css/magnific-popup.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/admin/plugins/cropper/cropper.css')}}">



@stop

@section('content')
    <style>
        #cropContainerHeader {
            width: 200px;
            height: 150px;
            position: relative; /* or fixed or absolute */
        }


    </style>


    <!-- Large modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Upload Image
    </button>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">

        <form action="{{action('AdminDashboardController@uploadImageToGallery')}}" id="image-form" method="post"
              enctype="multipart/form-data">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Upload Image</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col col-md-4">


                                <div class="form-group">
                                    <lable>Slider Image Title</lable>
                                    <input type="text" name="imageTitle" class="form-control"
                                           id="imageTitle">
                                </div>

                                <div class="form-group">
                                    <lable>Choose a file</lable>
                                    <input type="file" name="img_pre" id="" onchange="previewFile()"> <br>
                                </div>


                                <div class="form-group"></div>

                            </div>

                            <div class="col col-md-8">
                                <input type="hidden" name="x" id="x">
                                <input type="hidden" name="y" id="y">
                                <input type="hidden" name="w" id="w">
                                <input type="hidden" name="h" id="h">
                                <input type="hidden" value="{{csrf_token()}}" name="_token">

                                <img src="{{asset('client/img/img-gallery/placeholder.jpg')}}" alt="Image preview" id="img_pre" class="img-responsive">
                                <img src="" alt="Image preview" id="img_pre_temp" class="img-responsive" style="visibility:hidden">
                            </div>

                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
        </form>

    </div>
    </div>



    <div class="row magnific-gallery add_bottom_60 ">


        <div class="col-md-9">
            @foreach( $imageList as $data )
                <div class="col-md-4 col-sm-4">
                    <a href="{{asset('client/img/img-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}"
                       title="{{$data->contentDescription}}"><img
                                src="{{asset('client/img/img-gallery')}}{{'/'.$data->contentName.'.'.$data->contentFileExtension}}"
                                alt="" class="img-responsive styled"></a>
                    <br>
                    <button class="btn btn-danger" onclick="deleteImage({{$data->id}})"><i class="fa fa-trash"></i></button>

                </div>
            @endforeach
        </div>


    </div><!-- End row -->



@stop



@section('js_ref')
    @parent
    {{--magnific-popup--}}
    <script src="{{ asset('/client/js/jquery.magnific-popup.min.js')}}"></script>
    {{--Image area select--}}
    <script src="{{ asset('/admin/plugins/cropper/cropper.js')}}"></script>
    <script src="{{ asset('/admin/plugins/validator/jquery.validate.min.js')}}"></script>
    <script src="{{ asset('/admin/plugins/validator/additional-methods.min.js')}}"></script>
    <script>


        $('.magnific-gallery').each(function () {
            'use strict';
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                gallery: {enabled: true}
            });
        });

        //image crop
        function previewFile() {
            var preview = document.getElementById('img_pre');
            var tempPreview = document.getElementById('img_pre_temp');

            var file = document.querySelector('input[type=file]').files[0];

            var reader = new FileReader();

            reader.addEventListener("load", function () {
                tempPreview.src = reader.result;


                console.log(tempPreview.naturalWidth);

                if (tempPreview.naturalWidth >= 800 && tempPreview.naturalHeight >= 533) {
                    preview.src = reader.result;
                    $("#img_pre").cropper("destroy");

                    $("#img_pre").cropper({

                        cropBoxResizable: false,
                        scalable: false,
                        zoomable: false,
                        toggleDragModeOnDblclick: false,
                        minContainerWidth: 0,
                        minContainerHeight: 0,
                        dragMode: 'none',
                        crop: function (e) {
                            // Output the result data for cropping image.
                            getCropData();
                            //                        console.log(e.x);
                            //                        console.log(e.y);
                            //                        console.log(e.width);
                            //                        console.log(e.height);
                            //                        console.log(e.rotate);
                            //                        console.log(e.scaleX);
                            //                        console.log(e.scaleY);
                        }

                    });

                    $("#img_pre").cropper("setData", {width: 800, height: 533});
                } else {
                    //alert("Please select a image which at least 1700 x 600");
                    swal("Error !", "Please select a image which at least 800 x 533", "error");
                }


            }, false);

            if (file) {
                reader.readAsDataURL(file);
            }
        }

        function getCropData() {
            var data = $("#img_pre").cropper("getData");
            //console.log(data);

            $("#x").val(data.x);
            $("#y").val(data.y);
            $("#w").val(data.width);
            $("#h").val(data.height);
        }

        //valicate input
        $(document).ready(function () {
            $("#image-form").validate({

                rules: {
                    imageTitle: {
                        required: true,
                        pattern: "^[a-zA-Z0-9]*$"
                    },



                    img_pre:{
                        required: true,
                        accept:"image/*"
                    }
                },

                messages: {
                    imageTitle: {
                        required: "filed can't be empty",
                        pattern: "Special characters are not allowed"
                    },


                    img_pre:{
                        required: "filed select a image",
                        accept:"Please upload a image file"
                    }
                }
            });
        });


        //delete image
        function deleteImage(id) {
            swal({
                title: "Are you sure?",
                text: "Selected image will be removed from the server permanently",
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
                url: 'img-gallery/delete/' + id,
                success: function (data) {
                    location.reload(true);
                    swal("Deleted!", "Selected video was successfully deleted.", "success");
                },
                error: function(d) {
                    swal("Error", "Operation was fail due to internal error ", "error");
                }

            });
        };


        setTimeout(function(){
            $('.alert').fadeOut("slow");
        },2000);



    </script>




@stop