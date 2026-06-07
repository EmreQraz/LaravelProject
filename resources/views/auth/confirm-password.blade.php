@extends('layouts.shop')

@section('title', 'Confirm Password - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Confirm Password</h2>
                <p>Please confirm your password before continuing.</p>
            </div>

            <div class="admin-actions">
                <a href="/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>

        @if($errors->any())
            <div class="error-message">
                The password is incorrect. Please try again.
            </div>
        @endif

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <p>
                <label>Password</label>
                <input type="password" name="password" required autofocus>
            </p>

            <div class="admin-actions">
                <button type="submit" class="btn">
                    Confirm
                </button>
            </div>
        </form>
    </div>

@endsection
