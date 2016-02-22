@extends('admin_master_page')
@section('css_ref')
    @parent

@stop
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Upload Image </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{action('AdminDashboardController@uploadImageToGallery')}}" method="post"
                  enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image Title</label>
                        <input type="text" class="form-control" name="imageTitle" id="imageTitle"
                               placeholder="Enter title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Choose image</label>
                        <input input type="file" name="image" id="image">
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



    </div>

    <div class="col-md-9 col-sm-9">

        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Upload Image </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{action('AdminDashboardController@updateAboutUsBasics')}}" method="post"
                 >
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Header</label>
                        <input type="text" class="form-control" name="mainTitle" id="mainTitle"
                               placeholder="Enter title" value="{{$aboutUs{0}->header}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="5"   placeholder="Enter ..." name="mainDescription" id="mainDescription" >{{$aboutUs{0}->description}}</textarea>
                    </div>



                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

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


    </div>
</div>

<div class="row">
    <div class="content">
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Image Descriptions</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form">
            <div class="box-body">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>+</h3>

                            <p>Add New Dinning Menu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="" data-toggle="modal" data-target="#myModal2" class="small-box-footer">
                            Click Here <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add New Image Description </h4>
                            </div>
                            <div class="modal-body">
                               <form role="form" action="{{action('AdminDashboardController@uploadImageToGallery')}}" method="post"
                                enctype="multipart/form-data">
                                   <div class="form-group">
                                       <label for="exampleInputEmail1">Image Header</label>
                                       <input type="text" class="form-control" name="imageTitle" id="imageTitle"
                                              placeholder="Enter title">
                                   </div>

                                   <div class="form-group">
                                       <label>Image Description</label>
                                       <textarea class="form-control" rows="5" placeholder="Enter ..."></textarea>
                                   </div>

                                   <div class="form-group">
                                       <label for="exampleInputFile">Choose image</label>
                                       <input input type="file" name="image" id="image">
                                       <input type="hidden" value="{{csrf_token()}}" name="_token">
                                   </div>


                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>44</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer"data-toggle="modal" data-target="#myModal">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>




                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">

            </div>

    </div>
    <!-- /.box -->
</div>
</div>


    <div class="row">
        <div class="content">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Freture Descriptions</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">

                        <dsiv class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>+</h3>

                                    <p>Add New Freture Description</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="" data-toggle="modal" data-target="#myModal3" class="small-box-footer">
                                    Click Here <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </dsiv>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Add New Freture Description </h4>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="{{action('AdminDashboardController@uploadImageToGallery')}}" method="post"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Image Header</label>
                                                <input type="text" class="form-control" name="imageTitle" id="imageTitle"
                                                       placeholder="Enter title">
                                            </div>

                                            <div class="form-group">
                                                <label>Image Description</label>
                                                <textarea class="form-control" rows="5" placeholder="Enter ..."></textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputFile">Choose image</label>
                                                <input input type="file" name="image" id="image">
                                                <input type="hidden" value="{{csrf_token()}}" name="_token">
                                            </div>


                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>44</h3>

                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer"data-toggle="modal" data-target="#myModal">
                                    More info <i class="fa fa-arrow-circle-right"></i>
                                </a>




                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">

                    </div>

            </div>
            <!-- /.box -->
        </div>
    </div>



@stop
@section('js_ref')
    @parent
<script>
    function updateBasicDetails() {

        $.ajax({
            method: "POST",
            url: 'about-us/update-maintitle-description/',
            data : {
                mainTitle : $("#mainTitle").val() ,
                description : $("#mainDescription").val()
            },
            success:function(data){
                alert(data);
            }

        });

    }

</script>








@stop