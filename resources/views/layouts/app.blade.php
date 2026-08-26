<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ALRASHED INSTITUTION') }} - @yield('title', 'Home')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    @stack('styles')
</head>

<body class="theme-dark">
    <a class="skip-link" href="#main-content">{{ __('navbar.skip_to_content') }}</a>

    <div id="app" class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNavbar">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_white.png') }}" alt="{{ config('app.name', 'ALRASHED INSTITUTION') }}"
                        class="me-2" width="38" height="38" decoding="async">
                    <span class="fw-bold d-none d-sm-inline">{{ config('app.name', 'ALRASHED INSTITUTION') }}</span>
                </a>

                <div class="d-flex align-items-center gap-2 d-lg-none">
                    <a href="{{ url('/contact') }}" class="btn btn-primary btn-sm nav-cta-mobile">
                        {{ __('navbar.get_quote') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="{{ __('navbar.toggle_menu') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">{{ __('navbar.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}"
                                href="{{ url('/about') }}">{{ __('navbar.about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('products*') || request()->is('categories*') ? 'active' : '' }}"
                                href="{{ route('products.index') }}">{{ __('navbar.products') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('projects*') ? 'active' : '' }}"
                                href="{{ url('/projects') }}">{{ __('navbar.projects') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                                href="{{ url('/contact') }}">{{ __('navbar.contact') }}</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('clients*') || request()->is('gallery*') || request()->is('catalog*') ? 'active' : '' }}"
                                href="#" id="moreNavDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ __('navbar.more') }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark {{ app()->getLocale() == 'ar' ? 'dropdown-menu-start' : 'dropdown-menu-end' }}"
                                aria-labelledby="moreNavDropdown">
                                <li>
                                    <a class="dropdown-item {{ request()->is('clients*') ? 'active' : '' }}"
                                        href="{{ url('/clients') }}">{{ __('navbar.clients') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->is('gallery*') ? 'active' : '' }}"
                                        href="{{ route('gallery.index') }}">{{ __('navbar.gallery') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->is('catalog*') ? 'active' : '' }}"
                                        href="{{ route('catalog.index') }}">{{ __('navbar.catalog') }}</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="languageDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-globe mx-1"></i>
                                <span class="fw-medium">{{ app()->getLocale() == 'ar' ? 'العربية' : 'EN' }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark {{ app()->getLocale() == 'ar' ? 'dropdown-menu-start' : 'dropdown-menu-end' }}"
                                aria-labelledby="languageDropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                                        href="{{ url('/lang/en') }}">
                                        <span class="mx-2">US</span>
                                        <span>English</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center {{ app()->getLocale() == 'ar' ? 'active' : '' }}"
                                        href="{{ url('/lang/ar') }}">
                                        <span class="mx-2">EG</span>
                                        <span>العربية</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item d-none d-lg-block ms-lg-2">
                            <a href="{{ url('/contact') }}" class="btn btn-primary btn-sm nav-cta">
                                <i class="fas fa-paper-plane me-1"></i>
                                {{ __('navbar.get_quote') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main id="main-content" class="flex-grow-1" style="padding-top: 76px;" tabindex="-1">
            @if (session('success'))
            <div class="container mt-3">
                <div class="alert alert-success alert-dismissible fade show ux-alert" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif
            @if ($errors->any())
            <div class="container mt-3">
                <div class="alert alert-danger alert-dismissible fade show ux-alert" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ __('contact.form_error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

            @yield('content')
        </main>

        <footer class="footer mt-auto">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-5 col-md-6">
                        <h5 class="fw-bold mb-3">{{ __('footer.company_name') }}</h5>
                        <p class="mb-3 footer-blurb">{{ __('footer.blurb') }}</p>
                        <div class="social-links">
                            <a href="https://www.facebook.com/AlRashed.Institution" target="_blank" rel="noopener"
                                aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/alrashedinstitution" target="_blank" rel="noopener"
                                aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/company/al-rashed-institution-for-trading-and-general-supplies"
                                target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6">
                        <h6 class="fw-bold mb-3">{{ __('footer.explore') }}</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="{{ url('/products') }}">{{ __('navbar.products') }}</a></li>
                            <li><a href="{{ url('/projects') }}">{{ __('navbar.projects') }}</a></li>
                            <li><a href="{{ route('catalog.index') }}">{{ __('navbar.catalog') }}</a></li>
                            <li><a href="{{ route('gallery.index') }}">{{ __('navbar.gallery') }}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-3 col-6">
                        <h6 class="fw-bold mb-3">{{ __('footer.company') }}</h6>
                        <ul class="list-unstyled footer-links">
                            <li><a href="{{ url('/about') }}">{{ __('navbar.about') }}</a></li>
                            <li><a href="{{ url('/clients') }}">{{ __('navbar.clients') }}</a></li>
                            <li><a href="{{ url('/contact') }}">{{ __('navbar.contact') }}</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12">
                        <h6 class="fw-bold mb-3">{{ __('footer.contact') }}</h6>
                        <div class="contact-info">
                            <div class="d-flex align-items-start mb-3">
                                <i class="fas fa-map-marker-alt me-3 mt-1"></i>
                                <span>{{ __('home.address_text') }}</span>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-envelope me-3"></i>
                                <a href="mailto:{{ __('contact.email_address') }}">{{ __('contact.email_address') }}</a>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <i class="fab fa-whatsapp me-3"></i>
                                <a href="https://wa.me/201000864742" target="_blank" rel="noopener">{{ __('home.phone_number') }}</a>
                            </div>
                            <a href="{{ url('/contact') }}" class="btn btn-outline-light btn-sm mt-2">
                                {{ __('navbar.get_quote') }}
                            </a>
                        </div>
                    </div>
                </div>

                <hr class="my-4 footer-divider">

                <div class="row align-items-center">
                    <div class="col-12 text-center">
                        <p class="mb-0">&copy; {{ date('Y') }} {{ __('footer.company_name') }}.
                            {{ __('footer.all_rights_reserved') }}.
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('scripts')
</body>

</html>