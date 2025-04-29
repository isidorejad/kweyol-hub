@extends('layouts.app')

@section('content')
@section('title', 'Contact Us')
@section('description', 'Contact The Kwéyòl Hub team for inquiries, feedback, or support.')
@section('keywords', 'contact, support, feedback, inquiries, Kwéyòl Hub')

<section class="hero">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1 class="display-4 fw-bold">Get in Touch!</h1>
        <p class="lead">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
    </div>
</section>

<section id="contact" class="contact py-5 bg-light">
    <div class="container" data-aos="fade-up">
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Section Title -->
        <div class="text-center mb-4">
            <h2 class="fw-bold">Get In Touch</h2>
        </div>

        <div class="row">
            <!-- Contact Info -->
            <div class="col-lg-6 mt-4 mt-lg-0">
                <!-- Contact Info Icons -->
                <div class="d-flex justify-content-center gap-4 mb-4">
                    <!-- Location -->
                    <div class="contact-item position-relative">
                        <i class="bx bx-map fs-1 text-primary"></i>
                        <div class="tooltip-info">
                            <h5 class="fw-bold text-info">Location</h5>
                            <p>Maracas Royal Road, St. Joseph <br> University of the Southern Caribbean <br>
                                Trinidad and Tobago, W.I</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="contact-item position-relative">
                        <i class="bx bx-envelope fs-1 text-primary"></i>
                        <div class="tooltip-info">
                            <h5 class="fw-bold text-info">Email</h5>
                            <p><a href="mailto:jtechsolutions758@gmail.com"
                                    class="text-decoration-none">jtechsolutions758@gmail.com</a></p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="contact-item position-relative">
                        <i class="bx bx-phone fs-1 text-primary"></i>
                        <div class="tooltip-info">
                            <h5 class="fw-bold text-info">Call</h5>
                            <p><a href="tel:+18683045108" class="text-decoration-none">+1 868 304 5108</a></p>
                        </div>
                    </div>
                </div>
                <iframe class="w-100 rounded shadow-sm"
                    src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d7841.110507581512!2d-61.411819!3d10.691588000000001!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTDCsDQxJzI5LjciTiA2McKwMjQnMzMuMyJX!5e0!3m2!1sen!2sus!4v1700856003701!5m2!1sen!2sus"
                    height="400" allowfullscreen="" title="Location Map">
                </iframe>
            </div>
            
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="card shadow-sm p-4">
                    <h4 class="fw-bold text-center">Send Us a Message</h4>
                    <form method="POST" action="{{ route('contact.submit') }}" id="contactForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">First Name *</label>
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" 
                                       id="first_name" value="{{ old('first_name') }}" required>
                                @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">Last Name *</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                       name="last_name" id="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" id="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone *</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" 
                                       name="phone" id="phone" value="{{ old('phone') }}"
                                       placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subject" class="form-label">Subject *</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                       name="subject" id="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 mb-3">
                                <label for="message" class="form-label">Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="submitButton"
                                class="btn btn-primary btn-lg px-4 rounded-pill">
                                <span id="submitText">Send Message</span>
                                <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Tooltip styling */
    .contact-item {
        position: relative;
        display: inline-block;
        cursor: pointer;
    }

    .contact-item .tooltip-info {
        position: absolute;
        bottom: 100%;
        left: 50%;
        transform: translateX(-50%);
        background: #ffffff;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s, visibility 0.3s, transform 0.3s;
        width: 250px;
        text-align: center;
        z-index: 10;
    }

    .contact-item:hover .tooltip-info {
        opacity: 1;
        visibility: visible;
        transform: translateX(-50%) translateY(-10px);
    }

    /* Ensures spacing */
    .contact-item i {
        transition: transform 0.2s ease-in-out;
    }

    .contact-item:hover i {
        transform: scale(1.2);
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const submitButton = document.getElementById('submitButton');
    const submitText = document.getElementById('submitText');
    const spinner = document.getElementById('spinner');

    form.addEventListener('submit', function(e) {
        // Show loading state
        submitButton.disabled = true;
        submitText.textContent = 'Sending...';
        spinner.classList.remove('d-none');
    });

    // Phone number formatting
    const phoneInput = document.getElementById('phone');
    phoneInput.addEventListener('input', function(e) {
        const numbers = this.value.replace(/\D/g, '');
        const char = {3:'-', 6:'-'};
        let formatted = '';
        
        for (let i = 0; i < numbers.length; i++) {
            formatted += (char[i] || '') + numbers[i];
        }
        
        this.value = formatted;
    });
});
</script>

@endsection