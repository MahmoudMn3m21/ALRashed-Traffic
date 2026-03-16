<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Alrashed Traffic') }} - @yield('title', 'Home')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- AOS Animation Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNavbar"
            style="background-color: transparent;">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Alrashed Traffic') }}"
                        class="me-2">
                    <span class="fw-bold">{{ config('app.name', 'Alrashed Traffic') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">{{ __('navbar.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}"
                                href="{{ url('/about') }}">{{ __('navbar.about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('products*') || request()->is('categories*') ? 'active' : '' }}" href="{{ route('products.index') }}">{{ __('navbar.products') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}"
                                href="{{ url('/projects') }}">{{ __('navbar.projects') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('clients*') ? 'active' : '' }}"
                                href="{{ url('/clients') }}">{{ __('navbar.clients') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('gallery*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">{{ __('navbar.gallery') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                                href="{{ url('/contact') }}">{{ __('navbar.contact') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('catalog*') ? 'active' : '' }}" href="{{ route('catalog.index') }}">{{ __('navbar.catalog') }}</a>
                        </li>
                    </ul>

                    <!-- Language Switcher -->
                    <ul class="navbar-nav {{ app()->getLocale() == 'ar' ? 'me-3' : 'ms-3' }}">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="cursor: pointer;">
                                <i class="fas fa-globe mx-1"></i>
                                <span class="fw-medium">{{ app()->getLocale() == 'ar' ? 'العربية' : 'English' }}</span>
                            </a>
                            <ul class="dropdown-menu {{ app()->getLocale() == 'ar' ? 'dropdown-menu-start' : 'dropdown-menu-end' }}" aria-labelledby="languageDropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'en' ? 'active' : '' }}" href="{{ url('/lang/en') }}">
                                        <span class="mx-2">US</span>
                                        <span>English</span>
                                        @if(app()->getLocale() == 'en')
                                        <i class="fas fa-check ms-auto text-primary"></i>
                                        @endif
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'ar' ? 'active' : '' }}" href="{{ url('/lang/ar') }}">
                                        <span class="mx-2">EG</span>
                                        <span>العربية</span>
                                        @if(app()->getLocale() == 'ar')
                                        <i class="fas fa-check ms-auto text-primary"></i>
                                        @endif
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Fallback JavaScript for Language Switcher -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const languageDropdown = document.getElementById('languageDropdown');
                            if (languageDropdown) {
                                languageDropdown.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    const dropdownMenu = this.nextElementSibling;
                                    if (dropdownMenu) {
                                        dropdownMenu.classList.toggle('show');
                                    }
                                });

                                // Close dropdown when clicking outside
                                document.addEventListener('click', function(e) {
                                    if (!languageDropdown.contains(e.target)) {
                                        const dropdownMenu = languageDropdown.nextElementSibling;
                                        if (dropdownMenu) {
                                            dropdownMenu.classList.remove('show');
                                        }
                                    }
                                });
                            }
                        });
                    </script>
                </div>
            </div>
        </nav>

        <!-- Navbar Spacer -->
        <div style="height: 1px;"></div>

        <!-- Main Content -->
        <main class="flex-grow-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <h5 class="fw-bold mb-3">{{ __('footer.company_name') }}</h5>
                        <p class="mb-3">
                            {{ __('home.hero_subtitle') }}
                        </p>
                        <div class="social-links">
                            <a href="https://www.facebook.com/AlRashed.Institution" target="_blank"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/alrashedinstitution" target="_blank"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/al-rashed-institution-for-trading-and-general-supplies"
                                target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-6 mb-4">
                        <h6 class="fw-bold mb-3">Quick Links</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="{{ url('/') }}">{{ __('navbar.home') }}</a></li>
                            <li class="mb-2"><a href="{{ url('/about') }}">{{ __('navbar.about') }}</a></li>
                            <li class="mb-2"><a href="{{ url('/products') }}">{{ __('navbar.products') }}</a></li>
                            <li class="mb-2"><a href="{{ route('catalog.index') }}">{{ __('navbar.catalog') }}</a></li>
                            <li class="mb-2"><a href="{{ route('gallery.index') }}">{{ __('navbar.gallery') }}</a></li>
                            <li class="mb-2"><a href="{{ url('/projects') }}">{{ __('navbar.projects') }}</a></li>
                            <li class="mb-2"><a href="{{ url('/clients') }}">{{ __('navbar.clients') }}</a></li>
                            <li class="mb-2"><a href="{{ url('/contact') }}">{{ __('navbar.contact') }}</a></li>
                        </ul>
                    </div>

                    <!-- Services -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h6 class="fw-bold mb-3">Our Services</h6>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#">Traffic Control Systems</a></li>
                            <li class="mb-2"><a href="#">Smart Traffic Solutions</a></li>
                            <li class="mb-2"><a href="#">Road Safety Equipment</a></li>
                            <li class="mb-2"><a href="#">Consultation Services</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <h6 class="fw-bold mb-3">Contact Info</h6>
                        <div class="contact-info">
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                                <span>{{ __('home.address_text') }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope me-3"></i>
                                <a href="mailto:info@alrashed-traffic.com">info@alrashed-traffic.com</a>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fab fa-whatsapp me-3"></i>
                                <a href="https://wa.me/201000864742"
                                    target="_blank">{{ __('home.phone_number') }}</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="fas fa-fax me-3"></i>
                                <a href="tel:0223879050">{{ __('home.fax_number') }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4" style="border-color: rgba(255, 255, 255, 0.1);">

                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <p class="mb-0">&copy; {{ date('Y') }} {{ __('footer.company_name') }}.
                            {{ __('footer.all_rights_reserved') }}.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Interactive Enhancements -->
    @vite(['resources/js/enhancements.js'])

    <!-- Page-specific scripts -->
    @stack('scripts')
</body>

</html>