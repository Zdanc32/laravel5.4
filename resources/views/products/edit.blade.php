@extends('layouts/layout')
@section('content')
<fieldset class="container border p-2">
    <legend class="w-auto">
        <a href="{{ action('StoreController@index') }}">products </a>:: edit product : {{ $product->product_name }}
    </legend>
    <div class="container">
        <form method="POST" action="{{ action('StoreController@update', $product) }}">
            <div class="form-group row">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lgFormGroupInput" name="product_name" value="{{ $product->product_name }}"
                           pattern="[A-Ża-ż]+"
                           title="Product name should only contain letters" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lgFormGroupInput" name="prices" data-role="tagsinput"
                           value="@foreach($product->prices as $price){{ $price->price }},@endforeach"
                           pattern="[0-9]+[,]?([.][0-9][0-9][,]?)?([0-9]+[,]?([.][0-9][0-9][,]?)?)*"
                           title="Price or prices should only contain digits" required="required">
                </div>
            </div>
            <div class="form-group row">
                <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" rows="4" cols="160">{{$product->product_description}}</textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <input type="submit" class="btn btn-primary" value="update product in database">
                </div>
            </div>
        </form>
    </div>
</fieldset>
@endsection