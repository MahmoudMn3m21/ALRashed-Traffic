@extends('layouts.app')

@section('title', __('navbar.clients'))

@section('content')

    <!-- CHANGE: Added CSS to align cards -->
    <style>
        .client-card {
            height: 100%;
            /* CHANGE */
            display: flex;
            /* CHANGE */
            flex-direction: column;
            /* CHANGE */
            justify-content: space-between;
            /* CHANGE */
        }

        .client-logo-container {
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .client-logo {
            width: 100%;
            /* CHANGE: full width */
            height: 100%;
            /* CHANGE */
            object-fit: contain;
        }

        .client-info {
            flex: 1;
            /* CHANGE */
            display: flex;
            /* CHANGE */
            flex-direction: column;
            /* CHANGE */
            justify-content: flex-start;
            /* CHANGE */
            text-align: center;
            /* CHANGE */
            padding: 10px 15px 20px;
            /* CHANGE */
        }

        .client-name {
            min-height: 48px;
            /* CHANGE */
        }

        .client-description {
            min-height: 50px;
            /* CHANGE */
        }

        .client-info .btn {
            margin-top: auto;
            /* CHANGE */
        }
    </style>


    <!-- Clients Hero Section -->
    <section class="hero-section position-relative overflow-hidden">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="container position-relative">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-8 mx-auto text-center text-white">
                    <div class="fade-in">
                        <h1 class="hero-title mb-4">{{ __('navbar.clients') }}</h1>
                        <p class="hero-subtitle mb-5">{{ __('clients.hero_subtitle') }}</p>
                        <a href="#clients-showcase" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                            {{ __('clients.view_clients') }}
                            <i class="fas fa-arrow-down ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="hero-particles">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>

        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>


    <!-- Clients Showcase Section -->
    <section id="clients-showcase" class="section-padding">
        <div class="container">

            <div class="section-header text-center fade-in">
                <h2 class="section-title">{{ __('clients.page_title') }}</h2>
                <div class="title-divider"></div>
                <p class="section-subtitle">{{ __('clients.page_subtitle') }}</p>
            </div>

            @if ($clients->count() > 0)

                <div class="row g-4 fade-in">

                    @foreach ($clients as $client)

                        <div class="col-lg-3 col-md-4 col-sm-6">

                            <div class="client-card">

                                <div class="client-logo-container">

                                    @if ($client->logo)

                                        <img src="{{ asset('storage/clients/' . $client->logo) }}" alt="{{ $client->name }}"
                                            class="client-logo">

                                    @else

                                        <div class="client-logo-placeholder">
                                            <i class="fas fa-building"></i>
                                        </div>

                                    @endif

                                </div>

                                <div class="client-info">

                                    <h5 class="client-name">{{ $client->name }}</h5>

                                    @if ($client->description)

                                        <p class="client-description">
                                            {{ Str::limit($client->description, 80) }}
                                        </p>

                                    @endif

                                    @if ($client->website)

                                        <a href="{{ $client->website }}" target="_blank" class="btn btn-outline-primary btn-sm">

                                            <i class="fas fa-external-link-alt me-1"></i>
                                            {{ __('clients.visit_website') }}

                                        </a>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                @if ($clients->hasPages())

                    <div class="pagination-section mt-5">
                        <div class="pagination-wrapper">
                            {{ $clients->links('pagination.custom') }}
                        </div>
                    </div>

                @endif


                <div class="row mt-5">
                    <div class="col-12">

                        <div class="clients-stats fade-in">

                            <div class="row text-center">

                                <div class="col-6 col-md-6">

                                    <div class="stat-item">
                                        <div class="stat-number">{{ $clients->total() }}+</div>
                                        <div class="stat-label">{{ __('clients.total_clients') }}</div>
                                    </div>

                                </div>

                                <div class="col-6 col-md-6">

                                    <div class="stat-item">
                                        <div class="stat-number">15+</div>
                                        <div class="stat-label">{{ __('clients.years_experience') }}</div>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

            @else

                <div class="col-12">

                    <div class="empty-state text-center py-5">

                        <i class="fas fa-handshake fa-4x text-muted mb-4"></i>

                        <h3 class="text-muted">
                            {{ __('clients.no_clients_title') }}
                        </h3>

                        <p class="text-muted">
                            {{ __('clients.no_clients_message') }}
                        </p>

                        <a href="{{ route('contact.index') }}" class="btn btn-primary">
                            {{ __('clients.become_client') }}
                        </a>

                    </div>

                </div>

            @endif

        </div>
    </section>


    <section class="section-padding">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <div class="fade-in">

                        <h2 class="mb-3">
                            {{ __('clients.cta_title') }}
                        </h2>

                        <p class="lead mb-0">
                            {{ __('clients.cta_subtitle') }}
                        </p>

                    </div>

                </div>

                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">

                    <div class="fade-in">

                        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg px-5 py-3">

                            <i class="fas fa-handshake me-2"></i>

                            {{ __('clients.partner_with_us') }}

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection