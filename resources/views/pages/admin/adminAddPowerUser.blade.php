@extends('admin_master_page')
@section('css_ref')
	@parent


@stop

@section('content')

<!-- general form elements -->
<div class="box box-primary">
	<div class="box-header with-border">
		<h3 class="box-title">Quick Example</h3>
	</div>
	<!-- /.box-header -->
	<!-- form start -->
	<form role="form">
		<div class="box-body">
			<div class="form-group">
				<label for="exampleInputEmail1">First Name</label>
				<input type="text" class="form-control" id="fName" placeholder="Enter first name">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Last Name</label>
				<input type="text" class="form-control" id="lName" placeholder="Enter first name">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="email" placeholder="Enter first name">
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<textarea name="" id="aAddress" cols="30" class="form-control" rows="10"></textarea>
			</div>

			<div class="form-group">
				<label for="exampleInputEmail1">Phone</label>
				<input type="text" class="form-control" id="phone" placeholder="Mobile Number">
			</div>


		</div>
		<!-- /.box-body -->

		<div class="box-footer">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
</div>
<!-- /.box -->


@stop



@section('js_ref')
	@parent

@stop