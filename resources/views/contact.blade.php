@extends('layouts.app')

@section('title', __('navbar.contact'))

@section('content')
<!-- Contact Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ __('navbar.contact') }}</h1>
                <p class="lead mb-4">{{ __('contact.hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <!-- Contact Info -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-12">
                <div class="row g-4">
                    <div class="col-md-3 text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                        </div>
                        <h6 class="fw-bold">{{ __('home.address_label') }}</h6>
                        <p class="text-muted">{{ __('home.address_text') }}</p>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-envelope fa-lg"></i>
                        </div>
                        <h6 class="fw-bold">{{ __('home.email_label') }}</h6>
                        <p class="text-muted">
                            <a href="mailto:info@alrashed-traffic.com" class="text-decoration-none">
                                info@alrashed-traffic.com
                            </a>
                        </p>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fab fa-whatsapp fa-lg"></i>
                        </div>
                        <h6 class="fw-bold">{{ __('home.whatsapp_label') }}</h6>
                        <p class="text-muted">
                            <a href="https://wa.me/201000864742" class="text-decoration-none">
                                {{ __('home.phone_number') }}
                            </a>
                        </p>
                    </div>
                    <div class="col-md-3 text-center">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 60px; height: 60px;">
                            <i class="fas fa-fax fa-lg"></i>
                        </div>
                        <h6 class="fw-bold">{{ __('home.fax_label') }}</h6>
                        <p class="text-muted">
                            <a href="tel:0223879050" class="text-decoration-none">
                                {{ __('home.fax_number') }}
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form + Google Map -->
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">{{ __('home.contact_form_title') }}</h3>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('home.name_label') }}</label>
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('home.email_placeholder') }}</label>
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">{{ __('home.message_label') }}</label>
                                <textarea id="message" name="message" rows="5"
                                    class="form-control @error('message') is-invalid @enderror"
                                    required>{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary px-4">{{ __('home.send_button') }}</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Google Map -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="fw-bold mb-4">{{ __('home.location_title') }}</h3>
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.253429284081!2d31.342564!3d30.067238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e5b3d21bb6f%3A0x9c35d4cf0c8a69f!2zMTA!5e0!3m2!1sen!2seg!4v1693234567890"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                title="موقع مؤسسة الراشد على الخريطة">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection