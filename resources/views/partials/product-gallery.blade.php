@php
    $images = $product->getGalleryImages();
    $hasImages = count($images) > 0;
    $hasMultipleImages = count($images) > 1;
@endphp

<div class="product-gallery" data-product-gallery>
    <div class="product-gallery__main">
        <div class="product-gallery__frame ratio ratio-1x1">
            @if ($hasImages)
                <img id="productGalleryMain"
                    src="{{ $images[0]['src'] }}"
                    alt="{{ $images[0]['alt'] }}"
                    class="product-gallery__image"
                    width="600"
                    height="600"
                    fetchpriority="high"
                    decoding="async">
            @else
                <div class="product-gallery__placeholder" role="img" aria-label="{{ __('products.no_image') }}">
                    <i class="fas fa-image" aria-hidden="true"></i>
                    <span>{{ __('products.no_image') }}</span>
                </div>
            @endif
        </div>
    </div>

    @if ($hasMultipleImages)
        <div class="product-gallery__thumbs" role="tablist" aria-label="{{ __('products.gallery_thumbnails') }}">
            @foreach ($images as $index => $image)
                <button type="button"
                    class="product-gallery__thumb{{ $index === 0 ? ' is-active' : '' }}"
                    role="tab"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-controls="productGalleryMain"
                    data-gallery-src="{{ $image['src'] }}"
                    data-gallery-alt="{{ $image['alt'] }}"
                    @if ($index > 0) tabindex="-1" @endif>
                    <img src="{{ $image['src'] }}"
                        alt="{{ $image['alt'] }}"
                        width="80"
                        height="80"
                        loading="lazy"
                        decoding="async">
                </button>
            @endforeach
        </div>
    @endif
</div>
