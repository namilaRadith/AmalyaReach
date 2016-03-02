@extends('admin_master_page')
@section('css_ref')
    @parent
@stop

@section('content_header')

    <h1>
        Rooms Home
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop

@section('content')



    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Available Rooms</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="adminRoomsHomeTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $rooms as $room )
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->price }}</td>
                    <td>{{ $room->description }}</td>
                    <td>
                        <a href="adminViewRoomHistory_{{ $room->id }}">
                            <span class="label label-success">History</span>
                        </a>

                        <a href="adminUpdateRoom_{{ $room->id }}" >
                            <span class="label label-warning">Update</span>
                        </a>

                        <a href="adminRemoveRoom_{{ $room->id }}">
                            <span class="label label-danger">Remove</span>
                        </a>

                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div>



    <script>
        $("#delete").on("submit", function(){
            return confirm("Do you want to delete this item?");
        });
    </script>



@stop



@section('js_ref')
    @parent
@stop