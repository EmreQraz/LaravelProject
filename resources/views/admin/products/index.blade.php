@extends('layouts.shop')

@section('title', 'Add Product - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Add New Product</h2>
                <p>Create a new product for QrazCart.</p>
            </div>

            <div class="admin-actions">
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to Products</a>
            </div>
        </div>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <p>
                <label>Category</label>
                <select name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </p>

            <p>
                <label>Product Name</label>
                <input type="text" name="name" required>
            </p>

            <p>
                <label>Description</label>
                <textarea name="description" required style="height: 120px;"></textarea>
            </p>

            <div class="form-row">
                <p>
                    <label>Price</label>
                    <input type="number" name="price" step="0.01" required>
                </p>

                <p>
                    <label>Stock</label>
                    <input type="number" name="stock" required>
                </p>
            </div>

            <div class="form-row">
                <p>
                    <label>Icon</label>
                    <input type="text" name="icon" placeholder="Example: 💻">
                <div class="form-help">Optional emoji icon for fallback display.</div>
                </p>

                <p>
                    <label>Image Path</label>
                    <input type="text" name="image" placeholder="Example: images/products/laptop.jpg">
                <div class="form-help">Use an image path from public/images/products.</div>
                </p>
            </div>

            <div class="admin-actions">
                <button type="submit" class="btn">Save Product</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

@endsection
