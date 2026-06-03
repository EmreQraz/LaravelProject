@extends('layouts.shop')

@section('title', $product->name . ' - QrazCart')

@section('content')

    <div class="detail-box" style="text-align: left;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 35px; align-items: center;">
            <div>
                @if($product->image)
                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                         style="width: 100%; height: 420px; object-fit: cover; border-radius: 22px;">
                @else
                    <div class="detail-icon" style="text-align: center;">{{ $product->icon }}</div>
                @endif
            </div>

            <div>
                <span class="badge">{{ $product->category->name }}</span>

                <h2 style="font-size: 36px; margin: 15px 0;">
                    {{ $product->name }}
                </h2>

                <p style="color: #64748b; line-height: 1.7; margin-bottom: 20px;">
                    {{ $product->description }}
                </p>

                <div class="price" style="font-size: 30px;">
                    ${{ $product->price }}
                </div>

                <p style="margin-bottom: 18px;">
                    <strong>Stock:</strong> {{ $product->stock }}
                </p>

                @if($product->stock > 0)
                    <p style="color: #16a34a; font-weight: bold; margin-bottom: 20px;">
                        In Stock
                    </p>
                @else
                    <p style="color: #dc2626; font-weight: bold; margin-bottom: 20px;">
                        Out of Stock
                    </p>
                @endif

                <form action="{{ route('cart.add', $product) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn">
                        Add to Cart
                    </button>
                </form>

                <a href="/products" class="btn btn-secondary">
                    Back to Products
                </a>
            </div>
        </div>
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
