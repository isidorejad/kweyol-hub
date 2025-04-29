<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kwéyòl Hub - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/img/favicon_io/site.webmanifest') }}">
    <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Y92o9W+6N4g5J29w+u4j9mGkp+9tKjIzw7Xw7QzVGnd7KExvUodMqE9vK9vuzQ" crossorigin="anonymous">
    @vite(['resources/css/main.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <header>
        <div class="container-fluid py-4 px-md-5">
            <div class="row align-items-center">
                <div class="col-md-8 order-md-last">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-center mb-3 mb-md-0">
                            <img src="{{ asset('/img/favicon_no_background.png') }}" alt="Site's Logo" class="img-fluid" width="120">
                        </div>
                        <div class="col-md-6">
                            <form action="#" class="searchform">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-start-pill search-input" placeholder="Search" aria-label="Search">
                                    <button type="submit" class="btn btn-primary rounded-end-pill">
                                        <i class="bx bx-search-alt"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-4 mt-md-0">
                    <div class="d-flex justify-content-center justify-content-md-start gap-3">
                        <a href="https://www.facebook.com/profile.php?id=61567926065157&mibextid=ZbWKwL" class="text-primary fs-3" target="_blank" rel="noopener noreferrer" title="Follow us on Facebook">
                            <i class="bx bxl-facebook-circle bx-md"></i>
                        </a>
                        <a href="https://x.com/solutions_53058" class="text-info fs-3" target="_blank" rel="noopener noreferrer" title="Follow us on Twitter">
                            <i class="bx bxl-twitter bx-md"></i>
                        </a>
                        <a href="https://www.instagram.com/jtech_solutions2024?igsh=dDdqbnEzaHJxdHBr" class="text-danger fs-3" target="_blank" rel="noopener noreferrer" title="Follow us on Instagram">
                            <i class="bx bxl-instagram bx-md"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top py-4">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown">Learn with Us</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route ('learn.time')}}">Time</a>
                        <a class="dropdown-item" href="{{route ('learn.numbers')}}">Numbers</a>
                        <a class="dropdown-item" href="{{route ('learn.body-parts')}}">Body Parts</a>
                        <a class="dropdown-item" href="{{route ('learn.online-dictionary')}}">Online Dictionary</a>
                        <a class="dropdown-item" href="{{route ('learn.saint-lucia')}}">St. Lucia Landmarks</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="{{route ('translation')}}">Translation</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route ('contribute')}}">Contribute</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route ('contact-us')}}">Contact Us</a></li>
            </ul>
        </div>
    </div>
</nav>

 </header>
    <style>
            .navbar-nav .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    }
            .hero {
                background: url('{{ asset("img/background-img.jpg") }}') no-repeat center center/cover;
                height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                position: relative;

            }
        </style>

    <main>
        @yield('content')
    </main>

    <footer class="py-4">
        <div class="container text-center">
            <p>&copy; 2025 Kwéyòl Hub | All Rights Reserved.</p>
            <p>
                <a href="{{route('privacy-policy')}}" class="me-2">Privacy Policy</a>|
                <a href="{{route('terms-of-service')}}" class="me-2">Terms of Service</a>
            </p>
        </div>
    </footer>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Get current path
    const currentPath = window.location.pathname;
    
    // Find all nav links
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    navLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        
        // Check if link href matches current path
        if (currentPath === linkPath) {
            link.classList.add('active');
            
            // If it's a dropdown item, also activate the parent
            const dropdownItem = link.closest('.dropdown-item');
            if (dropdownItem) {
                const dropdownToggle = dropdownItem.closest('.dropdown').querySelector('.dropdown-toggle');
                if (dropdownToggle) {
                    dropdownToggle.classList.add('active');
                }
            }
        }
    });
});
</script>
    <script src="{{ asset('/js/bootstrap/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/popper.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sass.js/0.10.11/sass.sync.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
