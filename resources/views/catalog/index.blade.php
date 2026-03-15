@extends('layouts.app')

@section('title', __('navbar.catalog'))

@section('content')
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="fade-in">
                    <h1 class="hero-title mb-4">{{ __('navbar.catalog') }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('catalog.hero_subtitle') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container">
        <h2 class="section-title mb-4 text-center">{{ __('catalog.page_title') }}</h2>
        <div class="title-divider mx-auto mb-5"></div>

        @if ($items->count() > 0)
        <div class="row g-4">
            @foreach ($items as $item)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-body text-center p-4 d-flex flex-column align-items-center justify-content-center" style="min-height: 200px;">
                        <i class="fas fa-file-pdf fa-4x text-danger mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">{{ $item->getTitle() }}</h5>
                        <a href="{{ asset('storage/catalog/' . $item->file) }}" target="_blank" rel="noopener" class="btn btn-primary mt-3 rounded-pill">
                            <i class="fas fa-download me-2"></i>{{ __('catalog.download') }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-folder-open fa-4x text-muted mb-4"></i>
            <p class="text-muted lead">{{ __('catalog.no_items') }}</p>
        </div>
        @endif
    </div>
</section>
@endsection
