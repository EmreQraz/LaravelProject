@extends('layouts.shop')

@section('title', 'Orders - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Orders</h2>
        <p>Admin can view customer orders from this page.</p>

        <br>

        <a href="/admin" class="btn">Back to Admin Dashboard</a>

        @if($orders->count() > 0)
            <table>
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->customer_email }}</td>
                        <td>${{ number_format($order->total_price, 2) }}</td>
                        <td>
    <span class="status-badge status-completed">
        {{ ucfirst($order->status) }}
    </span>
                        </td>
                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order) }}" class="btn">
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <div style="margin-top: 30px; text-align: center; background: #f8fafc; padding: 35px; border-radius: 18px; border: 1px solid #e5e7eb;">
                <h3>No orders found.</h3>
                <p style="margin-top: 10px;">Orders will appear here after checkout.</p>
            </div>
        @endif
    </div>

@endsection
