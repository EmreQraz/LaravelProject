@extends('layouts.shop')

@section('title', 'Add Product - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Add New Product</h2>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <p>
                <label>Category</label><br>
                <select name="category_id" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </p>

            <p>
                <label>Product Name</label><br>
                <input type="text" name="name" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <p>
                <label>Description</label><br>
                <textarea name="description" required style="width: 100%; padding: 10px; margin: 8px 0 15px; height: 100px;"></textarea>
            </p>

            <p>
                <label>Price</label><br>
                <input type="number" name="price" step="0.01" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <p>
                <label>Icon</label><br>
                <input type="text" name="icon" placeholder="Example: 💻" style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <p>
                <label>Stock</label><br>
                <input type="number" name="stock" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <button type="submit" class="btn">Save Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn">Cancel</a>
        </form>
    </div>

@endsection
