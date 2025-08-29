@extends('layouts.app')

@section('title', __('navbar.products'))

@section('content')
<!-- Products Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ __('navbar.products') }}</h1>
                <p class="lead mb-4">{{ __('products.hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('products.page_title') }}</h2>
                <p class="lead text-muted">{{ __('products.page_subtitle') }}</p>
            </div>
        </div>
        
        @if($products->count() > 0)
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm position-relative">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->getName() }}" style="height: 250px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->getName() }}</h5>
                            <p class="card-text text-muted small">{{ $product->getAlternateName() }}</p>
                            @if($product->description)
                                <p class="card-text text-muted">{{ Str::limit($product->description, 100) }}</p>
                            @endif
                            <a href="{{ route('products.show', $product) }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h4>{{ __('products.no_products_title') }}</h4>
                        <p>{{ __('products.no_products_message') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection