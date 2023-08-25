@extends('app')

@section('title', 'Receipt Page')

@section('content')
    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Product Price</th>
        </tr>
        @foreach($finalProducts['products'] as $product)
            <tr>
                <th>{{ $product['productName'] }}</th>
                <th>{{ $product['productQty'] }}</th>
                <th>{{ $product['productTotalPrice'] }}</th>
            </tr>
        @endforeach
    </table>
    <br>
    <div>Total: {{ $finalProducts['totalPrice'] }}</div>
    <br>
@endsection

