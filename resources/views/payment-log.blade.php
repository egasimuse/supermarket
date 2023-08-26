@extends('app')

@section('title', 'Payment Log')

@section('content')
    <table>
        <tr>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Order Time</th>
        </tr>
        @forelse($orders as $order)
        <tr>
            <th>{{ $order->name }}</th>
            <th>{{ $order->quantity }}</th>
            <th>{{ $order->total_price }}</th>
            <th>{{ $order->created_at }}</th>
        </tr>
        @empty
            <p>No Orders found.</p>
        @endforelse
    </table>
@endsection
