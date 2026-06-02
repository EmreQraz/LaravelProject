@extends('layouts.shop')

@section('title', $product->name . ' - LaravelShop')

@section('content')

    <div class="detail-box">
        <div class="detail-icon">{{ $product->icon }}</div>

        <h2>{{ $product->name }}</h2>

        <p><strong>Category:</strong> {{ $product->category->name }}</p>

        <p style="margin: 20px 0;">
            {{ $product->description }}
        </p>

        <div class="price">${{ $product->price }}</div>

        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <br>

        <a href="/products" class="btn">Back to Products</a>
    </div>

@endsection
