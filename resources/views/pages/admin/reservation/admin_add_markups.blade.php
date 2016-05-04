@extends('admin_master_page')
@section('css_ref')
    @parent
@stop

@section('content_header')

    <h1>
        Markups
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop

@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Room Markups</h3>
                </div><!-- /.box-header -->
                <!-- form start -->




                <form role="form" id="add_new_room_form" name="add_new_room_form" action="addNewMarkup" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input type="hidden" name="token" id="token" value="{{ csrf_token() }}">


                    <div class="box-body">



                            <div class="alert" style="color:red;" id="error_div_dateValidation" name="error_div_dateValidation">

                            </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room ID</label>
                                    <select class="form-control select2" id="room_id" name="room_id" style="width: 100%;"  onchange="getDetails(this.value)">
                                        @foreach($result_rooms as $r)
                                        <option value="{{ $r }}">{{ $r }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Room Type</label>
                                    <input type="text" class="form-control" id="room_type" name="room_type" placeholder="Room Type" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Room Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Room Name" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Price</label>
                                    <input type="text" class="form-control" id="room_price" name="room_price" placeholder="Room Price" readonly>
                                </div>
                            </div>
                        </div>
                            <br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">

                                        <input type="text" class="form-control" id="room_markup" name="room_markup" placeholder="Markup Percentage">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>




                    </div>
                    <div class="box-footer">

                    </div>
                </form>

                <div class="box-body">

                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>

                        <tr>
                            <th>ID</th>
                            <th>Room No</th>
                            <th>Markup Percentage</th>
                            <th>Added Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($markup_added_rooms as $r)
                            <tr>
                                <td>{{ $r->id }}</td>
                                <td>{{ $r->room_id }}</td>
                                <td>{{ $r->markup_percentage }}%</td>
                                <td>{{ $r->date }}</td>
                                <td>
                                    <a href="adminRemoveMarkup_{{ $r->id }}">
                                        <span class="label label-danger">Remove</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
</div>

            </div>
        </div>
    </div>

@stop



@section('js_ref')
    @parent


    <script type="text/javascript">

        $('#add_new_room_form').submit(function() {

           var percentage = document.getElementById("room_markup").value;

//            alert(percentage);
//            return false;
            document.getElementById('error_div_dateValidation').v
            document.getElementById('error_div_dateValidation').innerHTML = "";



            if( percentage == "" || percentage == null){

                $message = "*Please Fill Percentage Filed";

                document.getElementById('error_div_dateValidation').innerHTML = $message;
                return false;
            }else{

                if(percentage > 0){
                    return true;
                }else{
                    $message = "*Percentage should be a number";

                    document.getElementById('error_div_dateValidation').innerHTML = $message;
                    return false;
                }




            }



        });


        function getDetails(value)
        {


            var CSRF_TOKEN  = document.getElementById("token").value;



            $.ajax({
                url: 'getDetailsForMarkup_'+value,
                type: 'GET',
                data: {_token: CSRF_TOKEN},
                dataType: 'JSON',
                success: function (data) {
                    $("#room_name").val(data[0]);
                    $("#room_type").val(data[1]);
                    $("#room_price").val(data[2]);
                }
            });

        }


    </script>
@stop