# QrazCart - Advanced Web Programming Final Project

QrazCart is a Laravel-based e-commerce web application developed for the Advanced Web Programming course.

## Project Description

This project is a simple e-commerce website built with Laravel.  
It includes product listing, product detail pages, user authentication, role-based authorization, and an admin panel for product management.

The main purpose of this project is to demonstrate Laravel project structure, database usage, authentication, authorization, Blade templates, and GitHub version control.

## Project Features

- Laravel project structure
- Homepage with product categories
- Product listing page
- Product detail page
- Database-driven products and categories
- User registration and login system
- Laravel Breeze authentication
- Role-based authorization system
- Admin-only dashboard
- Admin product management
    - Create products
    - List products
    - Update products
    - Delete products
- Git and GitHub version control

## Technologies Used

- PHP
- Laravel
- Blade Template Engine
- SQLite Database
- Laravel Breeze
- HTML
- CSS
- JavaScript
- Git
- GitHub

## User Roles

The project includes two main roles:

- admin
- user

Only users with the admin role can access the admin panel and product management pages.

## Admin Account

Use the following account to access the admin panel:

```txt
Email: admin@example.com
Password: password
```

## Main Pages

```txt
/
Homepage
```

```txt
/products
Product listing page
```

```txt
/products/{id}
Product detail page
```

```txt
/login
User login page
```

```txt
/register
User registration page
```

```txt
/dashboard
Authenticated user dashboard
```

```txt
/admin
Admin dashboard
```

```txt
/admin/products
Admin product management page
```

```txt
/admin/products/create
Create new product page
```

## Installation

Clone the repository:

```bash
git clone https://github.com/EmreOraz/LaravelProject.git
```

Go to the project folder:

```bash
cd LaravelProject
```

Install PHP dependencies:

```bash
composer install
```

Install frontend dependencies:

```bash
npm install
```

Create environment file:

```bash
copy .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

Run migrations and seeders:

```bash
php artisan migrate --seed
```

Build frontend files:

```bash
npm run build
```

Start Laravel development server:

```bash
php artisan serve
```

Open the project in browser:

```txt
http://127.0.0.1:8000
```

## GitHub Commit Progress

The project was developed step by step with Git commits:

1. Initial Laravel project setup
2. Add homepage and basic layout
3. Add product pages and route structure
4. Add database models migrations and seeders
5. Add authentication system with Breeze
6. Add role system and admin protection
7. Add admin product management
8. Final cleanup and documentation

## Project Structure

```txt
app/Models
Category, Product, Role, User models

app/Http/Controllers/Admin
Admin ProductController

app/Http/Middleware
AdminMiddleware

database/migrations
Database table definitions

database/seeders
Default categories, products, roles, and admin user

resources/views
Blade template files

routes/web.php
Web routes
```

## Final Notes

This project was created as a final project for the Advanced Web Programming course.  
It demonstrates Laravel MVC structure, authentication, authorization, database relationships, CRUD operations, and GitHub usage.
