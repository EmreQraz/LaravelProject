<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    $products = Product::with('category')->take(3)->get();

    return view('home', compact('categories', 'products'));
});

Route::get('/products', function () {
    $products = Product::with('category')->get();

    return view('products.index', compact('products'));
});

Route::get('/products/{id}', function ($id) {
    $product = Product::with('category')->findOrFail($id);

    return view('products.show', compact('product'));
});

Route::get('/admin', function () {
    $products = Product::with('category')->get();
    $categories = Category::all();

    return view('admin.dashboard', compact('products', 'categories'));
});
