@extends('layouts.app')

@section('content')
@section('title', 'Privacy Policy')
@section('description', 'Privacy Policy for The Kwéyòl Hub, detailing data collection, usage, and user rights.')
@section('keywords', 'Privacy Policy, Kwéyòl Hub, Data Protection, User Rights, Cookies, Third-Party Services')

<div class="container my-5 legal-page">
    <div class="card shadow-lg rounded-lg mx-auto" style="max-width: 900px;">
        <div class="card-header bg-primary text-white">
            <h1 class="text-center display-4 mb-0">Privacy Policy</h1>
        </div>
        <div class="card-body">
            <p class="text-center text-muted mb-5">Last Updated: {{ now()->format('F j, Y') }}</p>

            <div class="alert alert-info">
                <strong>Your Privacy Matters:</strong> This policy explains how we collect, use, and protect your personal information.
            </div>

            <div class="privacy-content">
                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">1. Information We Collect</h2>
                    <p>We collect information to provide better services to our users:</p>
                    <ul>
                        <li><strong>Personal Information:</strong> Name, email, phone when you contact us or create an account</li>
                        <li><strong>Usage Data:</strong> How you interact with our website (pages visited, time spent)</li>
                        <li><strong>Technical Data:</strong> IP address, browser type, device information</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">2. How We Use Your Information</h2>
                    <p>Your information helps us:</p>
                    <ul>
                        <li>Provide and improve our services</li>
                        <li>Respond to inquiries and support requests</li>
                        <li>Understand user behavior to enhance user experience</li>
                        <li>Send important service notifications</li>
                        <li>Prevent fraud and ensure security</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">3. Data Protection</h2>
                    <p>We implement appropriate security measures including:</p>
                    <ul>
                        <li>SSL encryption for data transmission</li>
                        <li>Regular security audits</li>
                        <li>Limited access to personal data</li>
                    </ul>
                    <p>While we strive to protect your data, no internet transmission is 100% secure.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">4. Cookies & Tracking</h2>
                    <p>We use cookies and similar technologies to:</p>
                    <ul>
                        <li>Remember user preferences</li>
                        <li>Analyze website traffic</li>
                        <li>Enable certain functionality</li>
                    </ul>
                    <p>You can control cookies through your browser settings.</p>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">5. Third-Party Services</h2>
                    <p>We may use third-party services that have their own privacy policies:</p>
                    <ul>
                        <li>Google Analytics for website analytics</li>
                        <li>Payment processors for transactions</li>
                        <li>Email service providers</li>
                    </ul>
                </section>

                <section class="mb-5">
                    <h2 class="h4 font-weight-bold border-bottom pb-2">6. Your Rights</h2>
                    <p>You have the right to:</p>
                    <ul>
                        <li>Access your personal data</li>
                        <li>Request correction of inaccurate data</li>
                        <li>Request deletion of your data</li>
                        <li>Opt-out of marketing communications</li>
                    </ul>
                </section>

                <section>
                    <h2 class="h4 font-weight-bold border-bottom pb-2">7. Contact Us</h2>
                    <p>For privacy-related inquiries or requests, please contact our Data Protection Officer:</p>
                    <address>
                        <strong>Kwéyòl Hub Privacy Team</strong><br>
                        <a href="mailto:privacy@kweyolhub.com">privacy@kweyolhub.com</a><br>
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
    .privacy-content section {
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #eee;
        margin-bottom: 1.5rem;
    }
    .privacy-content section:last-child {
        border-bottom: none;
    }
    .privacy-content ul {
        padding-left: 1.5rem;
    }
    .privacy-content li {
        margin-bottom: 0.5rem;
    }
    address {
        font-style: normal;
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 4px;
    }
</style>
@endsection