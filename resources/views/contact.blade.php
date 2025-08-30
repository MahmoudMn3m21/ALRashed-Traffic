@extends('layouts.app')

@section('title', __('navbar.contact'))

@section('content')
    <!-- Contact Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <div class="fade-in">
                        <h1 class="hero-title mb-4">{{ __('navbar.contact') }}</h1>
                        <p class="hero-subtitle mb-5">{{ __('contact.hero_subtitle') }}</p>
                        <a href="#contact-section" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                            {{ __('contact.get_in_touch') }}
                            <i class="fas fa-arrow-down ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animated Background Particles -->
        <div class="hero-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="contact-info-section py-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="section-title mb-3">{{ __('contact.info_title') }}</h2>
                    <p class="section-subtitle text-muted">{{ __('contact.info_subtitle') }}</p>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <div class="col-lg-3 col-md-6">
                    <div class="contact-info-card h-100">
                        <div class="contact-icon-wrapper">
                            <div class="contact-icon address-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-title">{{ __('home.address_label') }}</h5>
                            <p class="contact-info-text">{{ __('home.address_text') }}</p>
                            <a href="#map-section" class="contact-info-link">{{ __('contact.view_map') }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="contact-info-card h-100">
                        <div class="contact-icon-wrapper">
                            <div class="contact-icon email-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-title">{{ __('home.email_label') }}</h5>
                            <p class="contact-info-text">
                                <a href="mailto:info@alrashed-traffic.com" class="contact-info-link">
                                    info@alrashed-traffic.com
                                </a>
                            </p>
                            <small class="text-muted">{{ __('contact.email_response_time') }}</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="contact-info-card h-100">
                        <div class="contact-icon-wrapper">
                            <div class="contact-icon whatsapp-icon">
                                <i class="fab fa-whatsapp"></i>
                            </div>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-title">{{ __('home.whatsapp_label') }}</h5>
                            <p class="contact-info-text">
                                <a href="https://wa.me/201000864742" class="contact-info-link" target="_blank">
                                    {{ __('home.phone_number') }}
                                </a>
                            </p>
                            <small class="text-muted">{{ __('contact.whatsapp_available') }}</small>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="contact-info-card h-100">
                        <div class="contact-icon-wrapper">
                            <div class="contact-icon fax-icon">
                                <i class="fas fa-fax"></i>
                            </div>
                        </div>
                        <div class="contact-info-content">
                            <h5 class="contact-info-title">{{ __('home.fax_label') }}</h5>
                            <p class="contact-info-text">
                                <a href="tel:0223879050" class="contact-info-link">
                                    {{ __('home.fax_number') }}
                                </a>
                            </p>
                            <small class="text-muted">{{ __('contact.business_hours') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact-section" class="section-padding">
        <div class="container">
            <div class="section-header text-center fade-in mb-5">
                <h2 class="section-title">{{ __('contact.get_in_touch') }}</h2>
                <div class="title-divider"></div>
                <p class="section-subtitle">{{ __('contact.contact_subtitle') }}</p>
            </div>

            <div class="row g-5">
                <!-- Contact Form -->
                <div class="col-lg-6">
                    <div class="contact-form-wrapper fade-in">
                        <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control form-control-lg"
                                            placeholder="{{ __('contact.name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-lg"
                                            placeholder="{{ __('contact.email') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control form-control-lg"
                                            placeholder="{{ __('contact.subject') }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" rows="6" class="form-control form-control-lg"
                                            placeholder="{{ __('contact.message') }}" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 w-100">
                                        <i class="fas fa-paper-plane me-2"></i>
                                        {{ __('contact.send_message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="col-lg-6">
                    <div class="map-wrapper fade-in">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3624.9!2d46.7!3d24.7!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMjTCsDQyJzAwLjAiTiA0NsKwNDInMDAuMCJF!5e0!3m2!1sen!2ssa!4v1234567890"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
