@extends('admin_master_page')
@section('css_ref')
	@parent
	<script src="{{asset('/admin/plugins/angular/angular.min.js')}}"></script>


@stop

@section('content')
	<div ng-app="AmalyaReach">
		<div ng-controller="questionController">
			<form id="qf" name="qform" ng-submit="submitForm(qform.$valid)" novalidate>
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Questioners</h3> <br><br>
					<lable>Questioner Title : </lable> <input type="text" name="" id="" ng-model="questionerTitle" class="form-control" required>

				</div>
				<!-- /.box-header -->
				<div class="box-body">
					 	<div ng-repeat="item in items track by $index" >
							<div class="row">
									<div class="col-md-8">
										<div class="form-group">
											<lable>Question : @{{ $index + 1  }} </lable>
											<input type="text" name="question--@{{ $index }}" class="form-control" id="Q.ques" ng-model="item.question " required>
										</div>
									</div>

								<div class="col-md-3">
									<div class="form-group">
										<lable>Answer Type : </lable>
										<select name="questionType--@{{ $index }}" id="" class="form-control" ng-options="answerType.answerTypeID as answerType.answerTypeName for answerType in answerTypes"  required  ng-model="item.questionType">
											<option  value="">Please Select</option>

										</select>
									</div>
								</div>
								
								<div class="col-md-1">
									<br>

									<button class="btn btn-danger"  ng-click="removeItem(item)"><i class="fa fa-trash-o"></i></button>
								</div>
							</div>

						</div>

						<input type="button" value="New Question"  ng-if="isFull()"   ng-click="addQuestion()"  class="btn btn-info pull-right">

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

				<input type="submit" ng-click="sendData()" value="Create Questioners"  ng-if="!isEmpty()"  class="btn btn-success btn-lg pull-right" ng-disabled="qform.$invalid" >
			</form>




			{{--<pre> @{{ items }}</pre>--}}
			{{--<pre> @{{ questionerTitle }}</pre>--}}
		</div>
		<!-- /.ng-controller-->
	</div>

	<!-- /.ng-app-->

@stop





@section('js_ref')
	@parent
	<script src="{{ asset('/admin/plugins/validator/jquery.validate.min.js')}}"></script>
	<script src="{{ asset('/admin/scripts/angularScripts.js')}}"></script>

	<script>
		angularQuestionerHandeller('{!! csrf_token() !!}',null);
	</script>




@stop