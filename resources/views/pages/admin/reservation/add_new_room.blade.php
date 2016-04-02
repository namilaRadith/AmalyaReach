@extends('admin_master_page')
@section('css_ref')
    @parent
@stop

@section('content_header')

    <h1>
        Add New Rooms
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
                    <h3 class="box-title">Room Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->




                <form role="form" id="add_new_room_form" name="add_new_room_form" action="addNewRoomFormSubmit" method="post">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="box-body">

                        @if (Session::has('message'))
                            <div class="alert alert-info">{{ Session::get('message') }}</div>
                        @endif


                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" id="room_name" name="room_name" placeholder="Enter Room name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Room Type</label>
                                    <select class="form-control select2" id="room_type" name="room_type" style="width: 100%;">
                                        @foreach($room_types as $room_type)
                                            <option value="{{$room_type->id}}">{{$room_type->value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea class="form-control" id="room_description" name="room_description" rows="5" placeholder="Enter Room Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Room Price (USD)</label>
                                    <input type="text" class="form-control" id="room_price" name="room_price" placeholder="Enter Room Price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop



@section('js_ref')
    @parent
@stop