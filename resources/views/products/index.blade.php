@extends('layouts.app')

@section('title', __('navbar.products'))

@section('content')
<!-- Products Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="fade-in">
                    @isset($category)
                    <nav aria-label="breadcrumb" class="mb-3">
                        <a href="{{ route('products.index') }}" class="text-white text-decoration-none small">
                            <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} me-2"></i>{{ __('categories.back_to_categories') }}
                        </a>
                    </nav>
                    <h1 class="hero-title mb-4">{{ $category->getName() }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('products.hero_subtitle') }}</p>
                    @else
                    <h1 class="hero-title mb-4">{{ __('navbar.products') }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('products.hero_subtitle') }}</p>
                    @endisset
                    <a href="#products-showcase" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                        {{ __('products.view_products') }}
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

<!-- Products Showcase Section -->
<section id="products-showcase" class="section-padding">
    <div class="container">
        <div class="section-header text-center fade-in">
            <h2 class="section-title mb-4">@isset($category){{ $category->getName() }}@else{{ __('products.page_title') }}@endisset</h2>
            <div class="title-divider mx-auto mb-4"></div>
            <p class="section-subtitle mb-5">{{ __('products.page_subtitle') }}</p>
        </div>

        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="bg-white rounded-4 shadow-sm p-3 p-lg-4">
                    <h5 class="fw-bold mb-3">{{ __('categories.page_title') }}</h5>

                    <div class="accordion accordion-flush" id="categoriesAccordion">
                        @foreach(($mainCategories ?? []) as $main)
                        @php
                        $isActiveMain = isset($category) && $category->id === $main->id;
                        $shouldShow = $isActiveMain;
                        @endphp
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading-{{ $main->id }}">
                                <button class="accordion-button {{ $shouldShow ? '' : 'collapsed' }} py-2" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse-{{ $main->id }}"
                                    aria-expanded="{{ $shouldShow ? 'true' : 'false' }}" aria-controls="collapse-{{ $main->id }}">
                                    <span class="fw-medium">{{ $main->getName() }}</span>
                                </button>
                            </h2>
                            <div id="collapse-{{ $main->id }}" class="accordion-collapse collapse {{ $shouldShow ? 'show' : '' }}"
                                aria-labelledby="heading-{{ $main->id }}" data-bs-parent="#categoriesAccordion">
                                <div class="accordion-body pt-2 pb-3">
                                    <div class="list-group list-group-flush">
                                        <a href="{{ route('products.by_category', $main) }}"
                                            class="list-group-item list-group-item-action px-0 {{ $isActiveMain && empty($subcategoryId) ? 'fw-bold text-primary' : '' }}">
                                            ALL ITEMS
                                        </a>

                                        @foreach($main->subcategories as $sub)
                                        <a href="{{ route('products.by_category', $main) }}?subcategory={{ $sub->id }}#products-showcase"
                                            class="list-group-item list-group-item-action px-0 ps-3 {{ ((string)($subcategoryId ?? '') === (string)$sub->id) ? 'fw-bold text-primary' : '' }}">
                                            {{ $sub->getName() }}
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Products Info -->
                <div class="row mb-4">
                    <div class="col-12 text-center text-lg-start">
                        <div class="products-info fade-in">
                            <div class="info-card bg-light rounded-4 shadow-sm p-4 d-inline-block">
                                <h3 class="text-primary mb-2">{{ $products->total() }}</h3>
                                <p class="text-muted mb-0">{{ __('products.total_products') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products Grid -->
                @if ($products->count() > 0)
                <div class="row g-4" id="productsContainer">
                    @foreach ($products as $index => $product)
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="product-card bg-white rounded-4 shadow-lg h-100 overflow-hidden">
                            <div class="product-image-wrapper text-center">
                                @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->getName() }}" class="product-image">
                                @else
                                <img src="{{ asset('images/placeholder.jpg') }}"
                                    alt="{{ $product->getName() }}" class="product-image">
                                @endif
                                <div class="product-overlay">
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-light btn-sm">
                                        <i class="fas fa-eye me-2"></i>{{ __('home.view_details') }}
                                    </a>
                                </div>
                            </div>
                            <div class="product-content p-4">
                                <h3 class="product-title fw-bold mb-3">{{ $product->getName() }}</h3>
                                @if ($product->code)
                                <p class="product-subtitle text-muted mb-3">Code: {{ $product->code }}</p>
                                @endif
                                @if ($product->description)
                                <p class="product-description mb-0">
                                    {{ Str::limit($product->description, 150) }}
                                </p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Product Modal -->
                    <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">{{ $product->getName() }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body p-0">
                                    @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->getName() }}" class="img-fluid w-100 mb-3">
                                    @endif
                                    <div class="p-4">
                                        @if ($product->code)
                                        <p class="text-muted mb-3">Code: {{ $product->code }}</p>
                                        @endif
                                        @if ($product->description)
                                        <p class="mb-3">{{ $product->description }}</p>
                                        @endif
                                        <div class="row g-3">
                                            @if ($product->material)
                                            <div class="col-md-6">
                                                <strong>{{ __('products.material') }}:</strong><br>
                                                <span class="text-muted">{{ $product->material }}</span>
                                            </div>
                                            @endif
                                            @if ($product->color)
                                            <div class="col-md-6">
                                                <strong>{{ __('products.color') }}:</strong><br>
                                                <span class="text-muted">{{ $product->color }}</span>
                                            </div>
                                            @endif
                                            @if ($product->features)
                                            <div class="col-12">
                                                <strong>{{ __('products.features') }}:</strong><br>
                                                <span class="text-muted">{{ $product->features }}</span>
                                            </div>
                                            @endif
                                            @if ($product->usages)
                                            <div class="col-12">
                                                <strong>{{ __('products.usages') }}:</strong><br>
                                                <span class="text-muted">{{ $product->usages }}</span>
                                            </div>
                                            @endif
                                            <div class="col-md-6">
                                                <strong>{{ __('products.created_date') }}:</strong><br>
                                                <span class="text-muted">{{ $product->created_at->format('F Y') }}</span>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>{{ __('products.last_updated') }}:</strong><br>
                                                <span class="text-muted">{{ $product->updated_at->format('F Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        {{ __('products.close') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if ($products->hasPages())
                <div class="pagination-section mt-5">
                    <div class="pagination-wrapper">
                        {{ $products->links('pagination.custom') }}
                    </div>
                </div>
                @endif
                @else
                <div class="col-12">
                    <div class="empty-state text-center py-5">
                        <i class="fas fa-box-open fa-4x text-muted mb-4"></i>
                        <h3 class="text-muted">{{ __('products.no_products_title') }}</h3>
                        <p class="text-muted">{{ __('products.no_products_message') }}</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary">
                            {{ __('products.contact_us') }}
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="section-padding text-dark" style="background-color: #f5f5f5ff;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="fade-in">
                    <h2 class="mb-3">{{ __('products.cta_title') }}</h2>
                    <p class="lead mb-0">{{ __('products.cta_subtitle') }}</p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <div class="fade-in">
                    <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3">
                        <i class="fas fa-handshake me-2"></i>
                        {{ __('products.start_project') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@if(request()->has('subcategory') || isset($category))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showcase = document.getElementById('products-showcase');
        if (showcase) {
            setTimeout(() => {
                showcase.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 100);
        }
    });
</script>
@endif
@endsection