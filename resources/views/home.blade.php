@extends('layouts.app')

@section('title', 'Home - LaravelShop')

@section('content')

    <section class="hero">
        <h2>Welcome to LaravelShop</h2>
        <p>Modern Laravel based e-commerce project for Advanced Web Programming course.</p>
        <a href="/products" class="btn">View Products</a>
    </section>

    <section class="section">
        <h2>Categories</h2>

        <div class="categories">
            <div class="category-card">Electronics</div>
            <div class="category-card">Fashion</div>
            <div class="category-card">Books</div>
            <div class="category-card">Home & Living</div>
        </div>
    </section>

    <section class="section">
        <h2>Featured Products</h2>

        <div class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">{{ $product['icon'] }}</div>

                    <div class="product-info">
                        <h3>{{ $product['name'] }}</h3>
                        <p>{{ $product['description'] }}</p>
                        <div class="price">${{ $product['price'] }}</div>
                        <a href="/products/{{ $product['id'] }}" class="btn">Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
