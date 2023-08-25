@extends('app')

@section('title', 'Edit products')

@section('content')
    <h3>Add New Products</h3>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Special Unit</th>
            <th>Special Price</th>
            <th>Add</th>
        </tr>
        <tr>
            <form action="/add" method="post">
                <th>
                    <input name="name" type="text" value="">
                </th>
                <th>
                    <input name="unit_price" type="number" min="1" value="">
                </th>
                <th>
                    <input name="special_unit" type="number" value="">
                </th>
                <th>
                    <input name="special_price" type="number" value="">
                </th>
                <th>
                    <button type="submit">Add New Product</button>
                </th>
                @csrf
            </form>
        </tr>
    </table>
    <h3>Edit or Delete Products</h3>
    <table>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="color: red">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <tr>
            <th>Product Name</th>
            <th>Unit Price</th>
            <th>Special Unit</th>
            <th>Special Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($products as $product)
                    <tr>
                        <form action="/update" method="post">
                            <th>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input name="name" type="text" value="{{ $product->name }}">
                            </th>
                            <th>
                                <input name="unit_price" type="number" min="1" value="{{ $product->unit_price }}">
                            </th>
                            <th>
                                <input name="special_unit" type="number" min="1" value="{{ $product->special_unit }}">
                            </th>
                            <th>
                                <input name="special_price" type="number" min="1" value="{{ $product->special_price }}">
                            </th>
                            <th>
                                <button type="submit">Update</button>
                            </th>
                            @csrf
                        </form>
                        <form action="/delete" method="post">
                            <th>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button>Delete</button>
                            </th>
                            @csrf
                        </form>
                    </tr>
        @endforeach
    </table>
@endsection
