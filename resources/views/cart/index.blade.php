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

        @if($cartItems->count() > 0)
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
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($cartItems as $item)
                        @php
                            $subtotal = $item->price * $item->quantity;
                            $total += $subtotal;
                        @endphp

                        <tr>
                            <td>
                                <div class="cart-product">
                                    @if($item->product && !empty($item->product->image))
                                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="cart-product-image">
                                    @elseif($item->product && !empty($item->product->icon))
                                        <span class="cart-product-icon">{{ $item->product->icon }}</span>
                                    @endif

                                    <strong>{{ $item->product->name ?? 'Product Deleted' }}</strong>
                                </div>
                            </td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" max="{{ $item->product->stock ?? 1 }}" style="width: 60px;">
                                    <button type="submit" class="btn btn-sm">Update</button>
                                </form>
                            </td>
                            <td>${{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-sm">
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
                    <form action="{{ route('cart.clear') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-secondary">
                            Clear Cart
                        </button>
                    </form>

                    <a href="{{ route('checkout.form') }}" class="btn">
                        Checkout
                    </a>
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
