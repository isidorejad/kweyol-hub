@extends('layouts.app')

@section('content')
@section('title', 'Contribute to The Kwéyòl Hub')
@section('description', 'Contribute to The Kwéyòl Hub, help us grow, and become part of our community.')
@section('keywords', 'Contribute, Kwéyòl Hub, Open Source, Contribution Guidelines')
@section('author', 'Kwéyòl Hub Team')

<div class="container my-5">
    <div class="card shadow-lg rounded-lg mx-auto" style="max-width: 900px;">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-5">
                <h1 class="display-4 font-weight-bold text-primary mb-3">Contribute to The Kwéyòl Hub</h1>
                <p class="lead text-muted">Your contributions help preserve and promote the Kwéyòl language. Join our community today!</p>
                <div class="divider mx-auto bg-primary" style="width: 80px; height: 3px;"></div>
            </div>

            <div class="row">
                <!-- Left Column - Non-financial Contributions -->
                <div class="col-md-6">
                    <div class="contribution-card mb-4 p-4 rounded-lg shadow-sm">
                        <h2 class="h4 font-weight-bold text-primary mb-3"><i class="fas fa-bug mr-2"></i> Report Bugs</h2>
                        <p>Found an issue? Help us improve by reporting bugs with detailed steps to reproduce.</p>
                        <a href="https://github.com/kweyolhub/issues" class="btn btn-outline-primary btn-sm" target="_blank">
                            GitHub Issues <i class="fas fa-external-link-alt ml-1"></i>
                        </a>
                    </div>

                    <div class="contribution-card mb-4 p-4 rounded-lg shadow-sm">
                        <h2 class="h4 font-weight-bold text-primary mb-3"><i class="fas fa-code mr-2"></i> Submit Code</h2>
                        <p>Developers can contribute features, fixes, or improvements to our open-source platform.</p>
                        <ol class="pl-3">
                            <li>Fork our repository</li>
                            <li>Create a feature branch</li>
                            <li>Submit a pull request</li>
                        </ol>
                        <a href="https://github.com/kweyolhub" class="btn btn-outline-primary btn-sm" target="_blank">
                            GitHub Repo <i class="fas fa-external-link-alt ml-1"></i>
                        </a>
                    </div>

                    <div class="contribution-card mb-4 p-4 rounded-lg shadow-sm">
                        <h2 class="h4 font-weight-bold text-primary mb-3"><i class="fas fa-book mr-2"></i> Improve Docs</h2>
                        <p>Help us make our documentation clearer and more comprehensive.</p>
                        <a href="https://github.com/kweyolhub/docs" class="btn btn-outline-primary btn-sm" target="_blank">
                            Docs Repo <i class="fas fa-external-link-alt ml-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Right Column - Financial Contributions -->
                <div class="col-md-6">
                    <div class="contribution-card mb-4 p-4 rounded-lg shadow-sm bg-light">
                        <h2 class="h4 font-weight-bold text-primary mb-3"><i class="fas fa-language mr-2"></i> Translations</h2>
                        <p>Help translate The Kwéyòl Hub to make it accessible to more people worldwide.</p>
                        <a href="https://crowdin.com/project/kweyolhub" class="btn btn-outline-primary btn-sm" target="_blank">
                            Crowdin <i class="fas fa-external-link-alt ml-1"></i>
                        </a>
                    </div>

                    <div class="contribution-card mb-4 p-4 rounded-lg shadow-sm bg-light">
                        <h2 class="h4 font-weight-bold text-primary mb-3"><i class="fas fa-share-alt mr-2"></i> Spread the Word</h2>
                        <p>Share our platform on social media and help grow our community.</p>
                        <div class="social-share mt-3">
                            <a href="https://twitter.com/intent/tweet?text=Check%20out%20The%20Kwéyòl%20Hub%20for%20learning%20Kwéyòl%20language!&url=https://kweyolhub.com" class="btn btn-sm btn-twitter mr-2" target="_blank">
                                <i class="fab fa-twitter"></i> Twitter
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=https://kweyolhub.com" class="btn btn-sm btn-facebook" target="_blank">
                                <i class="fab fa-facebook-f"></i> Facebook
                            </a>
                        </div>
                    </div>

                    <!-- Enhanced PayPal Integration -->
                    <div class="contribution-card p-4 rounded-lg shadow-sm bg-primary text-white">
                        <h2 class="h4 font-weight-bold mb-3"><i class="fas fa-donate mr-2"></i> Financial Support</h2>
                        <p>Your donations help cover server costs, development, and future enhancements.</p>
                        
                        <!-- PayPal Button from .env -->
                        <style>
                            .pp-{{ env('PAYPAL_BUTTON_ID') }} {
                                text-align: center;
                                border: none;
                                border-radius: 0.25rem;
                                min-width: 11.625rem;
                                padding: 0 2rem;
                                height: 2.625rem;
                                font-weight: bold;
                                background-color: #FFD140;
                                color: #000000;
                                font-family: "Helvetica Neue", Arial, sans-serif;
                                font-size: 1rem;
                                line-height: 1.25rem;
                                cursor: pointer;
                                transition: all 0.3s ease;
                            }

                            .pp-{{ env('PAYPAL_BUTTON_ID') }}:hover {
                                background-color: #FFC20A;
                                transform: translateY(-2px);
                                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                            }
                        </style>

                        <div class="text-center mt-3">
                            <form action="https://www.paypal.com/ncp/payment/{{ env('PAYPAL_BUTTON_ID') }}" method="post" target="_blank" style="display:inline-grid;justify-items:center;align-content:start;gap:0.5rem;">
                                <input class="pp-{{ env('PAYPAL_BUTTON_ID') }}" type="submit" value="Make Donation" />
                                <img src="https://www.paypalobjects.com/images/Debit_Credit.svg" alt="cards" style="height: 20px;" />
                                <section style="font-size: 0.75rem; color: #fff;">
                                    Powered by <img src="https://www.paypalobjects.com/paypal-ui/logos/svg/paypal-wordmark-color.svg" alt="paypal" style="height:0.875rem;vertical-align:middle;"/>
                                </section>
                            </form>
                        </div>
                        
                        <p class="small mt-3">All donations are securely processed through PayPal.</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <h3 class="h5 font-weight-bold">Have questions about contributing?</h3>
                <a href="mailto:support@kweyolhub.com" class="btn btn-outline-primary">
                    <i class="fas fa-envelope mr-2"></i> Contact Our Team
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .contribution-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        border: none;
    }
    
    .contribution-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
    
    .divider {
        opacity: 0.7;
    }
    
    .btn-twitter {
        background-color: #1DA1F2;
        color: white;
        border: none;
    }
    
    .btn-facebook {
        background-color: #4267B2;
        color: white;
        border: none;
    }
    
    .btn-twitter:hover, .btn-facebook:hover {
        opacity: 0.9;
        color: white;
    }
    
    .donation-options .btn-outline-light {
        border-color: rgba(255,255,255,0.5);
        color: white;
    }
    
    .donation-options .btn-outline-light.active {
        background-color: rgba(255,255,255,0.2);
        color: white;
        border-color: white;
    }
    
    #custom-amount {
        height: 38px;
    }
    
    @media (max-width: 768px) {
        .card-body {
            padding: 2rem;
        }
        
        .contribution-card {
            margin-bottom: 1.5rem;
        }
    }
</style>
@endpush