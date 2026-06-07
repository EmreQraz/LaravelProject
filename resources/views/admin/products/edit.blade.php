@extends('layouts.shop')

@section('title', 'Edit Product - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Edit Product</h2>
                <p>Update product information, stock, price, image and category.</p>
            </div>

            <div class="admin-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>

        @if($product->image)
            <div style="margin-bottom: 24px;">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                     style="width: 100%; max-height: 280px; object-fit: cover; border-radius: 18px; border: 1px solid #e5e7eb;">
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <p>
                <label>Category</label>
                <select name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </p>

            <p>
                <label>Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required>
            </p>

            <p>
                <label>Description</label>
                <textarea name="description" required style="height: 120px;">{{ $product->description }}</textarea>
            </p>

            <div class="form-row">
                <p>
                    <label>Price</label>
                    <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>
                </p>

                <p>
                    <label>Stock</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" min="0" required>                </p>
            </div>

            <div class="form-row">
                <p>
                    <label>Icon</label>
                    <input type="text" name="icon" value="{{ $product->icon }}">
                <div class="form-help">Optional emoji icon for fallback display.</div>
                </p>

                <p>
                    <label>Image Path</label>
                    <input type="text" name="image" value="{{ $product->image }}" placeholder="Example: images/products/laptop.jpg">
                <div class="form-help">Use an image path from public/images/products.</div>
                </p>
            </div>

            <div class="admin-actions">
                <button type="submit" class="btn">Update Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

@endsection
