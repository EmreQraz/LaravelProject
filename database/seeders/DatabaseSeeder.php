<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
        ], [
            'description' => 'System administrator',
        ]);

        $userRole = Role::firstOrCreate([
            'name' => 'user',
        ], [
            'description' => 'Normal customer user',
        ]);

        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        $adminUser->roles()->syncWithoutDetaching([$adminRole->id, $userRole->id]);

        $electronics = Category::firstOrCreate([
            'name' => 'Electronics',
        ], [
            'description' => 'Electronic devices and accessories',
        ]);

        $books = Category::firstOrCreate([
            'name' => 'Books',
        ], [
            'description' => 'Programming and educational books',
        ]);

        $fashion = Category::firstOrCreate([
            'name' => 'Fashion',
        ], [
            'description' => 'Clothes and fashion products',
        ]);

        $home = Category::firstOrCreate([
            'name' => 'Home & Living',
        ], [
            'description' => 'Home decoration and living products',
        ]);

        Product::updateOrCreate(
            ['name' => 'Laptop'],
            [
                'category_id' => $electronics->id,
                'description' => 'High performance laptop for daily work and study.',
                'price' => 899,
                'icon' => '💻',
                'image' => 'images/products/laptop.jpg',
                'stock' => 15,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Smartphone'],
            [
                'category_id' => $electronics->id,
                'description' => 'Latest generation smartphone with modern features.',
                'price' => 699,
                'icon' => '📱',
                'image' => 'images/products/smartphone.jpg',
                'stock' => 25,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Headphones'],
            [
                'category_id' => $electronics->id,
                'description' => 'Wireless headphones with clear sound quality.',
                'price' => 149,
                'icon' => '🎧',
                'image' => 'images/products/headphones.jpg',
                'stock' => 40,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Laravel Book'],
            [
                'category_id' => $books->id,
                'description' => 'Useful Laravel book for web developers.',
                'price' => 39,
                'icon' => '📚',
                'image' => 'images/products/laravel-book.jpg',
                'stock' => 30,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'T-Shirt'],
            [
                'category_id' => $fashion->id,
                'description' => 'Comfortable cotton t-shirt.',
                'price' => 29,
                'icon' => '👕',
                'image' => 'images/products/tshirt.jpg',
                'stock' => 50,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Smartwatch'],
            [
                'category_id' => $electronics->id,
                'description' => 'Smartwatch with fitness tracking and notifications.',
                'price' => 199,
                'icon' => '⌚',
                'image' => 'images/products/smartwatch.jpg',
                'stock' => 22,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Camera'],
            [
                'category_id' => $electronics->id,
                'description' => 'Digital camera for high quality photos and videos.',
                'price' => 549,
                'icon' => '📷',
                'image' => 'images/products/camera.jpg',
                'stock' => 12,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Keyboard'],
            [
                'category_id' => $electronics->id,
                'description' => 'Mechanical keyboard for comfortable typing.',
                'price' => 89,
                'icon' => '⌨️',
                'image' => 'images/products/keyboard.jpg',
                'stock' => 35,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Backpack'],
            [
                'category_id' => $fashion->id,
                'description' => 'Modern backpack for school, work, and travel.',
                'price' => 59,
                'icon' => '🎒',
                'image' => 'images/products/backpack.jpg',
                'stock' => 28,
            ]
        );

        Product::updateOrCreate(
            ['name' => 'Desk Lamp'],
            [
                'category_id' => $home->id,
                'description' => 'Minimal desk lamp for home and office usage.',
                'price' => 45,
                'icon' => '💡',
                'image' => 'images/products/desk-lamp.jpg',
                'stock' => 18,
            ]
        );
    }
}
