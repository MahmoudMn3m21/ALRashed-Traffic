@extends('layouts.app')

@section('title', __('navbar.about'))

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
                <div class="col-lg-8 mx-auto text-center fade-in">
                    <h1 class="hero-title mb-4">{{ __('navbar.about') }}</h1>
                    <p class="hero-subtitle mb-4">{{ __('about.hero_subtitle') }}</p>
                    <div class="hero-buttons">
                        <a href="#company-intro" class="btn btn-primary btn-lg me-3 smooth-scroll">{{ __('about.learn_more') }}</a>
                        <a href="{{ url('/contact') }}" class="btn btn-outline-light btn-lg">{{ __('navbar.contact') }}</a>
                    </div>
                </div>
            </div>
            
            <!-- Scroll Indicator -->
            <div class="scroll-indicator">
                <a href="#company-intro" class="smooth-scroll">
                    <i class="fas fa-chevron-down"></i>
                </a>
            </div>
        </div>
    </section>

<!-- Company Introduction -->
<section id="company-intro" class="section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="fade-in">
                    <h2 class="section-title mb-4">{{ __('about.page_title') }}</h2>
                    <div class="title-divider mb-4"></div>
                    <p class="lead mb-4">
                        {{ __('about.intro_text') }}
                    </p>
                    <p class="mb-5">
                        {{ __('about.experience_text') }}
                    </p>
                    <div class="row g-4 mt-4">
                        <div class="col-6">
                            <div class="stat-card text-center p-4 bg-light rounded-4 shadow-sm h-100">
                                <div class="stat-icon mb-3">
                                    <i class="fas fa-calendar-alt text-primary fs-2"></i>
                                </div>
                                <h3 class="stat-number text-primary display-5 fw-bold mb-2">15+</h3>
                                <p class="stat-label text-muted fw-semibold mb-0">{{ __('about.years_experience') }}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-card text-center p-4 bg-light rounded-4 shadow-sm h-100">
                                <div class="stat-icon mb-3">
                                    <i class="fas fa-project-diagram text-primary fs-2"></i>
                                </div>
                                <h3 class="stat-number text-primary display-5 fw-bold mb-2">500+</h3>
                                <p class="stat-label text-muted fw-semibold mb-0">{{ __('about.projects_completed') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="slide-in-right">
                    <div class="about-image-wrapper position-relative">
                        <img src="{{ asset('images/logo.png') }}" alt="{{ __('about.company_image_alt') }}" class="img-fluid rounded-4 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center fade-in">
            <h2 class="section-title mb-4">{{ __('about.mission_vision_title') }}</h2>
            <div class="title-divider mx-auto mb-4"></div>
            <p class="section-subtitle mb-5">{{ __('about.mission_vision_subtitle') }}</p>
        </div>
        
        <div class="row g-5">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                <div class="mission-vision-card bg-white rounded-4 shadow-lg p-5 h-100">
                    <div class="card-icon mission mb-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" style="width: 80px; height: 80px;">
                            <i class="fas fa-bullseye text-white fs-2"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-3">{{ __('about.mission_title') }}</h3>
                    <p class="mb-0">{{ __('about.mission_text') }}</p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
                <div class="mission-vision-card bg-white rounded-4 shadow-lg p-5 h-100">
                    <div class="card-icon vision mb-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" style="width: 80px; height: 80px;">
                            <i class="fas fa-eye text-white fs-2"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-3">{{ __('about.vision_title') }}</h3>
                    <p class="mb-0">{{ __('about.vision_text') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section-padding">
    <div class="container">
        <div class="section-header text-center" data-aos="fade-up" data-aos-duration="800">
            <h2 class="section-title mb-4">{{ __('about.services_title') }}</h2>
            <div class="title-divider mx-auto mb-4"></div>
            <p class="section-subtitle mb-5">{{ __('about.services_subtitle') }}</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-card bg-light rounded-4 shadow-sm p-4 h-100 text-center">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" style="width: 70px; height: 70px;">
                            <i class="fas fa-road text-white fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">{{ __('about.service_1') }}</h4>
                    <p class="mb-0">{{ __('about.service_1_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-card bg-light rounded-4 shadow-sm p-4 h-100 text-center">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" style="width: 70px; height: 70px;">
                            <i class="fas fa-traffic-light text-white fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">{{ __('about.service_2') }}</h4>
                    <p class="mb-0">{{ __('about.service_2_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-card bg-light rounded-4 shadow-sm p-4 h-100 text-center">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" style="width: 70px; height: 70px;">
                            <i class="fas fa-shield-alt text-white fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">{{ __('about.service_3') }}</h4>
                    <p class="mb-0">{{ __('about.service_3_desc') }}</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="service-card bg-light rounded-4 shadow-sm p-4 h-100 text-center">
                    <div class="service-icon mb-4">
                        <div class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle bg-primary" style="width: 70px; height: 70px;">
                            <i class="fas fa-tools text-white fs-3"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-3">{{ __('about.service_4') }}</h4>
                    <p class="mb-0">{{ __('about.service_4_desc') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection