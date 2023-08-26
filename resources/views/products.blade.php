@extends('app')

@section('title', 'List of products')

@section('content')
        <h3>Products for sale:</h3>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Special Offer</th>
            </tr>
            @forelse($products as $product)
                <tr>
                    <th>{{ $product->name }}</th>
                    <th>{{ $product->unit_price }}</th>
                    @if($product->special_unit && $product->special_price)
                        <th>{{ $product->special_unit }} for {{ $product->special_price }}</th>
                    @else
                        <th>Not found any special offer</th>
                    @endif
                </tr>
            @empty
                <p>No products found!</p>
            @endforelse
        </table>
        <br>
        <br>
    <div>
        <form action="/checkout" method="post">
            <label for="checkout">Checkout</label>
            <input type="text" placeholder="Add Products" id='checkout' name="products" autocomplete="off">
            <button>Checkout</button>
            @csrf
        </form>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
