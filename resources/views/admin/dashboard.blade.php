@extends('layouts.app')

@section('title', 'Admin Panel - LaravelShop')

@section('content')

    <div class="admin-box">
        <h2>Admin Dashboard</h2>
        <p>This page shows products from the database. Product management will be added later.</p>

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
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
