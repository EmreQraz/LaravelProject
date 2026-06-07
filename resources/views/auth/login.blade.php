@extends('layouts.shop')

@section('title', 'Login - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Login to QrazCart</h2>
                <p>Access your account to manage your cart, orders and profile.</p>
            </div>

            <div class="admin-actions">
                <a href="/register" class="btn btn-secondary">Create Account</a>
            </div>
        </div>

        @if(session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message">
                Please check your email and password.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <p>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </p>

            <p>
                <label>Password</label>
                <input type="password" name="password" required>
            </p>

            <p style="display: flex; align-items: center; gap: 8px; margin-bottom: 18px;">
                <input type="checkbox" name="remember" id="remember_me" style="width: auto; margin: 0;">
                <label for="remember_me" style="margin: 0;">Remember me</label>
            </p>

            <div class="admin-actions">
                <button type="submit" class="btn">
                    Login
                </button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="btn btn-secondary">
                        Forgot Password?
                    </a>
                @endif
            </div>
        </form>
    </div>

@endsection
