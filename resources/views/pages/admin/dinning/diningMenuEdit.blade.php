@extends('admin_master_page')
@section('css_ref')
    @parent

@stop
@section('content')

    <hr>
    <div class="container">

            <form id="EditDiningMenu" method="post" action="{{URL::to('diningMenu/'.$foodItem->id.'/edit')}}">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="col-md-8">
                <div class="form-group">

                    <label for="itemName">Name of the food item</label>
                    <input type="text" class="form-control" id="itemName" name="itemName"
                           placeholder="Enter Name of the food item here" value="{{ $foodItem->itemName }}">

                    <div class="error alert-danger">{{ $errors->first('itemName') }}</div>
                </div>
                <div class="form-group">
                    <label for="ItemCat">Food Catogory</label>
                    <select class="form-control" id="foodCatagory" name="foodCatagory">
                        <option value={{$foodItem->foodCatagory}}>{{$foodItem->foodCatagory}}</option>
                        <option value="Seafood">Seafood</option>
                        <option value="Sandwich">Sandwich</option>
                        <option value="Soft Drinks">Soft Drinks</option>
                        <option value="Fried Rice">Fried Rice</option>
                        <option value="Coffee">Coffee</option>
                    </select>

                    <div class="error alert-danger">{{ $errors->first('foodCatagory') }}</div>
                </div>

                <div class="form-group">
                    <label for="price">Quantity</label>
                    <input type="text" class="form-control" id="quantitiy" name="quantitiy" placeholder="Price(Rs.)"
                           value="{{$foodItem->quantitiy }}">
                    <div class="error alert-danger">{{ $errors->first('quantitiy') }}</div>
                </div>

                <div class="form-group">
                    <label for="price">Price(Rs.)</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price(Rs.)"
                           value="{{$foodItem->price }}.00">

                    <div class="error alert-danger">{{ $errors->first('price') }}</div>
                </div>
                <div class=" btn_full">
                    <input type="submit" value="Edit Details" class="form-control" id="addFoodItem" style="background-color: green;color: white">
                </div>
            </div>


        </form>
    </div>



@stop
@section('js_ref')
    @parent






@stop