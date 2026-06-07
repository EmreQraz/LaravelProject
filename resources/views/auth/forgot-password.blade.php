@extends('layouts.shop')

@section('title', 'Forgot Password - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Forgot Password</h2>
                <p>Enter your email address and we will send you a password reset link.</p>
            </div>

            <div class="admin-actions">
                <a href="/login" class="btn btn-secondary">Back to Login</a>
            </div>
        </div>

        @if(session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message">
                Please enter a valid email address.
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <p>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus>
            </p>

            <div class="admin-actions">
                <button type="submit" class="btn">
                    Send Reset Link
                </button>
            </div>
        </form>
    </div>

@endsection
