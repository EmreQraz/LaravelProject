@extends('layouts.shop')

@section('title', 'Products - QrazCart')

@section('content')

    <section class="section">
        @if($selectedCategory)
            <h2>{{ $selectedCategory->name }} Products</h2>
        @else
            <h2>All Products</h2>
        @endif

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

                        <form action="{{ route('cart.add', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-secondary">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection
