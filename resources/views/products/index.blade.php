@extends('layouts.shop')

@section('title', 'Products - QrazCart')

@section('content')

    <section class="section">
        <h2>All Products</h2>

        <div class="products">
            @foreach($products as $product)
                <div class="product-card">
                    <div class="product-image">{{ $product->icon }}</div>

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
