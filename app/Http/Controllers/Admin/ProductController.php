<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'icon' => 'nullable|string|max:10',
            'image' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect('/admin/products')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $product->load('category');

        return view('admin.products.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'icon' => 'nullable|string|max:10',
            'image' => 'nullable|string|max:255',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect('/admin/products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/admin/products')->with('success', 'Product deleted successfully.');
    }
}
