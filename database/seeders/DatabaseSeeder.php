<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::create([
            'name' => 'Electronics',
            'description' => 'Electronic devices and accessories',
        ]);

        $books = Category::create([
            'name' => 'Books',
            'description' => 'Programming and educational books',
        ]);

        $fashion = Category::create([
            'name' => 'Fashion',
            'description' => 'Clothes and fashion products',
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Laptop',
            'description' => 'High performance laptop for daily work and study.',
            'price' => 899,
            'icon' => '💻',
            'stock' => 15,
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Smartphone',
            'description' => 'Latest generation smartphone with modern features.',
            'price' => 699,
            'icon' => '📱',
            'stock' => 25,
        ]);

        Product::create([
            'category_id' => $electronics->id,
            'name' => 'Headphones',
            'description' => 'Wireless headphones with clear sound quality.',
            'price' => 149,
            'icon' => '🎧',
            'stock' => 40,
        ]);

        Product::create([
            'category_id' => $books->id,
            'name' => 'Laravel Book',
            'description' => 'Useful Laravel book for web developers.',
            'price' => 39,
            'icon' => '📚',
            'stock' => 30,
        ]);

        Product::create([
            'category_id' => $fashion->id,
            'name' => 'T-Shirt',
            'description' => 'Comfortable cotton t-shirt.',
            'price' => 29,
            'icon' => '👕',
            'stock' => 50,
        ]);
    }
}
