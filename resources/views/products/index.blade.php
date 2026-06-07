@extends('layouts.shop')

@section('title', 'Products - QrazCart')

@section('content')

    <section class="section">
        @if($selectedCategory)
            <h2>{{ $selectedCategory->name }} Products</h2>
        @else
            <h2>All Products</h2>
        @endif

            <form action="/products" method="GET" style="max-width: 700px; margin: 0 auto 35px; display: flex; gap: 10px;">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Search products..."
                    style="flex: 1; padding: 13px; border: 1px solid #e5e7eb; border-radius: 10px;"
                >

                <button type="submit" class="btn">Search</button>

                <a href="/products" class="btn btn-secondary">Reset</a>
            </form>

            @if($products->count() > 0)
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

                            @if($product->stock <= 0)
                                <button type="button" class="btn btn-secondary" disabled style="opacity: 0.6; cursor: not-allowed;">
                                    Out of Stock
                                </button>
                            @else
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
                            @endif
                        </div>
                    </div>
                </div>
                    @endforeach
                </div>
            @else
                <div style="text-align: center; background: white; padding: 35px; border-radius: 18px; border: 1px solid #e5e7eb;">
                    <h3>No products found.</h3>
                    <p style="margin: 12px 0;">Try searching with another keyword.</p>
                    <a href="/products" class="btn">View All Products</a>
                </div>
            @endif
    </section>

@endsection
