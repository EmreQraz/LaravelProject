<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaravelShop - E-Commerce</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f6fa;
            color: #222;
        }

        .navbar {
            background-color: #111827;
            color: white;
            padding: 18px 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            font-size: 24px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
        }

        .hero {
            padding: 80px 60px;
            background: linear-gradient(to right, #1f2937, #4b5563);
            color: white;
            text-align: center;
        }

        .hero h2 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            background-color: #f59e0b;
            color: white;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }

        .section {
            padding: 50px 60px;
        }

        .section h2 {
            text-align: center;
            margin-bottom: 35px;
            font-size: 30px;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .category-card {
            background-color: white;
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            font-weight: bold;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
        }

        .product-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        .product-image {
            height: 180px;
            background-color: #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 50px;
        }

        .product-info {
            padding: 20px;
        }

        .product-info h3 {
            margin-bottom: 10px;
        }

        .price {
            color: #16a34a;
            font-weight: bold;
            font-size: 20px;
            margin: 12px 0;
        }

        .footer {
            background-color: #111827;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 15px 25px;
                flex-direction: column;
                gap: 15px;
            }

            .hero {
                padding: 50px 25px;
            }

            .hero h2 {
                font-size: 30px;
            }

            .section {
                padding: 35px 25px;
            }

            .categories,
            .products {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <h1>LaravelShop</h1>
    <div>
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Login</a>
        <a href="#">Admin</a>
    </div>
</nav>

<section class="hero">
    <h2>Welcome to LaravelShop</h2>
    <p>Modern Laravel based e-commerce project for Advanced Web Programming course.</p>
    <a href="#" class="btn">View Products</a>
</section>

<section class="section">
    <h2>Categories</h2>

    <div class="categories">
        <div class="category-card">Electronics</div>
        <div class="category-card">Fashion</div>
        <div class="category-card">Books</div>
        <div class="category-card">Home & Living</div>
    </div>
</section>

<section class="section">
    <h2>Featured Products</h2>

    <div class="products">
        <div class="product-card">
            <div class="product-image">💻</div>
            <div class="product-info">
                <h3>Laptop</h3>
                <p>High performance laptop for daily work.</p>
                <div class="price">$899</div>
                <a href="#" class="btn">Details</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">📱</div>
            <div class="product-info">
                <h3>Smartphone</h3>
                <p>Latest generation smartphone.</p>
                <div class="price">$699</div>
                <a href="#" class="btn">Details</a>
            </div>
        </div>

        <div class="product-card">
            <div class="product-image">🎧</div>
            <div class="product-info">
                <h3>Headphones</h3>
                <p>Wireless headphones with clear sound.</p>
                <div class="price">$149</div>
                <a href="#" class="btn">Details</a>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <p>© 2026 LaravelShop | Advanced Web Programming Final Project</p>
</footer>

</body>
</html>
