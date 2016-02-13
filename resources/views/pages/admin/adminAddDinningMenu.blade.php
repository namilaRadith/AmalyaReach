@extends('admin_master_page')
@section('css_ref')
    @parent

@stop
@section('content')

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="box-title">Quick Example</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Menu Name</label>
                            <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                        </div>


                    </div>
                    <!-- /.box-body -->
                    <div class="col-md-6">


                        <div class="box-header with-border">
                            <h4 class="box-title">Welcome Drink</h4>
                        </div>
                        <div class="box-body">
                            <div id="WeltxtbGrp">
                                <div id="txtbDiv">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">1</label>
                                        <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name" id="welcometxt">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">
                                    <input type="button" class="form-control" id="welTbAdd" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>

                        <div class="box-header with-border">
                            <h4 class="box-title">Welcome Drink</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">#</label>
                                <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">

                                    <input type="button" class="form-control" id="menu_name" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>

                        <div class="box-header with-border">
                            <h4 class="box-title">Welcome Drink</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">#</label>
                                <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">

                                    <input type="button" class="form-control" id="menu_name" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>

                        <div class="box-header with-border">
                            <h4 class="box-title">Welcome Drink</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">#</label>
                                <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">

                                    <input type="button" class="form-control" id="menu_name" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>

                        <div class="box-header with-border">
                            <h4 class="box-title">Welcome Drink</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">#</label>
                                <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">

                                    <input type="button" class="form-control" id="menu_name" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>




                    </div>

                    <div class="col-md-6">

                        <div class="box-header with-border">
                            <h4 class="box-title">Salad</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">#</label>
                                <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">

                                    <input type="button" class="form-control" id="menu_name" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>


                        <div class="box-header with-border">
                            <h4 class="box-title">Salad</h4>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">#</label>
                                <input type="text" class="form-control" id="menu_name" placeholder="Enter menu name">
                            </div>
                            <div class="col-md-3 pull-right">
                                <div class="form-group">

                                    <input type="button" class="form-control" id="menu_name" value="Add" >
                                </div>
                            </div>
                        </div>
                        <div class="box-footer"></div>



                    </div>




                    <div class="box-footer">

                            <button style=" margin-left:1em ;" type="submit" class="btn btn-danger btn-lg pull-right">Discard Menu </button>


                            <button  style=" margin-left:1em ;" type="submit" class="btn btn-warning btn-lg pull-right">Reset</button>


                            <button style=" margin-left:1em ;" type="submit" class="btn btn-primary btn-lg pull-right">Create Menu</button>

                    </div>
            </form>
        </div>
     </div>
            <!-- /.box -->


@stop
@section('js_ref')
    @parent
    <script>
        $(document).ready(function() {


            function addTextBox( counter,txtGrp, txtb, txtbDiv) {

                var newTextBoxDiv = $(document.createElement('div'))
                        .attr("id", txtbDiv + counter);

                newTextBoxDiv.after().html('<div class="form-group"><lable>'+counter+'</lable>'+
                        '<input type="text" class="form-control" name=" ' + txtb + counter +
                        '" id="' + txtb + counter + '" value=""  placeholder="Enter Welcome drink"></div>');

                newTextBoxDiv.appendTo(txtGrp);


            }

            welcomeDrinkCounter = 2;
            $("#welTbAdd").click(function () {
                addTextBox(welcomeDrinkCounter, "#WeltxtbGrp", "#welcometxt", "#txtbDiv");
                welcomeDrinkCounter++;
            });

        });

    </script>






@stop