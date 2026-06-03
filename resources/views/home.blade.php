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
            <div class="icon">🛍️</div>
            <h3>Fast. Simple. Secure.</h3>
            <p>Browse products, manage your account, and experience a clean shopping interface.</p>
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
                        <div class="price">${{ $product->price }}</div>
                        <p><strong>Stock:</strong> {{ $product->stock }}</p>
                        <br>
                        <a href="/products/{{ $product->id }}" class="btn">View Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
