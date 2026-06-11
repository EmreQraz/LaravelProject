@extends('layouts.shop')

@section('title', 'Admin Categories')

@section('content')
    <div class="admin-box">
        <div class="admin-header">
            <div>
                <h2>Admin Categories</h2>
                <p>Manage product categories.</p>
            </div>

            <div class="admin-actions">
                <a href="{{ route('admin.categories.create') }}" class="btn">Add Category</a>
                <a href="/admin" class="btn btn-secondary">Back to Admin Panel</a>
            </div>
        </div>

        @if($categories->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>#{{ $category->id }}</td>
                            <td style="font-size: 24px;">{{ $category->icon ?? '📦' }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn">Edit</a>

                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this category?')">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <h3>No categories found.</h3>
                <p>Create your first category.</p>
            </div>
        @endif
    </div>
@endsection
