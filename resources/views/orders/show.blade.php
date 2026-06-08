@extends('layouts.shop')

@section('title', 'My Order Details - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="admin-header">
            <div>
                <h2>Order Details #{{ $order->id }}</h2>
                <p>Review the products included in this order.</p>
            </div>

            <div class="admin-actions">
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Back to My Orders</a>
            </div>
        </div>

        <div class="order-info-grid">
            <div class="order-info-card">
                <p>Customer</p>
                <h3>{{ $order->customer_name }}</h3>
            </div>

            <div class="order-info-card">
                <p>Email</p>
                <h3>{{ $order->customer_email }}</h3>
            </div>

            <div class="order-info-card">
                <p>Status</p>
                <h3>
               <span class="status-badge status-{{ strtolower($order->status) }}">
    {{ $order->status }}
</span>
                </h3>
            </div>

            <div class="order-info-card">
                <p>Order Date</p>
                <h3>{{ $order->created_at->format('d.m.Y H:i') }}</h3>
            </div>
        </div>

        <div class="table-wrapper">
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

        <div class="order-total-box">
            <p>Total Price</p>
            <h3>${{ number_format($order->total_price, 2) }}</h3>
        </div>
    </div>

@endsection
