<?php

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', function () {
    $categories = Category::all();
    $products = Product::with('category')->take(3)->get();

    return view('home', compact('categories', 'products'));
});

Route::get('/products', function () {
    $categoryId = request('category');

    $products = Product::with('category')
        ->when($categoryId, function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })
        ->get();

    $selectedCategory = $categoryId ? Category::find($categoryId) : null;

    return view('products.index', compact('products', 'selectedCategory'));
});

Route::get('/products/{id}', function ($id) {
    $product = Product::with('category')->findOrFail($id);

    return view('products.show', compact('product'));
});

Route::get('/admin', function () {
    $products = Product::with('category')->get();
    $categories = Category::all();

    return view('admin.dashboard', compact('products', 'categories'));
})->middleware('admin');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
