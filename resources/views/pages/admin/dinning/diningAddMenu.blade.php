@extends('admin_master_page')
@section('css_ref')
@parent

@stop
@section('content')

<hr>
<div class="container">
<form id="AddDiningMenu" method="post" action="diningAddMenuSubmit" autocomplete="off"><input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-8">
    <div class="form-group">
        <label for="itemName">Name of the food item</label>
        <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Enter Name of the food item here" value="{{ old('FoodItemName') }}">
        <div class="error alert-danger">{{ $errors->first('itemName') }}</div>
    </div>
    <div class="form-group">
        <label for="ItemCat">Food Catogory</label>
            <select class="form-control" id="foodCatagory" name="foodCatagory"  >
                <option value="">Select Food Item Catagory</option>
                <option value="Seafood">Seafood</option>
                <option value="Sandwich">Sandwich</option>
                <option value="Soft Drinks">Soft Drinks</option>
                <option value="Fried Rice">Fried Rice</option>
                <option value="Coffee">Coffee</option>
                <option value="Pasta">Pasta</option>
                <option value="Pizza">Pizza</option>
                <option value="Desserts">Desserts</option>
                <option value="kebab">Kebab</option>
                <option value="bites">Bites</option>
                <option value="noodles">Noodles</option>

            </select>
        <div class="error alert-danger">{{ $errors->first('foodCatagory') }}</div>
    </div>
    <div class="form-group">
        <label for="price">Price(Rs.)</label>
        <input type="text" class="form-control" id="price" name="price" placeholder="Price(Rs.)" value="{{ old('price') }}">
        <div class="error alert-danger">{{ $errors->first('price') }}</div>
    </div>
    <div class=" btn_full">
        <input type="submit" value="Add Food Item" class="form-control" id="addFoodItem" style="background-color: green;color: white" >
    </div>
</div>
    <div class="alert col-md-8" style="top: 60px">
        @if(Session::has('flash_message'))
            <div class="alert alert-warning">{{Session::get('flash_message')}}</div>

        @endif
    </div>


</form>
</div>



@stop
@section('js_ref')
@parent






@stop