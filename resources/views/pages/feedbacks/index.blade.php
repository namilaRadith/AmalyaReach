@extends('pages.feedbacks.feedbackMasterPage')

@section('feedbackContent')
    <div class="topic" xmlns:position="http://www.w3.org/1999/xhtml" xmlns:>
        <h1 style="color: #57b92c;">Feedbacks</h1>
         <div class="button" style="top: 30px; left:600px ;position:absolute">
           <center><a href="feedback/create" class="btn btn-success">Post Your Feedback</a></center>
         </div>
    </div>

    <hr>
<div class="scrollbox" style="overflow: scroll; height: 600px;">
       @foreach($feedbacks as $feedback)

        <div class="box_style_1" >
            <div class="post">
                <a href="" ><img src="" alt="" class="img-responsive"></a>
                <h3>{{$feedback->userName}}</h3>
                <div class="post_info clearfix">
                    <div class="post-left">
                        <ul>
                            <li><i class="icon-calendar-empty"></i> On <span>{{$feedback->published_at}}</span></li>
                            <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a></li>
                        </ul>
                    </div>
                    <div class="post-right"><i class="icon-comment"></i><a href="#"> </a></div>
                </div>
                <p>
                    {{$feedback->body}}
                </p>
                <a href="feedback/{{$feedback->id}}" class="btn_1" >Read more</a>
            </div><!-- end post -->
        </div>
         <hr>


    @endforeach
</div>



@stop