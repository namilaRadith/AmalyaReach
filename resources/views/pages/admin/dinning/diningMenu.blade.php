@extends('admin_master_page')
@section('css_ref')
@parent
   <style>
       .ui-widget-overlay {
           display:none;
           position:fixed;
           top:250px;
           left:520px;
           right:460px;

       }
       .popup-close {
           width:30px;
           height:30px;
           padding-top:4px;
           position:absolute;
           top:1px;
           right:10px;
           transform:translate(50%, -50%);
           border-radius:1000px;
           background:rgba(0,0,0,0.8);
           font-family:Arial, Sans-Serif;
           font-size:20px;
           text-align:center;
           line-height:100%;
           color:#fff;
       }

       .ui-dialog .ui-dialog-titlebar {
           display: none;
       }
   </style>


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
           <form method="post" action="poolFormSubmit" id=""><input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="panel panel-default">
                   <div class="panel-heading" style=" background-color:#00a7d0;color: white ">SeaFood</div>
                   <div class="panel-body">
                       <table class="table table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat1 as $diningMenuCat1 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat1->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat1->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat1->id)}}"> <img src="{{asset('client/img/static_edit_row_icon.gif')}}" alt="" class="img-responsive"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat1->id.'/delete')}}"> <img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive" style="height: 25px"></a>
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
                       <table class="table table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat2 as $diningMenuCat2 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat2->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat2->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat2->id)}}.00"> <img src="{{asset('client/img/static_edit_row_icon.gif')}}" alt="" class="img-responsive"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat2->id.'/delete')}}"> <img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive" style="height: 25px"></a>

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
                       <table class="table table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat3 as $diningMenuCat3 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat3->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat3->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat3->id)}}"> <img src="{{asset('client/img/static_edit_row_icon.gif')}}" alt="" class="img-responsive" style="height: 25px"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat3->id.'/delete')}}"> <img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive" style="height: 25px"></a>
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
                       <table class="table table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat4 as $diningMenuCat4 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat4->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat4->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat4->id)}}"> <img src="{{asset('client/img/static_edit_row_icon.gif')}}" alt="" class="img-responsive" style="height: 25px"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat4->id.'/delete')}}"> <img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive" style="height: 25px"></a>
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
                       <table class="table table-striped">
                           <tr>
                               <th>Name</th>
                               <th>Price(Rs)</th>
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat5 as $diningMenuCat5 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat5->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat5->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat5->id)}}"> <img src="{{asset('client/img/static_edit_row_icon.gif')}}" alt="" class="img-responsive" style="height: 25px"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat5->id.'/delete')}}"> <img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive" style="height: 25px"></a>
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
                               <th>Edit/Delete Item</th>
                           </tr>
                           @foreach($diningMenuCat6 as $diningMenuCat6 )
                               <tr>
                                   <div class="row">
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat6->itemName}}</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>{{$diningMenuCat6->price}}.00</td>
                                       </div>
                                       <div class="col-sm-4">
                                           <td>
                                               <div class="row">
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat6->id)}}"> <img src="{{asset('client/img/static_edit_row_icon.gif')}}" alt="" class="img-responsive" style="height: 25px"></a>
                                                   </div>
                                                   <div class="col-md-2">
                                                       <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat6->id.'/delete')}}"> <img src="{{asset('client/img/images.jpg')}}" alt="" class="img-responsive" style="height: 25px"></a>
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
          </form>
       </div>
    </div>
</div>
</div>

<div class=".ui-widget  ui-widget-overlay " id="confirmDeletePopUp" style="height: 10px;width:10px">
    <form id="frmDeleteConfirm" method="post" action="">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-heading" style="background-color: #500a6f; color: white"> Amalya Resorts </div>
                <input type="button" class="popup-close" id="confirmClose" value="x">
                <div class="panel-body col-md-10">
                    <div class="row">
                    <div class="col-md-1"></div>
                        <div class="col-md-12">
                    <h5><B>Do you really want to proceed with delete?</B></h5>
                    </div>
                    </div>
                  <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-4">
                    <input type="button" class="btn_1 btn_full" id="btnDeleteYes" name="btnDeleteYes" value="Yes" style="width: 90px;background-color:mediumpurple;color: white ">
                      </div>
                      <div class="col-md-4">
                      <input type="button" class="btn_1 btn_full" id="btnDeleteNo" name="btnDeleteNo" value="No" style="width: 90px;background-color:mediumpurple;color: white" >
                      </div>
                  </div>
                </div>
            </div>
          </div>
    </div>
  </form>
</div>





@stop
@section('js_ref')
    @parent
        <!-- --Scripts for pop ups-- -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--

    <script>
        function popUpDeleteFunction(val) {
            var id = $(val).attr('id')
            $(function () {
                var dialog,

                        dialog = $("#confirmDeletePopUp").dialog({
                            autoOpen: false,
                            modal: true,

                        });

                $("#" + id).button().on("click", function () {
                    dialog.dialog("open");


                    $(".wrap").css({
                        overflow: 'hidden',
                        opacity: .3,
                    });

                    $("body").css({
                        backgroundColor:'rgb(0,0,0)'

                    });
                });

                $("#confirmClose").button().on("click", function () {
                    dialog.dialog("close");
                    $(".wrap").css({
                        opacity: 1
                    });

                    $("body").css({
                        backgroundColor:''

                    });
                });


                $("#btnDeleteNo").button().on("click", function () {
                    dialog.dialog("close");
                    $(".wrap").css({
                        opacity: 1
                    });

                    $("body").css({
                        backgroundColor:''

                    });
                })

                $("#btnDeleteYes").button().on("click", function () {
                    $('#frmDeleteConfirm').submit();
                    dialog.dialog( "close" );

                });

            });
        }
    </script>

-->


@stop