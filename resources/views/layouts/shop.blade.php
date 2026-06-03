<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'QrazCart')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --dark: #0f172a;
            --dark-soft: #1e293b;
            --primary: #7c3aed;
            --primary-dark: #6d28d9;
            --accent: #f59e0b;
            --light: #f8fafc;
            --muted: #64748b;
            --success: #16a34a;
            --white: #ffffff;
            --border: #e5e7eb;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Inter', Arial, sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
        }

        .navbar {
            background: linear-gradient(90deg, var(--dark), var(--dark-soft));
            color: var(--white);
            padding: 18px 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 14px rgba(15, 23, 42, 0.25);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar h1 {
            font-size: 26px;
            letter-spacing: 0.5px;
        }

        .navbar a {
            color: var(--white);
            text-decoration: none;
            margin-left: 22px;
            font-weight: bold;
            transition: color 0.2s ease;
        }

        .navbar a:hover {
            color: var(--accent);
        }

        .logout-btn {
            background: none;
            border: none;
            color: var(--white);
            font-weight: bold;
            cursor: pointer;
            margin-left: 20px;
            font-size: 16px;
        }

        .logout-btn:hover {
            color: var(--accent);
        }

        .hero {
            padding: 90px 70px;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(124, 58, 237, 0.82)),
                radial-gradient(circle at top right, rgba(245, 158, 11, 0.45), transparent 35%);
            color: var(--white);
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 40px;
            align-items: center;
        }

        .hero h2 {
            font-size: 52px;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 19px;
            color: #e2e8f0;
            margin-bottom: 30px;
            max-width: 720px;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 24px;
            padding: 35px;
            text-align: center;
            backdrop-filter: blur(8px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.22);
        }

        .hero-card .icon {
            font-size: 80px;
            margin-bottom: 15px;
        }

        .hero-card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--white);
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(124, 58, 237, 0.35);
        }

        .btn-secondary {
            background: var(--accent);
            margin-left: 10px;
        }

        .section {
            padding: 55px 70px;
        }

        .section h2 {
            text-align: center;
            margin-bottom: 35px;
            font-size: 34px;
        }

        .categories {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .category-card {
            background-color: var(--white);
            padding: 32px;
            text-align: center;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            font-weight: bold;
            border: 1px solid var(--border);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            text-decoration: none;
            color: var(--dark);
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 32px rgba(15, 23, 42, 0.14);
        }

        .products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }

        .product-card {
            background-color: var(--white);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            border: 1px solid var(--border);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 35px rgba(15, 23, 42, 0.14);
        }

        .product-image {
            height: 220px;
            background: linear-gradient(135deg, #ede9fe, #e0f2fe);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-image .fallback-icon {
            font-size: 58px;
        }

        .product-info {
            padding: 22px;
        }

        .product-info h3 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .badge {
            display: inline-block;
            background-color: #ede9fe;
            color: var(--primary-dark);
            padding: 5px 10px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .price {
            color: var(--success);
            font-weight: bold;
            font-size: 22px;
            margin: 14px 0;
        }

        .detail-box {
            max-width: 850px;
            margin: 55px auto;
            background-color: var(--white);
            padding: 45px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.1);
            text-align: center;
            border: 1px solid var(--border);
        }

        .detail-icon {
            font-size: 95px;
            margin-bottom: 20px;
        }

        .admin-box {
            max-width: 1050px;
            margin: 55px auto;
            background-color: var(--white);
            padding: 42px;
            border-radius: 22px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.1);
            border: 1px solid var(--border);
        }

        .admin-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin: 25px 0;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8fafc, #ede9fe);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
        }

        .stat-card h3 {
            font-size: 28px;
            color: var(--primary-dark);
        }

        .stat-card p {
            color: var(--muted);
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            overflow: hidden;
            border-radius: 14px;
        }

        table th,
        table td {
            border: 1px solid var(--border);
            padding: 13px;
            text-align: left;
        }

        table th {
            background-color: var(--dark);
            color: var(--white);
        }

        table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .footer {
            background: linear-gradient(90deg, var(--dark), var(--dark-soft));
            color: var(--white);
            text-align: center;
            padding: 28px;
            margin-top: 45px;
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 16px 25px;
                flex-direction: column;
                gap: 15px;
            }

            .hero {
                grid-template-columns: 1fr;
                padding: 60px 28px;
                text-align: center;
            }

            .hero h2 {
                font-size: 36px;
            }

            .hero p {
                margin-left: auto;
                margin-right: auto;
            }

            .section {
                padding: 38px 25px;
            }

            .categories,
            .products,
            .admin-stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <h1>🛒 QrazCart</h1>

    <div>
        <a href="/">Home</a>
        <a href="/products">Products</a>
        <a href="/cart">Cart</a>
        <a href="/admin">Admin</a>

        @auth
            <a href="/dashboard">Dashboard</a>

            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>
</nav>

@yield('content')

<footer class="footer">
    <p>© 2026 QrazCart | Advanced Web Programming Final Project</p>
</footer>

</body>
</html>
