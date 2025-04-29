<!DOCTYPE html>
<html lang="en">
<head>
    <title>New Contact Form Submission - Kwéyòl Hub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .email-header {
            background-color: #4a6baf;
            padding: 30px;
            text-align: center;
            color: white;
        }
        .email-logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        .email-body {
            padding: 30px;
        }
        .detail-item {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-label {
            font-weight: 600;
            color: #4a6baf;
            margin-bottom: 5px;
        }
        .message-box {
            background-color: #f8f9fa;
            border-left: 4px solid #4a6baf;
            padding: 15px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .email-footer {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .social-icons a {
            color: white;
            font-size: 20px;
            margin: 0 10px;
            transition: all 0.3s;
        }
        .social-icons a:hover {
            color: #4a6baf;
            transform: translateY(-3px);
        }
        .timestamp {
            font-style: italic;
            color: #6c757d;
            text-align: right;
            margin-top: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header with Logo -->
        <div class="email-header">
            <img src="{{ asset('/img/favicon_no_background.png') }}" alt="Kwéyòl Hub Logo" class="email-logo">
            <h2 class="mb-0">New Contact Form Submission</h2>
        </div>
        
        <!-- Email Body -->
        <div class="email-body">
            <div class="detail-item">
                <div class="detail-label">Name</div>
                <p>{{ $data['first_name'] }} {{ $data['last_name'] }}</p>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Email</div>
                <p><a href="mailto:{{ $data['email'] }}" class="text-decoration-none">{{ $data['email'] }}</a></p>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Phone</div>
                <p><a href="tel:{{ $data['phone'] }}" class="text-decoration-none">{{ $data['phone'] }}</a></p>
            </div>
            
            <div class="detail-item">
                <div class="detail-label">Subject</div>
                <p>{{ $data['subject'] }}</p>
            </div>
            
            <div>
                <div class="detail-label">Message</div>
                <div class="message-box">
                    {{ $data['message'] }}
                </div>
            </div>
            
            <div class="timestamp">
                Submitted on: {{ now()->format('F j, Y \a\t g:i a') }}
            </div>
        </div>
        
        <!-- Footer with Social Links -->
        <div class="email-footer">
            <div class="social-icons mb-3">
                <a href="https://www.facebook.com/profile.php?id=61567926065157&mibextid=ZbWKwL" target="_blank" title="Facebook">
                    <i class="bx bxl-facebook-circle"></i>
                </a>
                <a href="https://x.com/solutions_53058" target="_blank" title="Twitter">
                    <i class="bx bxl-twitter"></i>
                </a>
                <a href="https://www.instagram.com/jtech_solutions2024?igsh=dDdqbnEzaHJxdHBr" target="_blank" title="Instagram">
                    <i class="bx bxl-instagram"></i>
                </a>
            </div>
            <p class="mb-1">&copy; {{ date('Y') }} Kwéyòl Hub. All rights reserved.</p>
            <p class="mb-0">
                <a href="{{route('privacy-policy')}}" class="text-white text-decoration-none me-2">Privacy Policy</a> | 
                <a href="{{route('terms-of-service')}}" class="text-white text-decoration-none ms-2">Terms of Service</a>
            </p>
        </div>
    </div>
</body>
</html>