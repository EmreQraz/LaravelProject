@extends('layouts.shop')

@section('title', 'About Us - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>About QrazCart</h2>
        <p>
            QrazCart is a modern Laravel-based e-commerce web application developed as an
            Advanced Web Programming final project. The project includes product listing,
            product detail pages, authentication, role-based admin access, shopping cart,
            contact page, FAQ page, and admin product management.
        </p>

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
                <h3>GitHub</h3>
                <p>Version Control</p>
            </div>
        </div>

        <div style="margin-top: 30px; padding: 25px; border-radius: 18px; background: #f8fafc; border: 1px solid #e5e7eb;">
            <h3>Project Purpose</h3>
            <p style="margin-top: 12px;">
                The main purpose of QrazCart is to demonstrate a full-stack Laravel application
                with database relationships, user authentication, authorization, CRUD operations,
                shopping cart functionality, and clean user interface design.
            </p>
        </div>

        <div style="margin-top: 25px; padding: 25px; border-radius: 18px; background: #f8fafc; border: 1px solid #e5e7eb;">
            <h3>Why QrazCart?</h3>
            <p style="margin-top: 12px;">
                QrazCart was designed to look and work like a simple real-world e-commerce platform.
                Users can browse products, view product details, add items to cart, and contact support.
                Admin users can manage products through a protected admin panel.
            </p>
        </div>

        <div style="margin-top: 30px;">
            <h3>Follow QrazCart</h3>
            <p style="margin-top: 10px; margin-bottom: 18px;">
                You can find QrazCart on social platforms and GitHub.
            </p>

            <a href="https://github.com/EmreQraz/LaravelProject" target="_blank" class="btn">
                GitHub
            </a>

            <a href="#" class="btn btn-secondary">
                Instagram @qrazcart
            </a>

            <a href="#" class="btn btn-secondary">
                X / Twitter @qrazcart
            </a>

            <a href="#" class="btn btn-secondary">
                LinkedIn
            </a>
        </div>
    </div>

@endsection
