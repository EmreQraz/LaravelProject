@extends('layouts.shop')

@section('title', 'Register - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Create Your QrazCart Account</h2>
                <p>Register to add products to your cart and place orders.</p>
            </div>

            <div class="admin-actions">
                <a href="/login" class="btn btn-secondary">Already Registered?</a>
            </div>
        </div>

        @if($errors->any())
            <div class="error-message">
                Please check the form fields and try again.
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <p>
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required autofocus>
            </p>

            <p>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </p>

            <div class="form-row">
                <p>
                    <label>Password</label>
                    <input type="password" name="password" required>
                </p>

                <p>
                    <label>Confirm Password</label>
                    <input type="password" name="password_confirmation" required>
                </p>
            </div>

            <div class="admin-actions">
                <button type="submit" class="btn">
                    Register
                </button>

            </div>
        </form>
    </div>

@endsection
