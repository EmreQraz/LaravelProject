@extends('layouts.shop')

@section('title', 'Edit Product - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Edit Product</h2>

        <form action="{{ route('admin.products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')

            <p>
                <label>Category</label><br>
                <select name="category_id" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </p>

            <p>
                <label>Product Name</label><br>
                <input type="text" name="name" value="{{ $product->name }}" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <p>
                <label>Description</label><br>
                <textarea name="description" required style="width: 100%; padding: 10px; margin: 8px 0 15px; height: 100px;">{{ $product->description }}</textarea>
            </p>

            <p>
                <label>Price</label><br>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <p>
                <label>Icon</label><br>
                <input type="text" name="icon" value="{{ $product->icon }}" style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <p>
                <label>Stock</label><br>
                <input type="number" name="stock" value="{{ $product->stock }}" required style="width: 100%; padding: 10px; margin: 8px 0 15px;">
            </p>

            <button type="submit" class="btn">Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn">Cancel</a>
        </form>
    </div>

@endsection
