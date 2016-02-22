@extends('admin_master_page')
@section('css_ref')
    @parent

@stop
@section('content')

        <!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Contact Details</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{action('AdminDashboardController@updateContactUs')}}">
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <input type="text" class="form-control" id="address" value="{{$contacts{0}->adddress}}" name="adddress" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone"  value="{{$contacts{0}->telephone}}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Fax</label>
                <input type="text" class="form-control" id="fax" name="fax" value="{{$contacts{0}->fax}}" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{$contacts{0}->mobile}}" placeholder="Enter email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Mobile</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$contacts{0}->email}}" placeholder="Enter email">
            </div>
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        </div>
    </form>
</div>
<!-- /.box -->

@stop
@section('js_ref')
    @parent






@stop