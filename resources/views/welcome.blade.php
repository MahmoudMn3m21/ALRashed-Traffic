@extends('layouts.app')

@section('title', __('navbar.home'))

@section('content')
<!-- Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <!-- Animated Background -->
    <div class="hero-bg">
        <div class="gradient-overlay"></div>
        <div class="particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
    </div>

    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6" data-aos="fade-up" data-aos-duration="1000">
                <h1 class="hero-title mb-4">{{ __('home.hero_title') }}</h1>
                <p class="hero-subtitle mb-4">{{ __('home.hero_subtitle') }}</p>
                <div class="hero-buttons" data-aos="fade-up" data-aos-delay="200">
                    <a href="#products" class="btn btn-primary btn-lg me-3 smooth-scroll">{{ __('home.view_products') }}</a>
                    <a href="{{ url('/contact') }}" class="btn btn-outline-light btn-lg">{{ __('navbar.contact') }}</a>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                <div class="hero-image-wrapper">
                    <img src="{{ asset('images/logo.png') }}" alt="Alrashed Traffic"
                        class="img-fluid hero-image">
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <a href="#products" class="smooth-scroll">
                <i class="fas fa-chevron-down"></i>
            </a>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="section-padding" id="products">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-header" data-aos="fade-up" data-aos-duration="800">
                    <h2 class="section-title">{{ __('home.our_products') }}</h2>
                    <p class="section-subtitle">{{ __('home.products_description') }}</p>
                    <div class="title-divider"></div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($products as $index => $product)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="product-card h-100" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ $index * 100 }}">
                    <div class="product-image-wrapper text-center">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/placeholder.jpg') }}"
                            class="product-image" alt="{{ $product->getName() }}">
                        <div class="product-overlay">
                            <a href="{{ route('products.show', $product) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-eye me-2"></i>{{ __('home.view_details') }}
                            </a>
                        </div>
                    </div>
                    <div class="product-content">
                        <h5 class="product-title">{{ $product->getName() }}</h5>
                        <p class="product-subtitle">{{ $product->getAlternateName() }}</p>
                        <p class="product-description">{{ Str::limit($product->description, 100) }}</p>
                        <div class="product-features">
                            @if($product->features)
                            @foreach(array_slice(explode(',', $product->features), 0, 2) as $feature)
                            <span class="feature-tag">{{ trim($feature) }}</span>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center mt-5" data-aos="fade-up" data-aos-duration="600">
                <a href="{{ url('/products') }}" class="btn btn-primary btn-lg">
                    {{ __('home.view_all_products') }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="section-padding bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-header fade-in">
                    <h2 class="section-title">{{ __('home.our_clients') }}</h2>
                    <p class="section-subtitle">{{ __('home.clients_description') }}</p>
                    <div class="title-divider"></div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($clients as $index => $client)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="client-card fade-in" style="animation-delay: {{ $index * 0.05 }}s;">
                    <div class="client-logo-wrapper">
                        <img src="{{ $client->logo ? asset('storage/clients/' . $client->logo) : asset('images/placeholder.jpg') }}"
                            class="client-logo" alt="{{ $client->name }}">
                    </div>
                    <div class="client-info">
                        <h6 class="client-name">{{ $client->name }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="{{ url('/clients') }}" class="btn btn-primary btn-lg">
                    {{ __('home.view_all_clients') }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-header fade-in">
                    <h2 class="section-title">{{ __('home.our_projects') }}</h2>
                    <p class="section-subtitle">{{ __('home.projects_description') }}</p>
                    <div class="title-divider"></div>
                </div>
            </div>
        </div>
        <div class="row g-4">
            @foreach ($projects as $index => $project)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="project-card fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                    <div class="project-image-wrapper text-center">
                        <img src="{{ $project->image ? asset('storage/projects/' . $project->image) : asset('images/placeholder.jpg') }}"
                            class="project-image" alt="{{ $project->getTitle() }}">
                        <div class="project-overlay">
                            <div class="project-overlay-content">
                                <h5 class="project-overlay-title">{{ $project->getTitle() }}</h5>
                                <p class="project-overlay-subtitle">{{ $project->getAlternateTitle() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="project-content">
                        <h5 class="project-title">{{ $project->getTitle() }}</h5>
                        <p class="project-subtitle">{{ $project->getAlternateTitle() }}</p>
                        <p class="project-description">{{ Str::limit($project->getDescription(), 80) }}</p>
                        <div class="project-meta">
                            <span class="project-category">
                                <i class="fas fa-tag me-1"></i>Traffic Solutions
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 text-center mt-5">
                <a href="{{ url('/projects') }}" class="btn btn-primary btn-lg">
                    {{ __('home.view_all_projects') }}
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section-padding bg-light" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <div class="section-header fade-in">
                    <h2 class="section-title">{{ __('home.contact_title') }}</h2>
                    <p class="section-subtitle">{{ __('home.contact_subtitle') }}</p>
                    <div class="title-divider"></div>
                </div>
            </div>
        </div>

        <!-- Contact Info Cards -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="contact-info-card fade-in" style="animation-delay: 0.1s;">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h6 class="contact-title">{{ __('home.address_label') }}</h6>
                    <p class="contact-text">{{ __('home.address_text') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contact-info-card fade-in" style="animation-delay: 0.2s;">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h6 class="contact-title">{{ __('home.email_label') }}</h6>
                    <p class="contact-text">
                        <a href="mailto:info@alrashed-traffic.com">info@alrashed-traffic.com</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contact-info-card fade-in" style="animation-delay: 0.3s;">
                    <div class="contact-icon whatsapp">
                        <i class="fab fa-whatsapp"></i>
                    </div>
                    <h6 class="contact-title">{{ __('home.whatsapp_label') }}</h6>
                    <p class="contact-text">
                        <a href="https://wa.me/201000864742" target="_blank">{{ __('home.phone_number') }}</a>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="contact-info-card fade-in" style="animation-delay: 0.4s;">
                    <div class="contact-icon">
                        <i class="fas fa-fax"></i>
                    </div>
                    <h6 class="contact-title">{{ __('home.fax_label') }}</h6>
                    <p class="contact-text">
                        <a href="tel:0223879050">{{ __('home.fax_number') }}</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="contact-form-wrapper fade-in" style="animation-delay: 0.5s;">
                    <h4 class="mb-4">{{ __('home.contact_form_title') }}</h4>
                    <form class="contact-form" method="POST" action="{{ route('contact.send') }}">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ __('home.name_label') }}" required>
                                    <label for="name">{{ __('home.name_label') }}</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('home.email_placeholder') }}" required>
                                    <label for="email">{{ __('home.email_placeholder') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="{{ __('home.subject') }}" required>
                                    <label for="subject">{{ __('home.subject') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message" placeholder="{{ __('home.message_label') }}" style="height: 120px;" required></textarea>
                                    <label for="message">{{ __('home.message_label') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="fas fa-paper-plane me-2"></i>{{ __('home.send_button') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Google Map -->
            <div class="col-lg-6">
                <div class="map-wrapper fade-in" style="animation-delay: 0.6s;">
                    <h4 class="mb-4">{{ __('home.location_title') }}</h4>

                    <iframe
                        src="https://www.google.com/maps?q=10%20El%20Gahez%20Street,%20Nasr%20City,%20Cairo,%20Egypt&output=embed"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="El Rashed Institution location on Google Maps"
                        class="google-map">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection