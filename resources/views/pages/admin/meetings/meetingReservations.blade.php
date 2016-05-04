@extends('admin_master_page')
@section('css_ref')
    @parent

    <style>
        .fa-refresh
        {
            color: darkorange;
            font-size: 1.2em;
        }

        .fa-check-circle
        {
            color:#0066cc;
            font-size: 1.2em;
        }

        .fa-circle
        {
            color: red;
        }
        .fa-ban
        {
            color: peru;
            font-size: 1.2em;
        }

        .fa-times-circle
        {
            color: black;
            font-size: 1.2em;
        }

    </style>

@stop

@section('content_header')

    <h1>
        Meetings reservations
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop

@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All Reservations</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <table id="admineetinResTbl" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Flag</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Date From </th>
                    <th>Date To</th>
                    <th>No of Guests</th>
                    <th>Request Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $meetingsRes as $meetingsRes )
                    @if(($meetingsRes->resStatus)== "Not Viewed")
                        <tr class="newRes"   >
                    @else
                        <tr>
                            @endif
                            @if(($meetingsRes->resStatus)== "Pending")
                                <td><span><i class="fa fa-refresh "></i></span></td>

                            @elseif(($meetingsRes->resStatus)== "Accepted")
                                <td><span ><i class="fa fa-check-circle"></i></span></td>
                            @elseif(($meetingsRes->resStatus)== "Closed")
                                <td><span ><i class="fa fa-ban"></i></span></td>
                            @elseif(($meetingsRes->resStatus)== "Rejected")
                                <td><span ><i class="fa fa-times-circle"></i></span></td>

                            @else
                                <td><span class="fa-stack fa " style="font-size: 0.7em;">
                                                                      <i class="fa fa-circle fa-stack-2x"></i>
                                                                      <i class="fa fa-flag fa-stack-1x fa-inverse"></i>
                                                                    </span>
                                </td>
                            @endif


                            <td>{{ $meetingsRes->name }}</td>
                            <td>{{ $meetingsRes->company }}</td>
                            <td>{{ $meetingsRes->dateFrom }}</td>
                            <td>{{ $meetingsRes->dateTo }}</td>
                            <td>{{ $meetingsRes->noOfGuests }}</td>
                            @if(($meetingsRes->resStatus)== "Pending")
                                <td> <label class="label label-warning">{{ $meetingsRes->resStatus}}</label>
                                </td>
                            @elseif(($meetingsRes->resStatus)== "Accepted")
                                <td> <span class="label label-primary" >{{ $meetingsRes->resStatus}}</span>
                                </td>
                            @elseif(($meetingsRes->resStatus)== "Closed")
                                <td> <span class="label " style="background-color: peru" >{{ $meetingsRes->resStatus}}</span>
                                </td>
                             @elseif(($meetingsRes->resStatus)== "Not Viewed")
                                <td> <span class="label label-danger" >{{ $meetingsRes->resStatus}}</span>
                                </td>
                                @else
                                    <td> <span class="label" style="background-color:black" >{{ $meetingsRes->resStatus}}</span>
                            @endif

                            <td>
                                <a href="{{URL::to('meetingRes/viewRes/'.$meetingsRes->id)}}" id="btnView">
                                    <span class="label label-success" >View More</span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
                <tfoot>
                </tfoot>
            </table>
        </div><!-- /.box-body -->
    </div>



@stop



@section('js_ref')
    @parent





@stop