@extends('layouts.app')

@section('title', 'Admin Panel - LaravelShop')

@section('content')

    <div class="admin-box">
        <h2>Admin Dashboard</h2>
        <p>This page will be used to manage products, categories, and users.</p>

        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Module</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td>1</td>
                <td>Product Management</td>
                <td>Planned</td>
            </tr>
            <tr>
                <td>2</td>
                <td>User Management</td>
                <td>Planned</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Role Management</td>
                <td>Planned</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection
