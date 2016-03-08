@extends('admin_master_page')
@section('css_ref')
    @parent
    <link rel="stylesheet" href="{{asset('/admin/plugins/datatables/dataTables.bootstrap.css')}}">


@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Users</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User type</th>
                    <th>Registed Date</th>
                    <th>Country</th>
                    <th>Mobile</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->userType}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->country}}</td>
                        <td>{{$user->phone}}</td>

                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@stop



@section('js_ref')
    @parent

    <script src="{{asset('/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

@stop