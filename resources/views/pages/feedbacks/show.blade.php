@extends('pages.feedbacks.feedbackMasterPage')

@section('feedbackContent')

    <div class="topic" xmlns:position="http://www.w3.org/1999/xhtml" xmlns:>
        <h1 style="color: #57b92c;">Feedbacks</h1>
        <div class="button" style="top: 30px; left:600px ;position:absolute">
            <center><a href="create" class="btn btn-success">Post Your Feedback</a></center>
        </div>
    </div>
    <div class="box_style_1">
        <div class="post">
            <a href="blog_post.html" ><img src="img/blog-3.jpg" alt="" class="img-responsive"></a>
            <h3>{{$feedbacks->UserName}}</h3>
            <div class="post_info clearfix">
                <div class="post-left">
                    <ul>
                        <li><i class="icon-calendar-empty"></i> On <span>{{$feedbacks->published_at}}</span></li>
                        <li><i class="icon-inbox-alt"></i> In <a href="#">Top tours</a></li>
                    </ul>
                </div>
                <div class="post-right"><i class="icon-comment"></i><a href="#">25 </a></div>
            </div>
            <p>
                {{$feedbacks->body}}
            </p>

        </div><!-- end post -->
    </div>
    <hr>

@stop