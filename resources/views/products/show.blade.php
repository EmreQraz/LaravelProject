@extends('layouts.shop')

@section('title', $product->name . ' - QrazCart')

@section('content')

    <div class="detail-box">
        @if($product->image)
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 100%; max-height: 360px; object-fit: cover; border-radius: 18px; margin-bottom: 25px;">
        @else
            <div class="detail-icon">{{ $product->icon }}</div>
        @endif

        <h2>{{ $product->name }}</h2>

        <p><strong>Category:</strong> {{ $product->category->name }}</p>

        <p style="margin: 20px 0;">
            {{ $product->description }}
        </p>

        <div class="price">${{ $product->price }}</div>

        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <br>

        <form action="{{ route('cart.add', $product) }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn">
                Add to Cart
            </button>
        </form>

        <a href="/products" class="btn btn-secondary">Back to Products</a>

        <a href="/products" class="btn">Back to Products</a>
    </div>

    <div class="detail-box" style="text-align: left;">
        <h2 style="text-align: center;">Customer Reviews</h2>
        <p style="text-align: center; margin-bottom: 25px;">
            See what customers think about this product.
        </p>

        <div style="margin-bottom: 20px; padding: 20px; border: 1px solid #e5e7eb; border-radius: 16px; background: #f8fafc;">
            <h3>⭐ ⭐ ⭐ ⭐ ⭐</h3>
            <p style="margin-top: 10px;">
                Great product quality and fast delivery. I am very satisfied with this purchase.
            </p>
            <p style="margin-top: 10px; color: #64748b;">
                - Customer Review
            </p>
        </div>

        <div style="margin-bottom: 20px; padding: 20px; border: 1px solid #e5e7eb; border-radius: 16px; background: #f8fafc;">
            <h3>⭐ ⭐ ⭐ ⭐</h3>
            <p style="margin-top: 10px;">
                The product works well and the price is reasonable. I would recommend it.
            </p>
            <p style="margin-top: 10px; color: #64748b;">
                - Verified User
            </p>
        </div>

        <div style="padding: 20px; border: 1px solid #e5e7eb; border-radius: 16px; background: #f8fafc;">
            <h3>⭐ ⭐ ⭐ ⭐ ⭐</h3>
            <p style="margin-top: 10px;">
                Clean design, useful features, and smooth shopping experience.
            </p>
            <p style="margin-top: 10px; color: #64748b;">
                - QrazCart Customer
            </p>
        </div>
    </div>

@endsection
