@extends('layouts.shop')

@section('title', 'Shopping Cart - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Shopping Cart</h2>
        <p>Review your selected products before checkout.</p>

        @if(session('success'))
            <p style="margin-top: 20px; color: green; font-weight: bold;">
                {{ session('success') }}
            </p>
        @endif

        @if(count($cart) > 0)
            @php
                $total = 0;
            @endphp

            <table>
                <thead>
                <tr>
                    <th>Icon</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach($cart as $item)
                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <tr>
                        <td>{{ $item['icon'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>${{ number_format($item['price'], 2) }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div style="margin-top: 25px; text-align: right;">
                <h3>Total: ${{ number_format($total, 2) }}</h3>

                <br>

                <form action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        Clear Cart
                    </button>
                </form>

                <form action="{{ route('cart.checkout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn">
                        Checkout
                    </button>
                </form>
            </div>
        @else
            <div style="margin-top: 30px; text-align: center;">
                <h3>Your cart is empty.</h3>
                <p style="margin: 15px 0;">You can add products to your cart from the products page.</p>
                <a href="/products" class="btn">View Products</a>
            </div>
        @endif
    </div>

@endsection
