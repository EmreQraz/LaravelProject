@extends('layouts.shop')

@section('title', 'Manage Products - LaravelShop')

@section('content')

    <div class="admin-box">
        <h2>Manage Products</h2>

        <p>Admin can create, update and delete products from this page.</p>

        <br>

        <a href="{{ route('admin.products.create') }}" class="btn">Add New Product</a>
        <a href="/admin" class="btn">Back to Admin Dashboard</a>

        @if(session('success'))
            <p style="margin-top: 20px; color: green; font-weight: bold;">
                {{ session('success') }}
            </p>
        @endif

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Icon</th>
                <th>Product</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->icon }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>${{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn">Edit</a>

                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn" onclick="return confirm('Are you sure you want to delete this product?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
