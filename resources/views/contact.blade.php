@extends('layouts.shop')

@section('title', 'Contact Us - QrazCart')

@section('content')

    <div class="admin-box">
        <h2>Contact Us</h2>
        <p>
            Have a question about QrazCart? Send us a message using the form below.
        </p>

        @if(session('success'))
            <p style="margin-top: 20px; color: green; font-weight: bold;">
                {{ session('success') }}
            </p>
        @endif

        @if($errors->any())
            <div style="margin-top: 20px; color: #dc2626; font-weight: bold;">
                Please fill in all fields correctly.
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 30px; margin-top: 30px;">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf

                <p>
                    <label>Name</label><br>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           style="width: 100%; padding: 12px; margin: 8px 0 15px; border: 1px solid #e5e7eb; border-radius: 10px;">
                </p>

                <p>
                    <label>Email</label><br>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           style="width: 100%; padding: 12px; margin: 8px 0 15px; border: 1px solid #e5e7eb; border-radius: 10px;">
                </p>

                <p>
                    <label>Message</label><br>
                    <textarea name="message" required
                              style="width: 100%; padding: 12px; margin: 8px 0 15px; height: 130px; border: 1px solid #e5e7eb; border-radius: 10px;">{{ old('message') }}</textarea>
                </p>

                <button type="submit" class="btn">Send Message</button>
            </form>

            <div style="background: linear-gradient(135deg, #f8fafc, #ede9fe); padding: 25px; border-radius: 18px; border: 1px solid #e5e7eb;">
                <h3 style="margin-bottom: 15px;">QrazCart Support</h3>

                <p style="margin-bottom: 12px;">
                    <strong>Email:</strong><br>
                    support@qrazcart.com
                </p>

                <p style="margin-bottom: 12px;">
                    <strong>Phone:</strong><br>
                    +90 555 000 00 00
                </p>

                <p style="margin-bottom: 12px;">
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
