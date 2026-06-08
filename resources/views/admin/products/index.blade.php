@extends('layouts.shop')

@section('title', 'Manage Products - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="admin-header">
            <div>
                <h2>Manage Products</h2>
                <p>Admin can create, update and delete products from this page.</p>
            </div>

            <div class="admin-actions">
                <a href="{{ route('admin.products.create') }}" class="btn">Add New Product</a>
                <a href="/admin" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>Image</th>
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
                        <td>
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-thumb">
                            @else
                                {{ $product->icon }}
                            @endif
                        </td>

                        <td>
                            <div class="admin-product-name">{{ $product->name }}</div>
                            <small style="color: #64748b;">ID: {{ $product->id }}</small>
                        </td>

                        <td>
                            <span class="badge">{{ $product->category->name }}</span>
                        </td>

                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->stock }}</td>

                        <td>
                            <div class="admin-actions">
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-secondary">Show</a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn">Edit</a>

                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-secondary" onclick="return confirm('Are you sure you want to delete this product?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
