@extends('layouts.app')

@section('content')
@section('title', 'Terms of Service')
@section('description', 'Terms of Service for The Kwéyòl Hub, outlining user responsibilities, content ownership, and modifications.')
@section('keywords', 'Terms of Service, Kwéyòl Hub, User Responsibilities, Content Ownership, Modifications')
@section('author', 'Kwéyòl Hub Team')

<div class="container my-5 legal-page">
    <div class="card shadow-lg rounded-lg mx-auto" style="max-width: 900px;">
        <div class="card-header bg-primary text-white">
            <h1 class="text-center display-4 mb-0">Terms of Service</h1>
        </div>
        <div class="card-body">
            <p class="text-center text-muted mb-5">Last Updated: {{ now()->format('F j, Y') }}</p>

            <div class="alert alert-info">
                <strong>Important:</strong> By accessing or using The Kwéyòl Hub, you agree to be bound by these terms.
                Please read them carefully.
            </div>

            <div class="terms-content">
                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">1. Acceptance of Terms</h2>
                    <p>By using The Kwéyòl Hub ("Service"), you agree to comply with and be bound by these Terms of Service. If you do not agree to these terms, please do not use our website or services.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">2. User Responsibilities</h2>
                    <p>As a user of our Service, you agree to:</p>
                    <ul>
                        <li>Use the website lawfully and ethically</li>
                        <li>Not engage in unauthorized access or data scraping</li>
                        <li>Not upload or share harmful or illegal content</li>
                        <li>Respect intellectual property rights</li>
                        <li>Provide accurate information when required</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">3. Content Ownership</h2>
                    <p>All content provided on The Kwéyòl Hub is protected by copyright and other intellectual property laws:</p>
                    <ul>
                        <li>User-generated content remains the property of its creator</li>
                        <li>Kwéyòl Hub retains rights to display and distribute submitted content</li>
                        <li>Unauthorized use of any content is strictly prohibited</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">4. Account Termination</h2>
                    <p>We reserve the right to suspend or terminate accounts that violate these terms or engage in harmful activities. Users may appeal termination by contacting our support team.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">5. Modifications</h2>
                    <p>We may update these terms periodically. Continued use of the Service after changes constitutes acceptance of the modified terms. Significant changes will be communicated to users.</p>
                </section>

                <section>
                    <h2 class="h4 font-weight-bold border-bottom pb-2">6. Contact Us</h2>
                    <p>For questions about these Terms of Service, please contact us at:</p>
                    <address>
                        <strong>Kwéyòl Hub Support</strong><br>
                        <a href="mailto:support@kweyolhub.com">support@kweyolhub.com</a><br>
                        Maracas Royal Road, St. Joseph<br>
                        Trinidad and Tobago
                    </address>
                </section>
            </div>
        </div>
    </div>
</div>

<style>
    .legal-page {
        font-size: 1.05rem;
    }
    .terms-content section {
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #eee;
        margin-bottom: 1.5rem;
    }
    .terms-content section:last-child {
        border-bottom: none;
    }
    .terms-content ul {
        padding-left: 1.5rem;
    }
    .terms-content li {
        margin-bottom: 0.5rem;
    }
</style>
@endsection