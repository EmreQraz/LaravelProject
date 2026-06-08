# QrazCart - Advanced Web Programming Final Project

**Student Name:** YUNUS EMRE KİRAZ  
**Student Number:** 20222022405

---

## Project Description

QrazCart is a Laravel-based e-commerce web application developed for the Advanced Web Programming course.

The project includes product listing, product detail pages, authentication, role-based admin access, shopping cart functionality, order management, user dashboard, profile management, product images, product search, FAQ, contact page, about page, responsive UI design, and GitHub version control.

QrazCart was designed as a simple but functional e-commerce platform where users can browse products, add products to cart, place orders, and view their order history. Admin users can manage products and view customer orders through a protected admin panel.

---

## Main Features

- Laravel MVC project structure
- QrazCart custom branding
- Modern responsive user interface
- Favicon added for browser tab
- Warm and compact visual design
- Smooth UI animations
- Active navbar link styling
- Homepage with hero section
- Sliding featured products carousel
- Product categories
- Product listing page
- Product detail page
- Product search functionality
- Category-based product filtering
- Product images
- Shopping cart system
- Cart item count in navbar
- Product images displayed in cart
- Cart total price calculation
- Remove product from cart
- Clear cart
- Checkout system
- Orders stored in database
- Order items stored in database
- Product stock decreases after checkout
- Add to Cart disabled when stock is 0
- Out of Stock button for unavailable products
- Login required for cart and checkout actions
- User registration
- User login
- User logout
- Styled authentication pages
- Styled forgot password page
- Styled reset password page
- Styled confirm password page
- Styled verify email page
- User dashboard
- User profile page
- Profile update form
- Password update form
- Delete account section
- My Orders page for users
- User order detail page
- Role-based authorization
- Admin-only dashboard
- Admin product management
    - List products
    - Create products
    - Edit products
    - Update products
    - Delete products
    - Add product image path
    - Manage stock
- Admin order management
    - View all orders
    - View order details
    - View ordered products
    - View total order price
- Admin dashboard statistics
    - Total products
    - Total categories
    - Total stock
    - Total orders
- Contact Us page
- FAQ page
- About Us page
- Social media links
- Static product reviews section
- Improved footer design
- Improved typography
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

- Admin
- User

Only users with the `admin` role can access the admin panel and product management pages.

Normal users can browse products, add products to cart, place orders, view their own orders, and manage their profile.

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
/my-orders
User order history page
```

```txt
/my-orders/{order}
User order detail page
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
/forgot-password
Forgot password page
```

```txt
/profile
User profile settings page
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

```txt
/admin/products/{product}/edit
Edit product page
```

```txt
/admin/orders
Admin order management page
```

```txt
/admin/orders/{order}
Admin order detail page
```

---

## Database Structure

The project uses SQLite as the database.

Main database tables:

- users
- roles
- role_user
- categories
- products
- orders
- order_items

---

## Products Table

The products table includes:

- id
- category_id
- name
- description
- price
- icon
- image
- stock
- created_at
- updated_at

Products belong to categories.

---

## Orders Table

The orders table includes:

- id
- user_id
- customer_name
- customer_email
- total_price
- status
- created_at
- updated_at

Orders belong to users.

---

## Order Items Table

The order_items table includes:

- id
- order_id
- product_id
- product_name
- price
- quantity
- subtotal
- created_at
- updated_at

Order items belong to orders and products.

---

## Role System

The project uses a many-to-many relationship between users and roles.

Main role-related tables:

- roles
- role_user

Admin-only routes are protected with middleware. Normal users cannot access admin pages.

---

## Shopping Cart

The shopping cart is implemented using Laravel session.

Cart features:

- Login required for cart actions
- Add product to cart
- Increase quantity when the same product is added again
- Store product image in cart session
- Show product image in cart page
- Show cart item count in navbar
- Show subtotal and total price
- Remove product from cart
- Clear cart
- Checkout process

For simplicity, the cart is session-based instead of database-based.

---

## Checkout and Orders

The checkout process creates a real order record in the database.

During checkout:

1. The cart is checked.
2. Product stock availability is checked.
3. An order record is created.
4. Order item records are created.
5. Product stock is reduced.
6. Cart session is cleared.
7. A success message is displayed.

If product stock is not enough, checkout is stopped.

---

## Stock Management

The project includes product stock logic.

Stock features:

- Admin can update product stock.
- Product stock decreases after checkout.
- If stock is 0, Add to Cart is disabled.
- Out of Stock button is shown for unavailable products.
- Controller-level stock control prevents invalid cart actions.

