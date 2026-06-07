@extends('layouts.shop')

@section('title', 'Verify Email - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Verify Your Email</h2>
                <p>
                    Thanks for signing up. Please verify your email address by clicking the link we sent to your inbox.
                </p>
            </div>

            <div class="admin-actions">
                <a href="/dashboard" class="btn btn-secondary">Dashboard</a>
            </div>
        </div>

        @if(session('status') == 'verification-link-sent')
            <div class="success-message">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <div class="about-section">
            <h3>Email Verification Required</h3>
            <p>
                If you did not receive the email, you can request a new verification link below.
            </p>

            <div class="admin-actions" style="margin-top: 20px;">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn">
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
