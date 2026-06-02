@extends('layouts.app')

@section('title', 'Products - LaravelShop')

@section('content')

    <section class="section">
        <h2>All Products</h2>

        <div class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">{{ $product->icon }}</div>

                    <div class="product-info">
                        <h3>{{ $product->name }}</h3>
                        <p><strong>Category:</strong> {{ $product->category->name }}</p>
                        <p>{{ $product->description }}</p>
                        <div class="price">${{ $product->price }}</div>
                        <a href="/products/{{ $product->id }}" class="btn">Details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
