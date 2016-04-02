@extends('clientMasterPage')




@section('content')


    <section class="sub_header" id="bg_room">
        <div class="sub_header_content">
            <div class="animated fadeInDown">
                <h1>All rooms</h1>
                <p>
                    Ridiculus sociosqu cursus neque cursus curae ante scelerisque vehicula.
                </p>
            </div>
        </div>
    </section>



    <div class="container margin_60">
        <h2 style="color: purple;">Dinning Menu</h2>
        <hr>
        <div class="row">
            <div class="col-md-7" style="border-radius: 25px;padding: 20px;background:lightgoldenrodyellow ">
                    <div class="panel panel-default">
                        <div class="panel-heading" style=" background-color:purple;color: white ;">SeaFood</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Portion</th>
                                    <th>Price(Rs)</th>
                                </tr>
                                @foreach($diningMenuCat1 as $diningMenuCat1 )
                                    <tr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <td style="width: 40%">{{$diningMenuCat1->itemName}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat1->quantitiy}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat1->price}}.00</td>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="panel-heading" style=" background-color:purple;color: white ">Sandwiches</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Portion</th>
                                    <th>Price(Rs)</th>
                                </tr>
                                @foreach($diningMenuCat2 as $diningMenuCat2 )
                                    <tr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <td style="width: 40%">{{$diningMenuCat2->itemName}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat2->quantitiy}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat2->price}}.00</td>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="panel-heading" style=" background-color:purple;color: white" >Pasta</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Portion</th>
                                    <th>Price(Rs)</th>
                                </tr>
                                @foreach($diningMenuCat6 as $diningMenuCat6 )
                                    <tr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <td style="width: 40%">{{$diningMenuCat6->itemName}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat6->quantitiy}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat6->price}}.00</td>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="panel-heading" style=" background-color:purple;color: white ">Coffee</div>
                        <div class="panel-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Portion</th>
                                    <th>Price(Rs)</th>
                                </tr>
                                @foreach($diningMenuCat3 as $diningMenuCat3 )
                                    <tr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <td style="width: 45%">{{$diningMenuCat3->itemName}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat3->quantitiy}}</td>
                                            </div>
                                            <div class="col-sm-4">
                                                <td>{{$diningMenuCat3->price}}.00</td>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div><!-- End col-md-8 -->

            <div class="col-md-5" >
                <div class="box_style_1" style="background:lightgoldenrodyellow">
                    <div class="row">
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/pizza.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Pizza</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/noodles.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Noodles</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/pasta.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Pasta</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/kebab.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Kebab</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/spaghetti.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Spaghetti</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/Roll ups.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Roll Ups</h4>
                        </div> <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/pizza 2.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>BBQ </h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/brown.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Sea Food</h4>
                        </div>
                      <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/salad.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Salad</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/capucchino.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Capucchino</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/espresso.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Espresso</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/latte.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Latte</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/dessert.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Pastries</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/beef Pho.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Beef Pho</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/soup.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Soup</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/shrimp.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Shrimp</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/nasigoreng.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>Nasigoreng</h4>
                        </div>
                        <div class="col-md-4 img_zoom">
                            <a href=""><img src="{{asset('client/img/lasangya.jpg')}}" alt="" class="img-responsive"></a>
                            <h4>lasagna</h4>
                        </div>
                    </div>
                    </div>

                </div>


            </div><!-- End col-md-4 -->
        </div><!-- End row -->
    </div><!-- End Container -->



@stop
