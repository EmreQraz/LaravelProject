@extends('layouts.shop')

@section('title', 'Create Category')

@section('content')
    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Create Category</h2>
                <p>Add a new product category.</p>
            </div>

            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Back</a>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <label>Category Name</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label>Icon</label>
            <input type="text" name="icon" value="{{ old('icon') }}" placeholder="Example: 💻">

            <button type="submit" class="btn">Create Category</button>
        </form>
    </div>
@endsection
