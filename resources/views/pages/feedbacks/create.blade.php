@extends('pages.feedbacks.feedbackMasterPage')

@section('feedbackContent')


    <h1 style="color: #0f3e68">Post your Feedback</h1>


    <div class="box_style_1">

        <div class="form-group">

            {!! Form::Open(['url'=>'feedback']) !!}

            {!!Form::label('userName','Name:')  !!}
            {!!Form::text('userName',null,['class'=>'form-control'])  !!}

        </div>

        <div class="form-group">

            {!! Form::Open() !!}

            {!!Form::label('body','Feedback:')  !!}
            {!!Form::textarea('body',null,['class'=>'form-control'])  !!}

        </div>

        {!! Form::submit('Post Feedback',['class' => 'btn_1']) !!}

        {!! Form::Close() !!}



    </div><!-- End col-md-9-->

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach

        </ul>
    @endif



@stop