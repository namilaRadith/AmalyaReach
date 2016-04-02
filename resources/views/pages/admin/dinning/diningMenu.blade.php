@extends('admin_master_page')
@section('css_ref')
@parent


@stop
@section('content_header')

    <h1>
        Dinning Menu
        <small>Dash Board</small>
    </h1>
    <ol class="breadcrumb">

    </ol>

@stop
@section('content')

<div class="wrap">
<div class="container margin_60">
    <div class="alert col-md-10" style="top: 60px;top: 5px"  >
        @if(Session::has('flash_message'))
            <div class="alert alert-warning">{{Session::get('flash_message')}}</div>

        @endif
    </div>
    <div class="row">
       <div class="col-md-10">
                         <div class="panel panel-default">
                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">SeaFood</div>
                   <div class="panel-body">
                       <table class="table table-striped table-bordered ">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Quantity</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat1 as $diningMenuCat1 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td style="width: 45%">{{$diningMenuCat1->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat1->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat1->quantitiy}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat1->id)}}" class="fa fa-pencil fa-2x"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat1->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="fa fa-trash fa-2x"></a>
                                                   </div>
                                               </div>
                                           </td>
                                       </div>
                                   </div>
                               </tr>
                           @endforeach
                       </table>
                   </div>

                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">Sandwiches</div>
                   <div class="panel-body">
                       <table class="table table-striped table-bordered">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Quantity</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat2 as $diningMenuCat2 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td style="width: 45%">{{$diningMenuCat2->itemName}}</td>
                                           </div>
                                           <div class="col-sm-4">
                                               <td>{{$diningMenuCat2->price}}.00</td>
                                           </div>
                                           <div class="col-sm-4">
                                               <td>{{$diningMenuCat2->quantitiy}}</td>
                                           </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat2->id)}}" class="fa fa-pencil fa-2x"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat2->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="fa fa-trash fa-2x"></a>
                                                   </div>
                                               </div>
                                           </td>
                                       </div>
                                   </div>
                               </tr>
                           @endforeach
                       </table>
                   </div>

                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">Coffee</div>
                   <div class="panel-body">
                       <table class="table table-bordered table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Quantity</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat3 as $diningMenuCat3 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td style="width: 47%">{{$diningMenuCat3->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat3->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat3->quantitiy}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat3->id)}}" class="fa fa-pencil fa-2x"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat3->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="fa fa-trash fa-2x"></a>
                                                   </div>
                                               </div>
                                           </td>
                                       </div>
                                   </div>
                               </tr>
                           @endforeach
                       </table>
                   </div>


                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">Pizza</div>
                   <div class="panel-body">
                       <table class="table table-striped table-bordered">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Quantity</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat5 as $diningMenuCat5 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td style="width: 35%">{{$diningMenuCat5->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat5->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat5->quantitiy}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat5->id)}}" class="fa fa-pencil fa-2x"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat5->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="fa fa-trash fa-2x"></a>
                                                   </div>
                                               </div>
                                           </td>
                                       </div>
                                   </div>
                               </tr>
                           @endforeach
                       </table>
                   </div>

                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">Pasta</div>
                   <div class="panel-body">
                       <table class="table table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Quantity</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat6 as $diningMenuCat6 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td style="width: 45%">{{$diningMenuCat6->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat6->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat6->quantitiy}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat6->id)}}" class="fa fa-pencil fa-2x"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat6->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="fa fa-trash fa-2x"> </a>
                                                   </div>
                                               </div>
                                           </td>
                                       </div>
                                   </div>
                               </tr>
                           @endforeach
                       </table>
                   </div>



                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">Frid Rice</div>
                   <div class="panel-body">
                       <table class="table table-bordered table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Quantity</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat4 as $diningMenuCat4 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td style="width: 45%">{{$diningMenuCat4->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat4->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td style="width: 45%">{{$diningMenuCat4->quantitiy}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat4->id)}}" class="fa fa-pencil fa-2x"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat4->id.'/delete')}}" onclick="return confirm('Are you sure you want to delete?')" class="fa fa-trash fa-2x"></a>
                                                   </div>
                                               </div>
                                           </td>
                                       </div>
                                   </div>
                               </tr>
                           @endforeach
                       </table>
                   </div>

               </div>
       </div>
    </div>
</div>
</div>





@stop
@section('js_ref')
    @parent
        <!-- --Scripts for pop ups-- -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--<script>
    $(document).ready(function() {
        $('a[data-confirm]').click(function(ev) {
            var href = $(this).attr('href');
            if (!$('#dataConfirmModal').length) {
                $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
            }
            $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show:true});
            return false;
        });
    });


</script> -->


@stop