---

## My Orders

Authenticated users can view their own orders from the My Orders page.

Features:

- View all personal orders
- View order date
- View total price
- View status
- View order detail
- Prevent access to other users' orders

---

## Admin Panel

The admin panel includes:

- Dashboard statistics
- Product management
- Order management

Admin product management includes:

- Create product
- List products
- Edit product
- Update product
- Delete product
- Manage product image path
- Manage product stock

Admin order management includes:

- View all orders
- View order details
- View customer information
- View order items
- View total price

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

For safety and simplicity, contact messages are not stored in the database in the current version.

---

## FAQ Page

The FAQ page includes common questions about:

- Creating an account
- Adding products to cart
- Removing products from cart
- Admin panel access
- Tracking orders
- Contacting support

---

## About Page

The About Us page includes:

- Project description
- Project purpose
- Technologies used
- QrazCart explanation
- Project features
- Social media links
- GitHub repository link

---

## Product Reviews

The product detail page includes a static customer reviews section.

This section demonstrates how product reviews can be displayed on an e-commerce website.

For simplicity, reviews are not stored in the database in the current version.

---

## User Dashboard

The user dashboard includes:

- Profile summary
- Account type
- Edit profile link
- Change password link
- My Orders link
- Recent orders section
- Address book placeholder

Admin users also see a link to the admin panel.

---

## Authentication Pages

The default Laravel Breeze authentication pages were redesigned to match the QrazCart layout.

Updated pages include:

- Login
- Register
- Forgot Password
- Reset Password
- Confirm Password
- Verify Email
- Profile Settings

---

## User Interface Improvements

The project includes multiple UI improvements:

- Modern navbar
- Active navigation link effect
- Logged-in username in navbar
- Responsive layout
- Compact layout scale
- Warm lighting background
- Product card hover effects
- Smooth page animations
- Improved cart page
- Improved admin pages
- Improved contact page
- Improved FAQ page
- Improved about page
- Improved dashboard and profile pages
- Improved footer
- Sliding featured products carousel

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
4. Add database models, migrations and seeders
5. Add authentication system with Breeze
6. Add role system and admin protection
7. Add admin product management
8. Add QrazCart branding
9. Improve homepage UI
10. Improve admin dashboard
11. Add dashboard navigation
12. Add category filtering
13. Add shopping cart functionality
14. Add product images and sample products
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
25. Add order and order item system
26. Add total orders stat to admin dashboard
27. Improve forms, tables and buttons
28. Improve product cards
29. Improve shopping cart page
30. Improve admin orders pages
31. Improve navbar design
32. Reduce hero section size
33. Improve contact and FAQ pages
34. Improve about page
35. Improve admin product pages
36. Add smooth UI animations
37. Polish visual design and layout scale
38. Update dashboard and profile pages
39. Add sliding featured products carousel
40. Add active navigation link styles
41. Require login for cart actions
42. Update authentication pages design
43. Show logged-in username in navbar
44. Add favicon
45. Add My Orders page
46. Reduce product stock after checkout
47. Disable Add to Cart for out of stock products
48. Show product images in cart

---

## Project Structure

```txt
app/Models
Category, Product, Role, User, Order, OrderItem models
```

```txt
app/Http/Controllers
CartController, MyOrderController
```

```txt
app/Http/Controllers/Admin
ProductController, OrderController
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
resources/views/cart
Shopping cart page
```

```txt
resources/views/orders
User order list and order detail pages
```

```txt
resources/views/admin
Admin dashboard, product management and order management pages
```

```txt
resources/views/auth
Authentication pages
```

```txt
resources/views/profile
Profile settings pages
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

Some parts of the project are implemented as demo or simplified features:

- Shopping cart is session-based.
- Contact messages are validated but not stored in the database.
- Product reviews are displayed statically.
- FAQ content is static.
- Product images are added using image paths instead of file upload.
- Checkout does not currently include a full address/payment form.

These choices were made to keep the project simple, safe, and focused on Laravel fundamentals.

---

## Possible Future Improvements

The project can be improved further with:

- Admin order status update
- Admin order status filtering
- Admin product show page
- Checkout form with address, phone, city, country, zip code, shipping method and payment method
- Database-backed cart table
- Contact messages stored in database
- Admin contact message management
- Real product review system
- Product image upload system

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
- Order system
- Stock management
- User order history
- Product images
- Product search
- Category filtering
- Contact page
- FAQ page
- About page
- Responsive UI design
- JavaScript carousel
- GitHub version control

This project was developed as a final project for the Advanced Web Programming course.
