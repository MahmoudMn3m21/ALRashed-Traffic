<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Al Rashed Institution') }} - @yield('title', 'Home')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo_white.png') }}">

    {{-- Prevent white unstyled flash before Vite CSS arrives --}}
    <style>
        html,
        body {
            margin: 0;
            background: #07080b;
            color: #f4f5f7;
            font-family: Outfit, Cairo, system-ui, sans-serif;
        }

        body.theme-dark {
            background: #07080b;
            color: #f4f5f7;
        }

        .skip-link {
            position: absolute;
            left: -9999px;
        }

        .navbar {
            min-height: 76px;
        }

        #main-content {
            padding-top: 76px;
        }

        .toast-stack {
            position: fixed;
            top: 96px;
            inset-inline-end: 20px;
            z-index: 1080;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            width: min(420px, calc(100vw - 32px));
            pointer-events: none;
        }

        .ux-toast {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
            padding: 0.95rem 1rem;
            border-radius: 10px;
            color: #f4f5f7;
            box-shadow: 0 16px 40px rgba(0, 0, 0, 0.35);
            pointer-events: auto;
        }

        .ux-toast i {
            margin-top: 0.15rem;
        }

        .ux-toast span {
            flex: 1;
            line-height: 1.45;
        }

        .ux-toast-success {
            border: 1px solid rgba(52, 211, 153, 0.45);
            background: rgba(16, 32, 28, 0.96);
        }

        .ux-toast-success i {
            color: #34d399;
        }

        .ux-toast-error {
            border: 1px solid rgba(248, 113, 113, 0.45);
            background: rgba(40, 18, 18, 0.96);
        }

        .ux-toast-error i {
            color: #f87171;
        }

        .ux-toast-close {
            background: transparent;
            border: 0;
            color: #9aa0ad;
            font-size: 1.25rem;
            line-height: 1;
            padding: 0;
            cursor: pointer;
        }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&family=Outfit:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </noscript>
    @stack('styles')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
                        <i class="fas fa-bars" aria-hidden="true"></i>
                        <span class="navbar-toggler-label">{{ __('navbar.menu') }}</span>
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
            @if (session('success') || (isset($errors) && $errors->any()))
            <div class="toast-stack" aria-live="polite" aria-atomic="true">
                @if (session('success'))
                <div class="ux-toast ux-toast-success" role="status">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                    <button type="button" class="ux-toast-close" aria-label="Close">&times;</button>
                </div>
                @endif
                @if (isset($errors) && $errors->any())
                <div class="ux-toast ux-toast-error" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>{{ __('contact.form_error') }}</span>
                    <button type="button" class="ux-toast-close" aria-label="Close">&times;</button>
                </div>
                @endif
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

    @stack('scripts')
    @if (session('success') || (isset($errors) && $errors->any()))
    <script>
        document.querySelectorAll('.ux-toast').forEach(function(toast) {
            var hide = function() {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity .25s ease';
                setTimeout(function() {
                    toast.remove();
                }, 250);
            };
            var btn = toast.querySelector('.ux-toast-close');
            if (btn) btn.addEventListener('click', hide);
            setTimeout(hide, 7000);
        });
    </script>
    @endif
</body>

</html>