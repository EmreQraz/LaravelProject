@extends('layouts.shop')

@section('title', 'Edit Category')

@section('content')
    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Edit Category</h2>
                <p>Update category information.</p>
            </div>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Category Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>

            <label>Icon</label>
            <input type="text" name="icon" value="{{ old('icon', $category->icon) }}" placeholder="Example: 💻">

            <button type="submit" class="btn">Update Category</button>
        </form>
    </div>
@endsection
