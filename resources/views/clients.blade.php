@extends('layouts.app')

@section('title', 'Clients')

@section('content')
<!-- Clients Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">Our Clients</h1>
                <p class="lead mb-4">Trusted partners who rely on our traffic solutions</p>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Our Valued Clients</h2>
                <p class="lead text-muted">Companies that trust us with their traffic management needs</p>
            </div>
        </div>
        
        @if($clients->count() > 0)
            <div class="row g-4">
                @foreach($clients as $client)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm text-center">
                        @if($client->logo)
                            <div class="card-img-top d-flex align-items-center justify-content-center p-4" style="height: 200px;">
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="img-fluid" style="max-height: 150px; max-width: 100%; object-fit: contain;">
                            </div>
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-building fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $client->name }}</h5>
                            @if($client->website)
                                <a href="{{ $client->website }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <i class="fas fa-external-link-alt me-1"></i>
                                    Visit Website
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h4>No Clients Yet</h4>
                        <p>We're building our client portfolio. Check back soon!</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection