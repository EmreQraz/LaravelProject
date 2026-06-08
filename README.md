# QrazCart - Laravel E-Commerce System

**YUNUS EMRE KİRAZ**
**20222022405**
**GitHub:** EmreQraz

---

## About the Project

QrazCart is a Laravel-based e-commerce web application. The project includes product listing, category filtering, user authentication, role-based admin access, shopping cart, checkout, order management, stock control, and admin product/order management features.

The system is designed as a simple but functional online shopping platform. Users can browse products, add items to their cart, place orders, and view their own order history. Admin users can manage products, categories, and orders.

---

## Technologies Used

* Laravel
* PHP
* MySQL
* XAMPP
* phpMyAdmin
* Blade Templates
* HTML
* CSS
* JavaScript
* Laravel Breeze Authentication

---

## Database Information

This project uses **XAMPP MySQL** as the database system.

Database management can be done using phpMyAdmin:

```txt
http://localhost/phpmyadmin
```

Database name:

```txt
qrazcart
```

Default XAMPP MySQL settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qrazcart
DB_USERNAME=root
DB_PASSWORD=
```

---

## Main Features

### User Features

* User registration and login
* User dashboard
* Profile management
* Product listing
* Product details page
* Category filtering
* Product search
* Shopping cart
* Cart item count in navbar
* Product images in cart
* Checkout page
* Delivery information form
* Payment method selection
* Free shipping campaign
* My Orders page
* User order detail page
* Users can only view their own orders

---

### Admin Features

* Admin dashboard access
* Role-based admin authorization
* Product management
* Category management
* Product create, edit, delete
* Admin product show page
* Product stock management
* Product image path support
* Order management
* Admin order detail page
* Order status update
* Order status filtering

Available order statuses:

```txt
New
Accepted
Cancelled
Onshipping
Completed
```

---

### Shopping Cart Features

* Session-based shopping cart
* Add to cart
* Remove from cart
* Clear cart
* Cart total calculation
* Product image display in cart
* Login required for cart and checkout
* Checkout validates stock before order creation

The project currently uses a **session-based cart system** instead of a database-backed cart table. This keeps the cart system simple and works well for the current project scope.

---

### Checkout and Order Features

* Separate checkout page
* Phone number field
* Address field
* City field
* Payment method field
* Free shipping applied automatically
* Order creation
* Order items creation
* Product stock decreases after checkout
* Cart clears after successful checkout
* Admin can view customer delivery and payment details
* User can view delivery and payment details in order history

Payment methods:

```txt
Cash on Delivery
Bank Transfer
```

Shipping method:

```txt
Free Shipping
```

Free shipping campaign:

```txt
All QrazCart orders include free shipping until the end of 2026.
```

---

## Free Shipping Campaign

The home page includes an animated free shipping campaign section.

Campaign text:

```txt
Free Shipping Campaign!
All QrazCart orders include free shipping until the end of 2026.
```

The campaign section includes a call-to-action button that directs users to the products page.

---

## Project Pages

### Public Pages

* Home
* Products
* Product Details
* About
* FAQ
* Contact
* Login
* Register

### User Pages

* Dashboard
* Profile
* Cart
* Checkout
* My Orders
* Order Details

### Admin Pages

* Admin Dashboard
* Admin Products
* Admin Product Create
* Admin Product Edit
* Admin Product Show
* Admin Categories
* Admin Orders
* Admin Order Details

---

## How to Run the Project

### 1. Start XAMPP

Open XAMPP Control Panel and start:

```txt
MySQL
```

Optional, for phpMyAdmin:

```txt
Apache
```

---

### 2. Open phpMyAdmin

Go to:

```txt
http://localhost/phpmyadmin
```

Create a database named:

```txt
qrazcart
```

---

### 3. Create `.env` File

Laravel projects do not include the `.env` file on GitHub for security reasons.

Create a new `.env` file by copying `.env.example`.

For Windows PowerShell:

```bash
copy .env.example .env
```

For Mac/Linux:

```bash
cp .env.example .env
```

---

### 4. Configure `.env`

Make sure the database settings in `.env` are:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=qrazcart
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Install Dependencies

Run:

```bash
composer install
npm install
```

---

### 6. Generate Application Key

Run:

```bash
php artisan key:generate
```

---

### 7. Run Migrations and Seeders

For a fresh setup, run:

```bash
php artisan migrate:fresh --seed
```

This command creates all database tables and inserts sample data.

---

### 8. Start Laravel Server

Run:

```bash
php artisan serve
```

Then open:

```txt
http://127.0.0.1:8000
```

---

## LAN Demo

To run the project on the same local network, first start XAMPP MySQL.

Then run Laravel with:

```bash
php artisan serve --host=0.0.0.0 --port=8000
```

Find your local IPv4 address using:

```bash
ipconfig
```

Then open the project from another device on the same network:

```txt
http://YOUR_LOCAL_IP:8000
```

Example:

```txt
http://192.168.1.35:8000
```

---

## Default Admin Account

```txt
Email: admin@example.com
Password: password
```

---

## Notes

* The project uses XAMPP MySQL database.
* phpMyAdmin is used for database management.
* The `.env` file is not included on GitHub and must be created from `.env.example`.
* The shopping cart is session-based.
* Users must be logged in to add products to cart and place orders.
* Admin pages are protected with role-based access control.
* Product stock decreases after checkout.
* Products with zero stock cannot be added to cart.
* Free shipping is applied to all orders until the end of 2026.

---

## Future Improvements

Possible future improvements:

* Save contact form messages to the database
* Show contact messages in the admin panel
* Add product image upload system
* Add real product review system
* Add database-backed cart table if needed
* Improve order reporting for admin users

---

## Conclusion

QrazCart is a functional Laravel e-commerce project that includes user authentication, product management, cart system, checkout system, order management, stock control, admin panel, and XAMPP MySQL database integration.

The project demonstrates the core structure and workflow of a Laravel-based online shopping system.
