@extends('layouts.shop')

@section('title', 'Order Details - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Order Details #{{ $order->id }}</h2>
        <p>Detailed information about this customer order is shown below.</p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

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

            <div class="order-info-card">
                <p>Phone</p>
                <h3>{{ $order->phone ?? '-' }}</h3>
            </div>

            <div class="order-info-card">
                <p>City</p>
                <h3>{{ $order->city ?? '-' }}</h3>
            </div>

            <div class="order-info-card">
                <p>Payment Method</p>
                <h3>{{ $order->payment_method ?? '-' }}</h3>
            </div>

            <div class="order-info-card">
                <p>Shipping Method</p>
                <h3>{{ $order->shipping_method ?? 'Free Shipping' }}</h3>
            </div>
        </div>

        <div class="about-section">
            <h3>Delivery Address</h3>
            <p>{{ $order->address ?? 'No address information.' }}</p>
        </div>

        <div class="about-section" style="margin-top: 25px;">
            <h3>Update Order Status</h3>
            <p>Admin can update the current status of this order.</p>

            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" style="margin-top: 15px;">
                @csrf

                <p>
                    <label>Status</label>
                    <select name="status" required>
                        @foreach(\App\Models\Order::STATUSES as $status)
                            <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </p>

                <button type="submit" class="btn">
                    Update Status
                </button>
            </form>
        </div>

        <br>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">
            Back to Orders
        </a>

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
            <p>Subtotal: ${{ number_format($order->subtotal ?? $order->total_price, 2) }}</p>
            <p>
                Shipping:
                {{ $order->shipping_method ?? 'Free Shipping' }}
                -
                ${{ number_format($order->shipping_price ?? 0, 2) }}
            </p>

            <h3>Total Price: ${{ number_format($order->total_price, 2) }}</h3>
        </div>
    </div>

@endsection
