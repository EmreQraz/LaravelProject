@extends('layouts.shop')

@section('title', 'Home - QrazCart')

@section('content')

    <section class="hero">
        <div>
            <h2>Discover Smart Shopping with QrazCart</h2>
            <p>
                QrazCart is a modern Laravel-based e-commerce platform with product listing,
                user authentication, role-based admin access, and product management features.
            </p>

            <a href="/products" class="btn">Shop Now</a>

            @auth
                <a href="/dashboard" class="btn btn-secondary">My Dashboard</a>
            @else
                <a href="/login" class="btn btn-secondary">Login</a>
            @endauth
        </div>

        <div class="hero-card">

            <h3>Why QrazCart?</h3>

            <div style="display: grid; gap: 12px; margin-top: 18px;">
                <div style="background: rgba(255,255,255,0.12); padding: 14px; border-radius: 14px;">
                    <strong>🔐 Secure Shopping</strong>
                    <p style="margin: 6px 0 0; font-size: 14px;">Login, cart and checkout flow.</p>
                </div>

                <div style="background: rgba(255,255,255,0.12); padding: 14px; border-radius: 14px;">
                    <strong>🛒 Smart Cart</strong>
                    <p style="margin: 6px 0 0; font-size: 14px;">Add products and complete orders.</p>
                </div>

                <div style="background: rgba(255,255,255,0.12); padding: 14px; border-radius: 14px;">
                    <strong>⚙️ Admin Panel</strong>
                    <p style="margin: 6px 0 0; font-size: 14px;">Manage products and orders easily.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Categories</h2>

        <div class="categories">
            @foreach($categories as $category)
                <a href="/products?category={{ $category->id }}" class="category-card">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </section>

    <section class="section">
        <h2>Featured Products</h2>

        <div class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                        @else
                            <span class="fallback-icon">{{ $product->icon }}</span>
                        @endif
                    </div>

                    <div class="product-info">
                        <span class="badge">{{ $product->category->name }}</span>

                        <h3>{{ $product->name }}</h3>

                        <p>{{ $product->description }}</p>

                        <div class="product-meta">
                            <div class="price">${{ $product->price }}</div>
                            <div class="stock-text">Stock: {{ $product->stock }}</div>
                        </div>

                        <div class="product-actions">
                            <a href="/products/{{ $product->id }}" class="btn">View Details</a>

                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
