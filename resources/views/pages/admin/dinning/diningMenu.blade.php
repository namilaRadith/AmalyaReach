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

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Dinning Menu</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <h2>{{ Session::get('flash_message') }}</h2>
                </div>
            @endif
            <table id="adminDinResTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th style="background-color: #3071a9 ;color: white">Sea Food</th>
                    <th style="background-color: #3071a9 ;color: white">Price(Rs)</th>
                    <th style="background-color: #3071a9 ;color: white">Quantity</th>
                    <th style="background-color: #3071a9 ;color: white">Edit/Delete Item</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diningMenuCat1 as $diningMenuCat1 )
                    <tr>
                                <td>{{$diningMenuCat1->itemName}}</td>
                                <td>{{$diningMenuCat1->price}}.00</td>
                                <td>{{$diningMenuCat1->quantitiy}}</td>
                                <td>
                                    <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat1->id)}}" id="btnEdit">
                                        <span class="label label-warning" >Edit</span>
                                    </a>
                                    <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat1->id.'/delete')}}" id="btnEdit">
                                        <span class="label label-danger" >Delete</span>
                                    </a>
                                </td>
                    </tr>
                @endforeach
                </tbody>

                <thead>
                <tr>
                    <th style="background-color: #3071a9 ;color: white">Sandwiches</th>
                    <th style="background-color: #3071a9 ;color: white">Price(Rs)</th>
                    <th style="background-color: #3071a9 ;color: white">Quantity</th>
                    <th style="background-color: #3071a9 ;color: white">Edit/Delete Item</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diningMenuCat2 as $diningMenuCat2 )
                    <tr>
                        <td>{{$diningMenuCat2->itemName}}</td>
                        <td>{{$diningMenuCat2->price}}.00</td>
                        <td>{{$diningMenuCat2->quantitiy}}</td>
                        <td>
                            <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat2->id)}}" id="btnEdit">
                                <span class="label label-warning" >Edit</span>
                            </a>
                            <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat2->id.'/delete')}}" id="btnEdit">
                                <span class="label label-danger" >Delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>


                <thead>
                <tr>
                    <th style="background-color: #3071a9 ;color: white">Coffee</th>
                    <th style="background-color: #3071a9 ;color: white">Price(Rs)</th>
                    <th style="background-color: #3071a9 ;color: white">Quantity</th>
                    <th style="background-color: #3071a9 ;color: white">Edit/Delete Item</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diningMenuCat3 as $diningMenuCat3 )
                    <tr>
                        <td>{{$diningMenuCat3->itemName}}</td>
                        <td>{{$diningMenuCat3->price}}.00</td>
                        <td>{{$diningMenuCat3->quantitiy}}</td>
                        <td>
                            <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat3->id)}}" id="btnEdit">
                                <span class="label label-warning" >Edit</span>
                            </a>
                            <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat3->id.'/delete')}}" id="btnEdit">
                                <span class="label label-danger" >Delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

                <thead>
                <tr>
                    <th style="background-color: #3071a9 ;color: white">Rice</th>
                    <th style="background-color: #3071a9 ;color: white">Price(Rs)</th>
                    <th style="background-color: #3071a9 ;color: white">Quantity</th>
                    <th style="background-color: #3071a9 ;color: white">Edit/Delete Item</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diningMenuCat4 as $diningMenuCat4 )
                    <tr>
                        <td>{{$diningMenuCat4->itemName}}</td>
                        <td>{{$diningMenuCat4->price}}.00</td>
                        <td>{{$diningMenuCat4->quantitiy}}</td>
                        <td>
                            <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat4->id)}}" id="btnEdit">
                                <span class="label label-warning" >Edit</span>
                            </a>
                            <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat4->id.'/delete')}}" id="btnEdit">
                                <span class="label label-danger" >Delete</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>

                <thead>
                <tr>
                    <th style="background-color: #3071a9 ;color: white">Pizza</th>
                    <th style="background-color: #3071a9 ;color: white">Price(Rs)</th>
                    <th style="background-color: #3071a9 ;color: white">Quantity</th>
                    <th style="background-color: #3071a9 ;color: white">Edit/Delete Item</th>
                </tr>
                </thead>
                <tbody>
                @foreach($diningMenuCat5 as $diningMenuCat5 )
                    <tr>
                        <td>{{$diningMenuCat5->itemName}}</td>
                        <td>{{$diningMenuCat5->price}}.00</td>
                        <td>{{$diningMenuCat5->quantitiy}}</td>
                        <td>
                            <a href="{{URL::to('diningMenuEdit/'.$diningMenuCat5->id)}}" id="btnEdit">
                                <span class="label label-warning" >Edit</span>
                            </a>
                            <a href="{{URL::to('diningMenuUpdate/'.$diningMenuCat5->id.'/delete')}}" id="btnEdit">
                                <span class="label label-danger" >Delete</span>
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
    <script>
        $("#dropDownNotify").on('click', function(){
            $("#lblNotify").hide();

        });

    </script>

@stop