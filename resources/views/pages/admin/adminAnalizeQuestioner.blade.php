@extends('admin_master_page')
@section('css_ref')
    @parent


@stop

@section('content')

    {{--<pre>--}}
    {{--{{print_r($data['usersFeedBacks'][0])}}--}}
    {{--</pre>--}}

    {{--{{count($data['usersFeedBacks'])}}--}}

    {{--@foreach($data['usersFeedBacks'][0]as $d)--}}
        {{--<pre>--}}
            {{--{{print_r($d->answer)}}--}}
        {{--</pre>--}}
    {{--@endforeach--}}



    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Customer rating graph </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="chartContainer" style="height: 300px; width: 100%;">
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Questions</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($data['questions'] as $question)
                        <div class="form-group">
                            <label for="">{{$question->id}} ) {{$question->question}}</label>
                        </div>
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>

        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Customer Feed backs</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @for($j = 0; $j < count($data['usersFeedBacks']); $j++)
                        @foreach($data['usersFeedBacks'][$j]as $d)
                            <div class="form-group">
                                <label for="">"{{$d->answer}}"</label>
                            </div>
                        @endforeach
                    @endfor
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>

    </div>
@stop



@section('js_ref')
    @parent
    <script src="{{asset('/admin/plugins/canvasjs/canvasjs.min.js')}}"></script>
    <script type="text/javascript">

        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Customer rating chart"
                },
                axisY: {
                    title: "No of customers",

                },
                data: [
                    {
                        // Change type to "doughnut", "line", "splineArea", etc.
                        type: "column",
                        name: "zero stars",
                        showInLegend: true,
                        legendText: "zero stars",
                        color: "red",
                        dataPoints: [


                            @foreach($data['questions'] as $question)


                                {!!'{ label: "QNO:'.$question->id.'", y: '.$data['userCount']['QID_'.$question->id.'_rate_0'].'},'!!}


                            @endforeach
                    ]
                    },
                    { //dataSeries - second quarter

                        type: "column",
                        name: "one star",
                        showInLegend: true,
                        legendText: "one star",
                        color: "orange",

                        dataPoints: [
                            @foreach($data['questions'] as $question)


                                {!!'{ label: "QNO:'.$question->id.'", y: '.$data['userCount']['QID_'.$question->id.'_rate_1'].'},'!!}


                            @endforeach
                        ]
                    },
                    { //dataSeries - two stars

                        type: "column",
                        name: "two star",
                        showInLegend: true,
                        legendText: "two stars",
                        color: "yellow",
                        dataPoints: [
                            @foreach($data['questions'] as $question)


                                {!!'{ label: "QNO:'.$question->id.'", y: '.$data['userCount']['QID_'.$question->id.'_rate_2'].'},'!!}


                            @endforeach
                        ]
                    },
                    { //dataSeries - three stars

                        type: "column",
                        name: "three stars",
                        showInLegend: true,
                        legendText: "three stars",
                        color: "blue",
                        dataPoints: [
                            @foreach($data['questions'] as $question)


                                {!!'{ label: "QNO:'.$question->id.'", y: '.$data['userCount']['QID_'.$question->id.'_rate_3'].'},'!!}


                            @endforeach
                        ]
                    },

                    { //dataSeries - four

                        type: "column",
                        name: "four stars",
                        showInLegend: true,
                        legendText: "four stars",
                        color: "gold",
                        dataPoints: [
                            @foreach($data['questions'] as $question)


                                {!!'{ label: "QNO:'.$question->id.'", y: '.$data['userCount']['QID_'.$question->id.'_rate_4'].'},'!!}


                            @endforeach
                        ]
                    },
                    { //dataSeries - five stars

                        type: "column",
                        name: "five stars",
                        showInLegend: true,
                        legendText: "five stars",
                        color: "green",
                        dataPoints: [
                            @foreach($data['questions'] as $question)


                                {!!'{ label: "QNO:'.$question->id.'", y: '.$data['userCount']['QID_'.$question->id.'_rate_5'].'},'!!}


                            @endforeach
                        ]
                    }


                ]
            });
            chart.render();
        }
    </script>



@stop