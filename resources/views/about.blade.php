@extends('layouts.shop')

@section('title', 'About Us - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="about-hero">
            <h2>About QrazCart</h2>
            <p>
                QrazCart is a modern Laravel-based e-commerce web application developed for the
                Advanced Web Programming final project. It demonstrates product management,
                authentication, authorization, shopping cart, orders, and a clean user interface.
            </p>
        </div>

        <div class="admin-stats">
            <div class="stat-card">
                <h3>Laravel</h3>
                <p>Backend Framework</p>
            </div>

            <div class="stat-card">
                <h3>Blade</h3>
                <p>Template Engine</p>
            </div>

            <div class="stat-card">
                <h3>SQLite</h3>
                <p>Database System</p>
            </div>

            <div class="stat-card">
                <h3>GitHub</h3>
                <p>Version Control</p>
            </div>
        </div>

        <div class="about-section">
            <h3>Project Purpose</h3>
            <p>
                The main purpose of QrazCart is to demonstrate a full-stack Laravel application
                with database relationships, user authentication, role-based authorization,
                CRUD operations, session-based cart functionality, order records, and responsive design.
            </p>
        </div>

        <div class="about-section">
            <h3>Why QrazCart?</h3>
            <p>
                QrazCart was designed to look and work like a simple real-world e-commerce platform.
                Users can browse products, view details, add products to cart, complete checkout,
                and contact support. Admin users can manage products and view customer orders
                through a protected admin panel.
            </p>
        </div>

        <div class="about-section">
            <h3>Project Features</h3>
            <p>
                The project includes product images, product search, category filtering, shopping cart,
                checkout, admin product management, admin order management, FAQ, contact page,
                customer reviews section, and improved UI styling.
            </p>
        </div>

        <div class="about-section">
            <h3>Follow QrazCart</h3>
            <p>
                You can find QrazCart on social platforms and GitHub.
            </p>

            <div class="social-links">
                <a href="https://github.com/EmreQraz/LaravelProject" target="_blank" class="social-link">
                    GitHub
                </a>

                <a href="#" class="social-link secondary">
                    Instagram @qrazcart
                </a>

                <a href="#" class="social-link secondary">
                    X / Twitter @qrazcart
                </a>

                <a href="#" class="social-link secondary">
                    LinkedIn
                </a>
            </div>
        </div>
    </div>

@endsection
