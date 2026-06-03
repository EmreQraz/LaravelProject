@extends('layouts.shop')

@section('title', 'FAQ - QrazCart')

@section('content')

    <div class="admin-box">
        <div class="faq-header">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about using QrazCart.</p>
        </div>

        <div class="faq-list">
            <div class="faq-item">
                <h3>How can I create an account?</h3>
                <p>
                    You can create an account by clicking the Register link in the navigation menu.
                </p>
            </div>

            <div class="faq-item">
                <h3>How can I add products to my cart?</h3>
                <p>
                    You can add products to your cart by clicking the Add to Cart button on product cards or product detail pages.
                </p>
            </div>

            <div class="faq-item">
                <h3>Can I remove products from my cart?</h3>
                <p>
                    Yes. You can remove individual products or clear the whole cart from the Shopping Cart page.
                </p>
            </div>

            <div class="faq-item">
                <h3>Who can access the admin panel?</h3>
                <p>
                    Only users with the admin role can access the admin panel and product management pages.
                </p>
            </div>

            <div class="faq-item">
                <h3>How can I track my orders?</h3>
                <p>
                    Orders are stored after checkout and can be viewed by admin users from the admin orders page.
                </p>
            </div>

            <div class="faq-item">
                <h3>How can I contact support?</h3>
                <p>
                    You can use the Contact page to send a message to QrazCart support.
                </p>
            </div>
        </div>
    </div>

@endsection
