@extends('layouts/layout')
@section('content')
<fieldset class="container border p-2">
    <legend class="w-auto">
        <a href="{{ action('StoreController@index') }}">products </a> :: add new product
    </legend>
    <div class="container">
    <form method="post" action="{{ action('StoreController@store') }}">
        <div class="form-group row">
            {{csrf_field()}}
            <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lgFormGroupInput" placeholder="product name"
                       name="product_name"
                       pattern="[A-Ża-ż]+"
                       title="Product name should only contain letters" required="required">
            </div>
        </div>
        <div class="form-group row">
            <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lgFormGroupInput"
                       name="prices" data-role="tagsinput"
                       pattern="[0-9]+[,]?([.][0-9][0-9][,]?)?([0-9]+[,]?([.][0-9][0-9][,]?)?)*"
                       title="Price or prices should only contain digits" required="required">
            </div>
        </div>
        <div class="form-group row">
            <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" rows="4" cols="160"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2"></label>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary" value="add product to database">
            </div>
        </div>
    </form>
</div>
</fieldset>
@endsection