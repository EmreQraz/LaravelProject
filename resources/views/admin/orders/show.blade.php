@extends('layouts.shop')

@section('title', 'Order Details - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Order Details #{{ $order->id }}</h2>

        <p><strong>Customer:</strong> {{ $order->customer_name }}</p>
        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
        <p>
            <strong>Status:</strong>
            <span class="status-badge status-completed">
        {{ ucfirst($order->status) }}
    </span>
        </p>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d.m.Y H:i') }}</p>
        <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>

        <br>

        <a href="{{ route('admin.orders.index') }}" class="btn">Back to Orders</a>

        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Product ID</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            </thead>

            <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->product_id ?? '-' }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->subtotal, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
