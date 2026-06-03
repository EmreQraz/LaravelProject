@extends('layouts.shop')

@section('title', 'Admin Panel - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>QrazCart Admin Dashboard</h2>
        <p>
            Welcome to the admin panel. From this area, administrators can manage products,
            monitor stock information, and control the e-commerce system.
        </p>

        <div class="admin-stats">
            <div class="stat-card">
                <h3>{{ $products->count() }}</h3>
                <p>Total Products</p>
            </div>

            <div class="stat-card">
                <h3>{{ $categories->count() }}</h3>
                <p>Total Categories</p>
            </div>

            <div class="stat-card">
                <h3>{{ $products->sum('stock') }}</h3>
                <p>Total Stock</p>
            </div>
        </div>

        <a href="{{ route('admin.products.index') }}" class="btn">Manage Products</a>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">View Orders</a>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 45px; height: 45px; object-fit: cover; border-radius: 8px; vertical-align: middle; margin-right: 8px;">
                        @endif

                        {{ $product->name }}
                    </td>
                    <td>{{ $product->category->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
