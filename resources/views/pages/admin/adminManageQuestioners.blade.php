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
                    <th>Questioner Title</th>
                    <th>Publish Status</th>
                    <th>Created at </th>
                    <th width="1">View</th>
                    <th width="1">Publish</th>
                    <th width="1">Edit</th>
                    <th width="1">Delete</th>
                </tr>
                </thead>

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
                    <th width="20">#</th>
                    <th>Question</th>
                    <th width="3">Answering Type</th>

                </tr>
                </thead>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@stop



@section('js_ref')
    @parent

    <script src="{{asset('/admin/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/scripts/manageQuestionerScripts.js')}}"></script>

@stop