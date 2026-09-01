<div class="product-card rounded-4 shadow-lg h-100 overflow-hidden">
    <div class="product-image-wrapper">
        @if ($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                alt="{{ $product->getName() }}"
                class="product-image"
                width="400"
                height="250"
                loading="lazy"
                decoding="async">
        @else
            <img src="{{ asset('images/placeholder.jpg') }}"
                alt="{{ $product->getName() }}"
                class="product-image"
                width="400"
                height="250"
                loading="lazy"
                decoding="async">
        @endif
        <div class="product-overlay">
            <a href="{{ route('products.show', $product) }}" class="btn btn-light btn-sm">
                <i class="fas fa-eye me-2"></i>{{ __('products.view_details') }}
            </a>
        </div>
    </div>
    <div class="product-content p-4">
        <h3 class="product-title fw-bold mb-3">{{ $product->getName() }}</h3>
        @if ($product->code)
            <p class="product-subtitle text-muted mb-3">{{ __('products.product_code') }}: {{ $product->code }}</p>
        @endif
        @if ($product->description)
            <p class="product-description mb-0">
                {{ Str::limit($product->description, 150) }}
            </p>
        @endif
    </div>
    <a href="{{ route('products.show', $product) }}" class="product-card-footer-link">
        {{ __('products.view_details') }}
        <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} icon-dir icon-dir-flip"></i>
    </a>
</div>
