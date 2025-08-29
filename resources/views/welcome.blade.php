@extends('layouts.app')

@section('title', __('navbar.home'))

@section('content')
<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">{{ __('home.hero_title') }}</h1>
                <p class="lead mb-4">{{ __('home.hero_subtitle') }}</p>
                <a href="#products" class="btn btn-light btn-lg">{{ __('home.hero_cta') }}</a>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Alrashed Traffic" class="img-fluid rounded shadow"
                    style="max-height: 320px;">
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section id="products" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('home.products_title') }}</h2>
                <p class="lead text-muted">{{ __('home.products_subtitle') }}</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                        alt="{{ $product->getName() }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->getName() }}</h5>
                        <p class="card-text text-muted small">{{ $product->getAlternateName() }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Clients Section -->
<section id="clients" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('home.clients_title') }}</h2>
                <p class="lead text-muted">{{ __('home.clients_subtitle') }}</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach($clients as $client)
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 shadow-sm text-center">
                    @if($client->logo)
                    <div class="p-3 d-flex align-items-center justify-content-center" style="height: 150px;">
                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="img-fluid"
                            style="max-height: 120px; object-fit: contain;">
                    </div>
                    @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 150px;">
                        <i class="fas fa-building fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h6 class="card-title">{{ $client->name }}</h6>
                        @if($client->website)
                        <a href="{{ $client->website }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
                            <i class="fas fa-external-link-alt me-1"></i> Visit
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('home.projects_title') }}</h2>
                <p class="lead text-muted">{{ __('home.projects_subtitle') }}</p>
            </div>
        </div>
        <div class="row g-4">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top"
                        alt="{{ $project->getTitle() }}" style="height: 250px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->getTitle() }}</h5>
                        <p class="card-text">{{ Str::limit($project->getDescription(), 100) }}</p>
                        <p class="card-text text-muted small">{{ $project->getAlternateTitle() }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('home.contact_title') }}</h2>
                <p class="lead text-muted">{{ __('home.contact_subtitle') }}</p>
            </div>
        </div>

        <!-- Contact Info -->
        <div class="row justify-content-center">
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
                            <a href="https://wa.me/201000864742" class="text-decoration-none" target="_blank">
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
        <div class="row mt-5">
            <!-- Contact Form -->
            <div class="col-md-6 mb-4">
                <h3 class="fw-bold mb-3">{{ __('home.contact_form_title') }}</h3>
                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('home.name_label') }}</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('home.email_placeholder') }}</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">{{ __('home.message_label') }}</label>
                        <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary px-4">{{ __('home.send_button') }}</button>
                </form>
            </div>

            <!-- Google Map -->
            <div class="col-md-6">
                <h3 class="fw-bold mb-3">{{ __('home.location_title') }}</h3>
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
</section>
@endsection