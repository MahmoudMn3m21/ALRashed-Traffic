@extends('layouts.app')

@section('title', __('navbar.about'))

@section('content')
<!-- About Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ __('navbar.about') }}</h1>
                <p class="lead mb-4">{{ __('about.hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- About Content -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body p-5">
                        <h2 class="fw-bold mb-4">{{ __('about.page_title') }}</h2>
                        <p class="lead mb-4">
                            {{ __('about.intro_text') }}
                        </p>
                        <p class="mb-4">
                            {{ __('about.experience_text') }}
                        </p>
                        <p class="mb-4">
                            {{ __('about.mission_text') }}
                        </p>
                        
                        <h3 class="fw-bold mb-3">{{ __('about.services_title') }}</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> {{ __('about.service_1') }}</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> {{ __('about.service_2') }}</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> {{ __('about.service_3') }}</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> {{ __('about.service_4') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection