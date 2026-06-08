@extends('layouts.shop')

@section('title', 'Checkout - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="admin-header">
            <div>
                <h2>Checkout</h2>
                <p>Complete your delivery and payment information to place your order.</p>
            </div>

            <div class="admin-actions">
                <a href="/cart" class="btn btn-secondary">Back to Cart</a>
            </div>
        </div>

        @if($errors->any())
            <div class="error-message">
                Please fill in all required fields correctly.
            </div>
        @endif

        <div class="info-grid">
            <form action="{{ route('place.order') }}" method="POST">
                @csrf

                <div class="about-section" style="margin-top: 0;">
                    <h3>Delivery Information</h3>

                    <p>
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Example: +90 555 000 00 00" required>
                    </p>

                    <p>
                        <label>Address</label>
                        <textarea name="address" placeholder="Enter your delivery address" required style="height: 110px;">{{ old('address') }}</textarea>
                    </p>

                    <p>
                        <label>City</label>
                        <input type="text" name="city" value="{{ old('city') }}" placeholder="Example: Istanbul" required>
                    </p>
                </div>

                <div class="about-section">
                    <h3>Payment Method</h3>

                    <p>
                        <label>Payment Method</label>
                        <select name="payment_method" required>
                            <option value="Cash on Delivery" {{ old('payment_method') === 'Cash on Delivery' ? 'selected' : '' }}>
                                Cash on Delivery
                            </option>

                            <option value="Bank Transfer" {{ old('payment_method') === 'Bank Transfer' ? 'selected' : '' }}>
                                Bank Transfer
                            </option>
                        </select>
                    </p>
                </div>

                <div class="about-section">
                    <h3>Free Shipping Campaign</h3>
                    <p>
                        🚚 All QrazCart orders include free shipping until the end of 2026.
                    </p>
                </div>

                <button type="submit" class="btn">
                    Place Order
                </button>
            </form>

            <div class="info-card">
                <h3>Order Summary</h3>

                <div class="table-wrapper">
                    <table>
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'Product Deleted' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 22px; line-height: 2;">
                    <p>
                        <strong>Subtotal:</strong>
                        ${{ number_format($subtotal, 2) }}
                    </p>

                    <p>
                        <strong>Shipping:</strong>
                        Free Shipping - ${{ number_format($shippingPrice, 2) }}
                    </p>

                    <hr style="border: 0; border-top: 1px solid #e5e7eb; margin: 14px 0;">

                    <h3>
                        Total: ${{ number_format($total, 2) }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

@endsection
