<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = [
        [
            'id' => 1,
            'name' => 'Laptop',
            'category' => 'Electronics',
            'price' => 899,
            'description' => 'High performance laptop for daily work and study.',
            'icon' => '💻'
        ],
        [
            'id' => 2,
            'name' => 'Smartphone',
            'category' => 'Electronics',
            'price' => 699,
            'description' => 'Latest generation smartphone with modern features.',
            'icon' => '📱'
        ],
        [
            'id' => 3,
            'name' => 'Headphones',
            'category' => 'Accessories',
            'price' => 149,
            'description' => 'Wireless headphones with clear sound quality.',
            'icon' => '🎧'
        ],
    ];

    return view('home', compact('products'));
});

Route::get('/products', function () {
    $products = [
        [
            'id' => 1,
            'name' => 'Laptop',
            'category' => 'Electronics',
            'price' => 899,
            'description' => 'High performance laptop for daily work and study.',
            'icon' => '💻'
        ],
        [
            'id' => 2,
            'name' => 'Smartphone',
            'category' => 'Electronics',
            'price' => 699,
            'description' => 'Latest generation smartphone with modern features.',
            'icon' => '📱'
        ],
        [
            'id' => 3,
            'name' => 'Headphones',
            'category' => 'Accessories',
            'price' => 149,
            'description' => 'Wireless headphones with clear sound quality.',
            'icon' => '🎧'
        ],
        [
            'id' => 4,
            'name' => 'Book',
            'category' => 'Books',
            'price' => 29,
            'description' => 'Useful programming book for web developers.',
            'icon' => '📚'
        ],
    ];

    return view('products.index', compact('products'));
});

Route::get('/products/{id}', function ($id) {
    $products = [
        1 => [
            'id' => 1,
            'name' => 'Laptop',
            'category' => 'Electronics',
            'price' => 899,
            'description' => 'High performance laptop for daily work and study.',
            'icon' => '💻'
        ],
        2 => [
            'id' => 2,
            'name' => 'Smartphone',
            'category' => 'Electronics',
            'price' => 699,
            'description' => 'Latest generation smartphone with modern features.',
            'icon' => '📱'
        ],
        3 => [
            'id' => 3,
            'name' => 'Headphones',
            'category' => 'Accessories',
            'price' => 149,
            'description' => 'Wireless headphones with clear sound quality.',
            'icon' => '🎧'
        ],
        4 => [
            'id' => 4,
            'name' => 'Book',
            'category' => 'Books',
            'price' => 29,
            'description' => 'Useful programming book for web developers.',
            'icon' => '📚'
        ],
    ];

    if (!isset($products[$id])) {
        abort(404);
    }

    $product = $products[$id];

    return view('products.show', compact('product'));
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});
