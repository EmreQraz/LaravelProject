@extends('layouts.shop')

@section('title', 'Reset Password - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Reset Password</h2>
                <p>Create a new password for your QrazCart account.</p>
            </div>

            <div class="admin-actions">
                <a href="/login" class="btn btn-secondary">Back to Login</a>
            </div>
        </div>

        @if($errors->any())
            <div class="error-message">
                Please check the form fields and try again.
            </div>
        @endif

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <p>
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
            </p>

            <p>
                <label>New Password</label>
                <input type="password" name="password" required>
            </p>

            <p>
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" required>
            </p>

            <div class="admin-actions">
                <button type="submit" class="btn">
                    Reset Password
                </button>
            </div>
        </form>
    </div>

@endsection
