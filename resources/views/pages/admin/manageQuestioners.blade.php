@extends('admin_master_page')
@section('css_ref')
    @parent
    <link rel="stylesheet" href="{{asset('/admin/plugins/datatables/dataTables.bootstrap.css')}}">


@stop

@section('content')
        





    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Questioners</h3>
            <a href="{{action('AdminDashboardController@showCreateQuestioners')}}" class="btn btn-info pull-right "><i class="fa fa-plus "></i> <span>Create Questioner</span> </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="questionerTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Publish</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                </tr>

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Question</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="questionsTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Publish</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Trident</td>
                    <td>Internet
                        Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                </tr>

                </tbody>
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
            $("#questionerTable").DataTable();
            $("#questionsTable").DataTable();

        });
    </script>

@stop