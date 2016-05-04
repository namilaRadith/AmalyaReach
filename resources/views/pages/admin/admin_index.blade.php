@extends('admin_master_page')
@section('css_ref')
	@parent


@stop

@section('content')



	@foreach( Q::presentQuestioner() as $ds)

		{{--@for($i = 0;$i <= sizeof(Q::presentQuestioner());$i++)--}}

		{{--{{ $ds[$i]->creator_id}}--}}

		{{--@endfor--}}

		{{$ds['creator_id']}}
	@endforeach

@stop



@section('js_ref')
	@parent

@stop