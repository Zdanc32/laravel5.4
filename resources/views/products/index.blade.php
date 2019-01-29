@extends('layouts/layout')
@section('content')
<fieldset class="container border p-2">
    <legend class="w-auto">
        products :: all products
    </legend>
    <div class="container">
        <a class="btn btn-primary" href="./products/create">add new product</a>
        <br><br>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>description</th>
                <th style="width: 15%">price</th>
                <th>created at</th>
                <th>updated at</th>
                <th colspan="2">actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                 <tr>
                    <td>{{ $product->product_dwid }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_description }}</td>
                    <td>
                        <table class="table table-sm">
                        @foreach($product->prices as $price)
                        <tr>
                            <td>
                                {{ $price->price }}$
                            </td>
                        </tr>
                        @endforeach
                        </table>
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <a style="width: 70px" class="btn btn-warning" href="{{ action('StoreController@edit', $product) }}">edit</a>
                    </td>
                    <td>
                        <form action="{{ action('StoreController@destroy', $product) }}" method="post">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="delete">
                            <button style="width: 70px" class="btn btn-danger" type="submit">delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</fieldset>
@endsection