# QrazCart - Advanced Web Programming Final Project

QrazCart is a Laravel-based e-commerce web application developed for the Advanced Web Programming course.

This project was created step by step using Laravel, database models, authentication, role-based authorization, shopping cart functionality, admin product management, product images, contact page, FAQ page, about page, product reviews section, and GitHub version control.

---

## Project Description

QrazCart is a simple but functional e-commerce website.  
Users can browse products, view product details, search products, filter products by category, add products to the shopping cart, view cart totals, and complete a demo checkout process.

The project also includes user authentication, admin authorization, and an admin panel where admin users can manage products.

---

## Main Features

- Modern Laravel project structure
- QrazCart custom branding
- Responsive and improved user interface
- Homepage with hero section
- Product categories
- Product listing page
- Product detail page
- Product search functionality
- Category-based product filtering
- Product images
- More sample products
- Shopping cart system
- Cart item count in navbar
- Cart total price calculation
- Remove product from cart
- Clear cart
- Demo checkout process
- User registration
- User login
- User dashboard
- Dashboard navigation links
- Role-based authorization
- Admin-only dashboard
- Admin product management
    - Create products
    - List products
    - Update products
    - Delete products
    - Add product image path
- Contact Us page
- FAQ page
- About Us page
- Social media links
- Product reviews section
- Improved footer design
- Improved typography with Inter font
- Git and GitHub version control

---

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

---

## User Roles

The project includes two main roles:

- admin
- user

Only users with the `admin` role can access the admin panel and product management pages.

---

## Admin Account

Use the following account to access the admin panel:

```txt
Email: admin@example.com
Password: password
```

---

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
/products?search=laptop
Product search example
```

```txt
/products?category=1
Category filter example
```

```txt
/products/{id}
Product detail page
```

```txt
/cart
Shopping cart page
```

```txt
/contact
Contact Us page
```

```txt
/faq
Frequently Asked Questions page
```

```txt
/about
About Us page
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

---

## Database Structure

The project uses SQLite as the database.

Main database models and tables:

- users
- roles
- role_user
- categories
- products

The products table includes:

- category_id
- name
- description
- price
- icon
- image
- stock

The role system uses a many-to-many relationship between users and roles.

---

## Shopping Cart

The shopping cart is implemented using Laravel session.

Cart features:

- Add product to cart
- Increase quantity when the same product is added again
- Show cart item count in navbar
- Show subtotal and total price
- Remove product from cart
- Clear cart
- Demo checkout process

The checkout process is a demo feature. It clears the cart and shows a success message.

---

## Product Images

Product images are stored inside:

```txt
public/images/products
```

Example image paths:

```txt
images/products/laptop.jpg
images/products/smartphone.jpg
images/products/headphones.jpg
images/products/laravel-book.jpg
images/products/tshirt.jpg
images/products/smartwatch.jpg
images/products/camera.jpg
images/products/keyboard.jpg
images/products/backpack.jpg
images/products/desk-lamp.jpg
```

Admin users can enter an image path when creating or editing a product.

---

## Contact Page

The Contact Us page includes a contact form with:

- Name
- Email
- Message

The form validates the inputs and displays a success message after submission.  
For safety and simplicity, contact messages are not stored in the database.

---

## FAQ Page

The FAQ page includes common questions about:

- Creating an account
- Adding products to cart
- Removing products from cart
- Admin panel access
- Contacting support

---

## About Page

The About Us page includes:

- Project description
- Project purpose
- Technologies used
- QrazCart explanation
- Social media links
- GitHub repository link

---

## Product Reviews

The product detail page includes a static customer reviews section.

This section demonstrates how product reviews can be displayed on an e-commerce website.  
For simplicity, reviews are not stored in the database.

---

## Installation

Clone the repository:

```bash
git clone https://github.com/EmreQraz/LaravelProject.git
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

---

## GitHub Repository

```txt
https://github.com/EmreQraz/LaravelProject
```

---

## GitHub Commit Progress

The project was developed step by step with Git commits.

Main development steps:

1. Initial Laravel project setup
2. Add homepage and basic layout
3. Add product pages and route structure
4. Add database models migrations and seeders
5. Add authentication system with Breeze
6. Add role system and admin protection
7. Add admin product management
8. Add final documentation
9. UI update 1 - branding and homepage improvements
10. UI update 2 - improve admin dashboard
11. Improve dashboard navigation and homepage auth buttons
12. Add category filtering on product page
13. Add shopping cart functionality
14. Add product images and more sample products
15. Add image field to admin product forms
16. Improve website typography
17. Add contact page
18. Show cart item count in navbar
19. Add FAQ page
20. Add product reviews section
21. Add about page with social links
22. Improve footer design
23. Add product search functionality
24. Improve product detail page design

---

## Project Structure

```txt
app/Models
Category, Product, Role, User models
```

```txt
app/Http/Controllers
CartController
```

```txt
app/Http/Controllers/Admin
Admin ProductController
```

```txt
app/Http/Middleware
AdminMiddleware
```

```txt
database/migrations
Database table definitions
```

```txt
database/seeders
Default categories, products, roles, admin user, and sample product data
```

```txt
resources/views
Blade template files
```

```txt
resources/views/layouts/shop.blade.php
Main QrazCart layout
```

```txt
resources/views/products
Product list and product detail pages
```

```txt
resources/views/admin
Admin dashboard and product management pages
```

```txt
public/images/products
Product image files
```

```txt
routes/web.php
Web routes
```

---

## Notes

Some parts of the project are implemented as demo features:

- Shopping cart is session-based.
- Checkout is a demo checkout process.
- Contact messages are validated but not stored in the database.
- Product reviews are displayed statically.
- FAQ content is static.

These choices were made to keep the project simple, safe, and focused on Laravel fundamentals.

---

## Final Project Summary

QrazCart demonstrates a Laravel e-commerce application with:

- MVC structure
- Database relationships
- Authentication
- Authorization
- Admin panel
- CRUD operations
- Shopping cart
- Product images
- Search and category filtering
- Contact page
- FAQ page
- About page
- Improved UI design
- GitHub version control

This project was developed as a final project for the Advanced Web Programming course.
