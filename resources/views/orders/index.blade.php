@extends('layouts.shop')

@section('title', 'My Orders - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="admin-header">
            <div>
                <h2>My Orders</h2>
                <p>View your previous QrazCart orders.</p>
            </div>

            <div class="admin-actions">
                <a href="/dashboard" class="btn btn-secondary">Back to Dashboard</a>
                <a href="/products" class="btn">Continue Shopping</a>
            </div>
        </div>

        @if($orders->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Date</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Details</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td><strong>#{{ $order->id }}</strong></td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td>${{ number_format($order->total_price, 2) }}</td>
                            <td>
                                <span class="status-badge status-completed">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('orders.show', $order) }}" class="btn">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="cart-empty">
                <h3>No orders yet.</h3>
                <p>You have not placed any orders yet. Start shopping and complete your first checkout.</p>
                <a href="/products" class="btn">View Products</a>
            </div>
        @endif
    </div>

@endsection
