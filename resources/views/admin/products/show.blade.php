@extends('layouts.shop')

@section('title', 'Product Details - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="admin-header">
            <div>
                <h2>Product Details</h2>
                <p>Admin can view detailed information about this product.</p>
            </div>

            <div class="admin-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
                <a href="{{ route('admin.products.edit', $product) }}" class="btn">Edit Product</a>
            </div>
        </div>

        <div class="detail-box" style="margin: 0 auto; max-width: 100%; text-align: left;">
            <div style="display: grid; grid-template-columns: 0.9fr 1.1fr; gap: 30px; align-items: start;">
                <div>
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                             style="width: 100%; max-height: 320px; object-fit: cover; border-radius: 18px; border: 1px solid #e5e7eb;">
                    @else
                        <div style="font-size: 80px; text-align: center; padding: 40px; background: #f8fafc; border-radius: 18px;">
                            {{ $product->icon }}
                        </div>
                    @endif
                </div>

                <div>
                    <span class="badge">{{ $product->category->name }}</span>

                    <h2 style="margin: 14px 0;">
                        {{ $product->name }}
                    </h2>

                    <p style="color: #64748b; line-height: 1.7; margin-bottom: 18px;">
                        {{ $product->description }}
                    </p>

                    <div class="order-info-grid" style="grid-template-columns: repeat(2, 1fr);">
                        <div class="order-info-card">
                            <p>Price</p>
                            <h3>${{ number_format($product->price, 2) }}</h3>
                        </div>

                        <div class="order-info-card">
                            <p>Stock</p>
                            <h3>{{ $product->stock }}</h3>
                        </div>

                        <div class="order-info-card">
                            <p>Product ID</p>
                            <h3>#{{ $product->id }}</h3>
                        </div>

                        <div class="order-info-card">
                            <p>Image Path</p>
                            <h3 style="font-size: 14px;">{{ $product->image ?? 'No image' }}</h3>
                        </div>
                    </div>

                    <div class="about-section" style="margin-top: 20px;">
                        <h3>Stock Status</h3>

                        @if($product->stock > 0)
                            <p>
                                This product is currently available and can be added to the cart.
                            </p>
                        @else
                            <p style="color: #991b1b; font-weight: bold;">
                                This product is out of stock and cannot be added to the cart.
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
