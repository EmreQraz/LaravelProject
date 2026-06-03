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
            padding: 65px 70px;
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
            font-size: 44px;
            line-height: 1.1;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 17px;
            color: #e2e8f0;
            margin-bottom: 30px;
            max-width: 720px;
        }

        .hero-card {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 22px;
            padding: 28px;
            text-align: center;
            backdrop-filter: blur(8px);
            box-shadow: 0 18px 35px rgba(0, 0, 0, 0.22);
            max-width: 420px;
            margin-left: auto;
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

        .form-control,
        .admin-box input,
        .admin-box select,
        .admin-box textarea {
            width: 100%;
            padding: 13px 15px;
            margin: 8px 0 16px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background-color: #ffffff;
            color: var(--dark);
            font-size: 15px;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-control:focus,
        .admin-box input:focus,
        .admin-box select:focus,
        .admin-box textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12);
        }

        .admin-box label {
            font-weight: 700;
            color: var(--dark-soft);
        }

        .success-message {
            margin-top: 20px;
            padding: 14px 16px;
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #86efac;
            border-radius: 12px;
            font-weight: 700;
        }

        .error-message {
            margin-top: 20px;
            padding: 14px 16px;
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 12px;
            font-weight: 700;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
        }

        .status-completed {
            background-color: #dcfce7;
            color: #166534;
        }

        .empty-state {
            margin-top: 30px;
            text-align: center;
            background: #f8fafc;
            padding: 35px;
            border-radius: 18px;
            border: 1px solid var(--border);
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
            grid-template-columns: repeat(4, 1fr);
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

        .product-card {
            position: relative;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            min-height: 245px;
        }

        .product-info p {
            color: var(--muted);
            line-height: 1.5;
        }

        .product-actions {
            margin-top: auto;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 12px 0;
        }

        .stock-text {
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        .product-card:hover .product-image img {
            transform: scale(1.06);
        }

        .product-image img {
            transition: transform 0.3s ease;
        }

        .cart-summary {
            margin-top: 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, #f8fafc, #ede9fe);
            padding: 22px;
            border-radius: 18px;
            border: 1px solid var(--border);
        }

        .cart-summary h3 {
            font-size: 26px;
            color: var(--primary-dark);
        }

        .cart-actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .cart-product {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .cart-product-icon {
            font-size: 26px;
        }

        .cart-empty {
            margin-top: 30px;
            text-align: center;
            background: linear-gradient(135deg, #f8fafc, #ede9fe);
            padding: 45px;
            border-radius: 22px;
            border: 1px solid var(--border);
        }

        .cart-empty h3 {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .cart-empty p {
            color: var(--muted);
            margin-bottom: 22px;
        }

        .order-info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
            margin: 25px 0;
        }

        .order-info-card {
            background: linear-gradient(135deg, #f8fafc, #ede9fe);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
        }

        .order-info-card p {
            color: var(--muted);
            margin-bottom: 8px;
            font-weight: 700;
        }

        .order-info-card h3 {
            color: var(--dark);
            font-size: 20px;
        }

        .order-total-box {
            margin-top: 25px;
            background: linear-gradient(135deg, var(--dark), var(--dark-soft));
            color: var(--white);
            padding: 22px;
            border-radius: 18px;
            text-align: right;
        }

        .order-total-box p {
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        .order-total-box h3 {
            font-size: 28px;
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav-link {
            color: var(--white);
            text-decoration: none;
            padding: 9px 12px;
            border-radius: 10px;
            font-weight: 700;
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--accent);
            transform: translateY(-1px);
        }

        .logo-link {
            color: var(--white);
            text-decoration: none;
        }

        .cart-badge {
            background-color: var(--accent);
            color: var(--dark);
            padding: 3px 8px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            margin-left: 4px;
        }

        .nav-logout-btn {
            background: rgba(255, 255, 255, 0.08);
            border: none;
            color: var(--white);
            padding: 9px 12px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            font-size: 15px;
            transition: background-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .nav-logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.14);
            color: var(--accent);
            transform: translateY(-1px);
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 30px;
            margin-top: 30px;
        }

        .info-card {
            background: linear-gradient(135deg, #f8fafc, #ede9fe);
            padding: 25px;
            border-radius: 18px;
            border: 1px solid var(--border);
        }

        .info-card h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        .info-card p {
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 12px;
        }

        .faq-list {
            margin-top: 30px;
            display: grid;
            gap: 18px;
        }

        .faq-item {
            padding: 24px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: #f8fafc;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .faq-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
        }

        .faq-item h3 {
            color: var(--primary-dark);
            margin-bottom: 10px;
        }

        .faq-item p {
            color: var(--muted);
            line-height: 1.7;
        }

        .contact-header,
        .faq-header {
            text-align: center;
            margin-bottom: 10px;
        }

        .contact-header p,
        .faq-header p {
            color: var(--muted);
            margin-top: 10px;
        }

        .about-hero {
            text-align: center;
            margin-bottom: 30px;
        }

        .about-hero p {
            color: var(--muted);
            max-width: 850px;
            margin: 12px auto 0;
            line-height: 1.7;
        }

        .about-section {
            margin-top: 25px;
            padding: 26px;
            border-radius: 20px;
            background: #f8fafc;
            border: 1px solid var(--border);
        }

        .about-section h3 {
            color: var(--primary-dark);
            margin-bottom: 12px;
        }

        .about-section p {
            color: var(--muted);
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .social-link {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            text-decoration: none;
            font-weight: 800;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .social-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(124, 58, 237, 0.35);
        }

        .social-link.secondary {
            background: var(--accent);
            color: var(--dark);
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .admin-header p {
            color: var(--muted);
            margin-top: 8px;
        }

        .admin-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .product-thumb {
            width: 58px;
            height: 58px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid var(--border);
        }

        .form-card {
            max-width: 850px;
            margin: 0 auto;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-help {
            color: var(--muted);
            font-size: 13px;
            margin-top: -8px;
            margin-bottom: 14px;
        }

        .admin-product-name {
            font-weight: 800;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes softFade {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .hero,
        .section,
        .admin-box,
        .detail-box {
            animation: fadeUp 0.55s ease both;
        }

        .product-card,
        .category-card,
        .stat-card,
        .faq-item,
        .info-card,
        .about-section,
        .order-info-card {
            animation: fadeUp 0.5s ease both;
        }

        .product-card:nth-child(1),
        .category-card:nth-child(1),
        .stat-card:nth-child(1) {
            animation-delay: 0.05s;
        }

        .product-card:nth-child(2),
        .category-card:nth-child(2),
        .stat-card:nth-child(2) {
            animation-delay: 0.1s;
        }

        .product-card:nth-child(3),
        .category-card:nth-child(3),
        .stat-card:nth-child(3) {
            animation-delay: 0.15s;
        }

        .product-card:nth-child(4),
        .category-card:nth-child(4),
        .stat-card:nth-child(4) {
            animation-delay: 0.2s;
        }

        table {
            animation: softFade 0.45s ease both;
        }

        .btn,
        .nav-link,
        .social-link {
            will-change: transform;
        }

        @keyframes floatSoft {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-6px);
            }
            100% {
                transform: translateY(0);
            }
        }

        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 0 rgba(124, 58, 237, 0);
            }
            50% {
                box-shadow: 0 0 22px rgba(124, 58, 237, 0.28);
            }
            100% {
                box-shadow: 0 0 0 rgba(124, 58, 237, 0);
            }
        }

        .hero-card {
            animation: fadeUp 0.65s ease both, floatSoft 4s ease-in-out infinite;
        }

        .stat-card:hover,
        .info-card:hover,
        .about-section:hover,
        .order-info-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.1);
        }

        .stat-card,
        .info-card,
        .about-section,
        .order-info-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .cart-summary {
            animation: pulseGlow 1.8s ease-in-out 1;
        }

        .status-badge {
            animation: softFade 0.4s ease both;
        }

        @media (max-width: 900px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 900px) {
            .navbar {
                padding: 16px 25px;
                flex-direction: column;
                gap: 15px;
            }

            .order-info-grid {
                grid-template-columns: 1fr;
            }

            .hero {
                grid-template-columns: 1fr;
                padding: 45px 25px;
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
            .info-grid {
                grid-template-columns: 1fr;
            }

            .detail-box > div {
                grid-template-columns: 1fr !important;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <a href="/" class="logo-link">
        <h1>🛒 QrazCart</h1>
    </a>

    <div class="nav-links">
        <a href="/" class="nav-link">Home</a>
        <a href="/products" class="nav-link">Products</a>

        @php
            $cartCount = collect(session('cart', []))->sum('quantity');
        @endphp

        <a href="/cart" class="nav-link">
            Cart
            @if($cartCount > 0)
                <span class="cart-badge">{{ $cartCount }}</span>
            @endif
        </a>

        <a href="/faq" class="nav-link">FAQ</a>
        <a href="/about" class="nav-link">About</a>
        <a href="/contact" class="nav-link">Contact</a>
        <a href="/admin" class="nav-link">Admin</a>

        @auth
            <a href="/dashboard" class="nav-link">Dashboard</a>

            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="nav-logout-btn">Logout</button>
            </form>
        @else
            <a href="/login" class="nav-link">Login</a>
            <a href="/register" class="nav-link">Register</a>
        @endauth
    </div>
</nav>

@yield('content')

<footer class="footer">
    <div style="display: grid; grid-template-columns: 1.2fr 1fr 1fr; gap: 30px; text-align: left; max-width: 1100px; margin: 0 auto;">
        <div>
            <h3 style="margin-bottom: 12px;">🛒 QrazCart</h3>
            <p style="color: #cbd5e1;">
                A modern Laravel-based e-commerce project with products, cart, authentication,
                admin panel, FAQ, contact and user-friendly design.
            </p>
        </div>

        <div>
            <h3 style="margin-bottom: 12px;">Quick Links</h3>
            <p style="line-height: 2;">
                <a href="/" style="color: #cbd5e1; text-decoration: none;">Home</a><br>
                <a href="/products" style="color: #cbd5e1; text-decoration: none;">Products</a><br>
                <a href="/cart" style="color: #cbd5e1; text-decoration: none;">Cart</a><br>
                <a href="/faq" style="color: #cbd5e1; text-decoration: none;">FAQ</a><br>
                <a href="/about" style="color: #cbd5e1; text-decoration: none;">About</a><br>
                <a href="/contact" style="color: #cbd5e1; text-decoration: none;">Contact</a>
            </p>
        </div>

        <div>
            <h3 style="margin-bottom: 12px;">Project</h3>
            <p style="color: #cbd5e1; line-height: 2;">
                Laravel Framework<br>
                Blade Templates<br>
                SQLite Database<br>
                GitHub Version Control
            </p>

            <a href="https://github.com/EmreQraz/LaravelProject" target="_blank" style="color: #f59e0b; text-decoration: none; font-weight: bold;">
                View on GitHub
            </a>
        </div>
    </div>

    <div style="border-top: 1px solid rgba(255,255,255,0.15); margin-top: 28px; padding-top: 18px;">
        <p>© 2026 QrazCart | Advanced Web Programming Final Project</p>
    </div>
</footer>

</body>
</html>
