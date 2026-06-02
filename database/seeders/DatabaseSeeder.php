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
        $adminRole = Role::create([
            'name' => 'admin',
            'description' => 'System administrator',
        ]);

        $userRole = Role::create([
            'name' => 'user',
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

        Product::firstOrCreate([
            'name' => 'Laptop',
        ], [
            'category_id' => $electronics->id,
            'description' => 'High performance laptop for daily work and study.',
            'price' => 899,
            'icon' => '💻',
            'stock' => 15,
        ]);

        Product::firstOrCreate([
            'name' => 'Smartphone',
        ], [
            'category_id' => $electronics->id,
            'description' => 'Latest generation smartphone with modern features.',
            'price' => 699,
            'icon' => '📱',
            'stock' => 25,
        ]);

        Product::firstOrCreate([
            'name' => 'Headphones',
        ], [
            'category_id' => $electronics->id,
            'description' => 'Wireless headphones with clear sound quality.',
            'price' => 149,
            'icon' => '🎧',
            'stock' => 40,
        ]);

        Product::firstOrCreate([
            'name' => 'Laravel Book',
        ], [
            'category_id' => $books->id,
            'description' => 'Useful Laravel book for web developers.',
            'price' => 39,
            'icon' => '📚',
            'stock' => 30,
        ]);

        Product::firstOrCreate([
            'name' => 'T-Shirt',
        ], [
            'category_id' => $fashion->id,
            'description' => 'Comfortable cotton t-shirt.',
            'price' => 29,
            'icon' => '👕',
            'stock' => 50,
        ]);
    }
}
