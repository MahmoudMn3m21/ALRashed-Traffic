@extends('layouts.app')

@section('title', __('navbar.products'))

@section('content')
@if ($categories->count() === 222)

<section class="categories-split-section d-flex flex-column flex-lg-row min-vh-100">

    @foreach ($categories as $category)

    @php
    $image = $category->image
    ? Storage::url('categories/' . $category->image)
    : asset('images/placeholder.jpg');
    @endphp

    <a href="{{ route('products.by_category', $category) }}"
        class="category-split-card flex-grow-1 position-relative overflow-hidden text-decoration-none">

        <div class="category-split-bg" style="background-image:url('{{ $image }}')">
        </div>

        <div class="category-split-overlay"></div>

        <div
            class="category-split-content position-absolute top-50 start-50 translate-middle text-center w-100 px-3">

            <h2 class="category-split-title mb-3">
                {{ $category->getName() }}
            </h2>

            <p class="category-split-count mb-4">
                {{ __('categories.products_count', ['count' => $category->products_count]) }}
            </p>

            <span class="btn btn-light btn-lg rounded-pill px-4">
                {{ __('categories.browse_products') }}
                <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} ms-2"></i>
            </span>

        </div>

    </a>

    @endforeach

</section>

@else
{{-- Standard hero + grid --}}
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="fade-in">
                    <h1 class="hero-title mb-4">{{ __('navbar.products') }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('categories.hero_subtitle') }}</p>
                    <a href="#categories-showcase" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                        {{ __('categories.view_categories') }}
                        <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <div class="scroll-arrow"></div>
    </div>
</section>

<section id="categories-showcase" class="section-padding">
    <div class="container">
        <div class="section-header text-center fade-in">
            <h2 class="section-title mb-4">{{ __('categories.page_title') }}</h2>
            <div class="title-divider mx-auto mb-4"></div>
            <p class="section-subtitle mb-5">{{ __('categories.page_subtitle') }}</p>
        </div>

        @if ($categories->count() > 0)
        <div class="row g-4">
            @foreach ($categories as $category)
            <div class="col-md-6 col-sm-12">
                <a href="{{ route('products.by_category', $category) }}" class="text-decoration-none">
                    <div class="product-card bg-white rounded-4 shadow-lg h-100 overflow-hidden border-0">
                        <div class="product-image-wrapper text-center position-relative" style="height: 220px; background: #f8f9fa;">
                            @if ($category->image)
                            <img src="{{ asset('storage/categories/' . $category->image) }}" alt="{{ $category->getName() }}" class="w-100 h-100 object-fit-cover">
                            @else
                            <i class="fas fa-folder-open fa-4x text-primary position-absolute top-50 start-50 translate-middle"></i>
                            @endif
                        </div>
                        <div class="product-content p-4 text-center">
                            <h3 class="product-title fw-bold mb-3 text-dark">{{ $category->getName() }}</h3>
                            <p class="text-muted mb-0">
                                {{ __('categories.products_count', ['count' => $category->products_count]) }}
                            </p>
                            <span class="btn btn-outline-primary btn-sm mt-3">
                                {{ __('categories.browse_products') }} <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} ms-1"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="col-12">
            <div class="empty-state text-center py-5">
                <i class="fas fa-folder-open fa-4x text-muted mb-4"></i>
                <h3 class="text-muted">{{ __('categories.no_categories_title') }}</h3>
                <p class="text-muted">{{ __('categories.no_categories_message') }}</p>
            </div>
        </div>
        @endif
    </div>
</section>
@endif
@endsection

@push('styles')
<style>
    .categories-split-section {
        min-height: 100vh;
    }

    .category-split-card {
        min-height: 50vh;
        display: flex;
        align-items: stretch;
    }

    .category-split-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
    }

    .category-split-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.2) 100%);
    }

    .category-split-content {
        z-index: 2;
    }

    .category-split-title {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        font-weight: 700;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .category-split-count {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    @media (max-width: 991.98px) {
        .categories-split-section {
            flex-direction: column;
        }

        .category-split-card {
            min-height: 50vh;
        }
    }
</style>
@endpush