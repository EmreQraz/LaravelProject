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

            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px; margin-top: 16px;">
                <div style="background: rgba(255,255,255,0.12); padding: 8px; border-radius: 14px;">
                    <strong>🔐 Secure</strong>
                    <p style="margin: 6px 0 0; font-size: 12px;">Safe checkout.</p>
                </div>

                <div style="background: rgba(255,255,255,0.12); padding: 8px; border-radius: 14px;">
                    <strong>🛒 Cart</strong>
                    <p style="margin: 6px 0 0; font-size: 12px;">Easy orders.</p>
                </div>

                <div style="background: rgba(255,255,255,0.12); padding: 8px; border-radius: 14px;">
                    <strong>⚙️ Admin</strong>
                    <p style="margin: 6px 0 0; font-size: 12px;">Full control.</p>
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

        <div class="featured-slider">
            <div class="featured-track">
                @foreach($products->chunk(2) as $index => $productGroup)
                    <div class="featured-slide">
                        @foreach($productGroup as $product)
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

                                        @auth
                                            <form action="{{ route('cart.add', $product) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-secondary">
                                                    Add to Cart
                                                </button>
                                            </form>
                                        @else
                                            <a href="/login" class="btn btn-secondary">
                                                Login to Add
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const track = document.querySelector('.featured-track');
            const slides = document.querySelectorAll('.featured-slide');
            let currentSlide = 0;

            if (track && slides.length > 1) {
                setInterval(function () {
                    currentSlide = (currentSlide + 1) % slides.length;
                    track.style.transform = `translateX(-${currentSlide * 100}%)`;
                }, 3500);
            }
        });
    </script>

@endsection
