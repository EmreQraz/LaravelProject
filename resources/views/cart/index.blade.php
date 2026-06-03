@extends('layouts.shop')

@section('title', 'Shopping Cart - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Shopping Cart</h2>
        <p>Review your selected products before checkout.</p>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if(count($cart) > 0)
            @php
                $total = 0;
            @endphp

            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
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
                            <td>
                                <div class="cart-product">
                                    <span class="cart-product-icon">{{ $item['icon'] }}</span>
                                    <strong>{{ $item['name'] }}</strong>
                                </div>
                            </td>
                            <td>${{ number_format($item['price'], 2) }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary">
                                        Remove
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-summary">
                <div>
                    <p>Total Amount</p>
                    <h3>${{ number_format($total, 2) }}</h3>
                </div>

                <div class="cart-actions">
                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            Clear Cart
                        </button>
                    </form>

                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">
                            Checkout
                        </button>
                    </form>
                </div>
            </div>
        @else
            <div class="cart-empty">
                <h3>Your cart is empty.</h3>
                <p>You can add products to your cart from the products page.</p>
                <a href="/products" class="btn">View Products</a>
            </div>
        @endif
    </div>

@endsection
