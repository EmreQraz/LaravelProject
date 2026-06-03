@extends('layouts.shop')

@section('title', 'Contact Us - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="contact-header">
            <h2>Contact Us</h2>
            <p>Have a question about QrazCart? Send us a message using the form below.</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="error-message">
                Please fill in all fields correctly.
            </div>
        @endif

        <div class="info-grid">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <p>
                    <label>Name</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" required>
                </p>

                <p>
                    <label>Email</label><br>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                </p>

                <p>
                    <label>Message</label><br>
                    <textarea name="message" required style="height: 140px;">{{ old('message') }}</textarea>
                </p>

                <button type="submit" class="btn">Send Message</button>
            </form>

            <div class="info-card">
                <h3>QrazCart Support</h3>

                <p>
                    <strong>Email:</strong><br>
                    support@qrazcart.com
                </p>

                <p>
                    <strong>Phone:</strong><br>
                    +90 555 000 00 00
                </p>

                <p>
                    <strong>Address:</strong><br>
                    Istanbul, Türkiye
                </p>

                <p>
                    We usually respond to messages within 24 hours.
                </p>
            </div>
        </div>
    </div>

@endsection
