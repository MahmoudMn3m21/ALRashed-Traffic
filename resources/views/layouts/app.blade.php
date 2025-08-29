<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Alrashed Traffic') }} - @yield('title', 'Home')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name', 'Alrashed Traffic') }}"
                        class="me-2" style="height:40px;">
                    <span class="fw-bold">{{ config('app.name', 'Alrashed Traffic') }}</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">{{
                                __('navbar.home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('about*') ? 'active' : '' }}"
                                href="{{ url('/about') }}">{{ __('navbar.about') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}"
                                href="{{ url('/products') }}">{{ __('navbar.products') }}</a>
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
                            <a class="nav-link {{ request()->is('contact*') ? 'active' : '' }}"
                                href="{{ url('/contact') }}">{{ __('navbar.contact') }}</a>
                        </li>
                    </ul>

                    <!-- Language Switcher -->
                    <ul class="navbar-nav ms-3">
                        <li class="nav-item dropdown">
                            <fieldset class="btn-group">
                                <legend class="visually-hidden">{{ __('navbar.language_switcher') }}</legend>
                                <a href="{{ url('/lang/en') }}"
                                    class="btn btn-sm {{ app()->getLocale() == 'en' ? 'btn-primary' : 'btn-outline-primary' }}">EN</a>
                                <a href="{{ url('/lang/ar') }}"
                                    class="btn btn-sm {{ app()->getLocale() == 'ar' ? 'btn-primary' : 'btn-outline-primary' }}">AR</a>
                            </fieldset>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto bg-dark text-white pt-5 pb-3">
            <div class="container">
                <div class="row">
                    <!-- About -->
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-3">{{ __('footer.company_name') }}</h5>
                        <p class="text-light small">
                            {{ __('home.hero_subtitle') }}
                        </p>
                    </div>
                    <!-- Quick Links -->
                    <div class="col-md-3">
                        <h6 class="fw-bold mb-3">{{ __('navbar.home') }}</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ url('/') }}" class="text-decoration-none text-light">{{ __('navbar.home')
                                    }}</a></li>
                            <li><a href="{{ url('/about') }}" class="text-decoration-none text-light">{{
                                    __('navbar.about') }}</a></li>
                            <li><a href="{{ url('/products') }}" class="text-decoration-none text-light">{{
                                    __('navbar.products') }}</a></li>
                            <li><a href="{{ url('/contact') }}" class="text-decoration-none text-light">{{
                                    __('navbar.contact') }}</a></li>
                        </ul>
                    </div>
                    <!-- Contact Info -->
                    <div class="col-md-3">
                        <h6 class="fw-bold mb-3">{{ __('navbar.contact') }}</h6>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-map-marker-alt me-2"></i> {{ __('home.address_text') }}</li>
                            <li><i class="fas fa-envelope me-2"></i> <a href="mailto:info@alrashed-traffic.com"
                                    class="text-light">info@alrashed-traffic.com</a></li>
                            <li><i class="fas fa-phone me-2"></i> <a href="https://wa.me/201000864742" target="_blank"
                                    class="text-light">{{ __('home.phone_number') }}</a></li>
                            <li>
                                <i class="fas fa-phone me-2"></i>
                                <a href="tel:0223879050" class="text-light">
                                    {{ __('home.fax_number') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 text-light">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="text-light small mb-0">&copy; {{ date('Y') }} {{ __('footer.company_name') }}. {{
                            __('footer.all_rights_reserved') }}.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="https://www.facebook.com/AlRashed.Institution" target="_blank"
                            class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/alrashedinstitution" target="_blank"
                            class="text-light me-3"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/company/al-rashed-institution-for-trading-and-general-supplies"
                            target="_blank" class="text-light"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>