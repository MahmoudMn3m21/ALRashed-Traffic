@extends('layouts.app')

@section('title', $product->getName())

@section('content')
@php
    $breadcrumbItems = [
        ['label' => __('navbar.home'), 'url' => url('/')],
        ['label' => __('navbar.products'), 'url' => route('products.index')],
    ];
    if ($product->category) {
        $breadcrumbItems[] = [
            'label' => $product->category->getName(),
            'url' => route('products.by_category', $product->category),
        ];
    }
    $breadcrumbItems[] = ['label' => $product->getName(), 'url' => '#'];
@endphp

<section class="product-detail-hero">
    <div class="container">
        @include('partials.breadcrumb', ['items' => $breadcrumbItems])
        <h1 class="hero-title mb-2">{{ $product->getName() }}</h1>
        @if($product->getAlternateName())
        <p class="product-detail-meta mb-0">{{ $product->getAlternateName() }}</p>
        @endif
    </div>
</section>

<section class="section-padding pt-4">
    <div class="container">
        <div class="row g-4 g-lg-5 align-items-start">
            <div class="col-lg-6">
                <div class="product-detail-image-frame">
                    @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->getName() }}"
                        width="600" height="600" fetchpriority="high" decoding="async">
                    @else
                    <div class="d-flex align-items-center justify-content-center w-100" style="min-height: 280px;">
                        <i class="fas fa-image fa-4x text-muted"></i>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <h2 class="section-title mb-3 product-detail-section-title">{{ __('products.product_details') }}</h2>
                <div class="title-divider mb-4"></div>

                @if($product->code || $product->material || $product->color)
                <div class="product-spec-grid">
                    @if($product->code)
                    <div class="product-spec-item">
                        <span class="product-spec-label">{{ __('products.product_code') }}</span>
                        <p class="product-spec-value">{{ $product->code }}</p>
                    </div>
                    @endif
                    @if($product->material)
                    <div class="product-spec-item">
                        <span class="product-spec-label">{{ __('products.material') }}</span>
                        <p class="product-spec-value">{{ $product->material }}</p>
                    </div>
                    @endif
                    @if($product->color)
                    <div class="product-spec-item">
                        <span class="product-spec-label">{{ __('products.color') }}</span>
                        <p class="product-spec-value">{{ $product->color }}</p>
                    </div>
                    @endif
                </div>
                @endif

                @if($product->description)
                <div class="product-detail-block">
                    <h3>{{ __('products.description') }}</h3>
                    <p class="spec-text">{{ $product->description }}</p>
                </div>
                @endif

                @if($product->features)
                <div class="product-detail-block">
                    <h3>{{ __('products.features') }}</h3>
                    <div class="spec-text">{!! nl2br(e($product->features)) !!}</div>
                </div>
                @endif

                @if($product->usages)
                <div class="product-detail-block">
                    <h3>{{ __('products.usages') }}</h3>
                    <div class="spec-text">{!! nl2br(e($product->usages)) !!}</div>
                </div>
                @endif

                <div class="product-detail-actions">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-paper-plane me-2"></i>{{ __('products.request_quote') }}
                    </a>
                    @if($product->category)
                    <a href="{{ route('products.by_category', $product->category) }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} me-2 icon-dir icon-dir-flip"></i>{{ __('products.back_to_category') }}
                    </a>
                    @else
                    <a href="{{ route('products.index') }}" class="btn btn-outline-light">
                        <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} me-2 icon-dir icon-dir-flip"></i>{{ __('products.back_to_products') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-band section-padding py-5">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <h2 class="cta-band-title mb-2">{{ __('products.cta_title') }}</h2>
                <p class="cta-band-text mb-0">{{ __('products.cta_subtitle') }}</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-handshake me-2"></i>{{ __('products.get_quote') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
