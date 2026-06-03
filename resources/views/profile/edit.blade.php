@extends('layouts.shop')

@section('title', 'Edit Profile - QrazCart')

@section('content')

    <div class="admin-box form-card">
        <div class="admin-header">
            <div>
                <h2>Profile Settings</h2>
                <p>Update your account information, password, and profile preferences.</p>
            </div>

            <div class="admin-actions">
                <a href="/dashboard" class="btn btn-secondary">Back to Dashboard</a>
            </div>
        </div>

        <div class="about-section">
            <h3>Profile Information</h3>
            <p style="margin-bottom: 20px;">
                Update your name and email address.
            </p>

            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="about-section">
            <h3>Change Password</h3>
            <p style="margin-bottom: 20px;">
                Use a strong password to keep your account secure.
            </p>

            @include('profile.partials.update-password-form')
        </div>

        <div class="about-section">
            <h3>Delete Account</h3>
            <p style="margin-bottom: 20px;">
                Permanently delete your account. This action cannot be undone.
            </p>

            @include('profile.partials.delete-user-form')
        </div>
    </div>

@endsection
