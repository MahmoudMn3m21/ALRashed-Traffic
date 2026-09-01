@extends('layouts.app')

@php
    use App\Support\ContactLinks;
    use Illuminate\Support\Str;

    $productName = $product->getName();
    $specifications = $product->getSpecificationEntries();
    $usageLines = $product->getUsageLines();
    $featureLines = $product->getFeatureLines();
    $galleryImages = $product->getGalleryImages();
    $metaDescription = Str::limit(strip_tags((string) $product->description), 160) ?: $productName;
    $canonicalUrl = route('products.show', $product);
    $ogImage = $product->getImageUrl() ?: asset('images/logo_white.png');

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

    $breadcrumbItems[] = ['label' => $productName, 'url' => '#'];
@endphp

@section('title', $productName)

@push('head')
    <meta name="description" content="{{ $metaDescription }}">
    <link rel="canonical" href="{{ $canonicalUrl }}">
    <meta property="og:type" content="product">
    <meta property="og:title" content="{{ $productName }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:url" content="{{ $canonicalUrl }}">
    <meta property="og:image" content="{{ $ogImage }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'ar' ? 'ar_EG' : 'en_US' }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $productName }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">
    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $productName,
            'description' => $product->description ?: $productName,
            'sku' => $product->code,
            'image' => $galleryImages ? array_column($galleryImages, 'src') : [],
            'brand' => [
                '@type' => 'Brand',
                'name' => config('app.name', 'Al Rashed Safety'),
            ],
            'category' => $product->category?->getName(),
        ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
<section class="product-detail-hero">
    <div class="container">
        @include('partials.breadcrumb', ['items' => $breadcrumbItems])

        <div class="row g-4 g-lg-5 align-items-start product-detail-layout">
            <div class="col-lg-6">
                @include('partials.product-gallery', ['product' => $product])
            </div>

            <div class="col-lg-6 product-detail-info">
                @if ($product->category)
                    <a href="{{ route('products.by_category', $product->category) }}" class="product-detail-category">
                        {{ $product->category->getName() }}
                    </a>
                @endif

                <h1 class="product-detail-title">{{ $productName }}</h1>

                @if ($product->getAlternateName())
                    <p class="product-detail-meta">{{ $product->getAlternateName() }}</p>
                @endif

                @if ($product->description)
                    <p class="product-detail-summary">{{ Str::limit($product->description, 180) }}</p>
                @endif

                @if (count($specifications) > 0)
                    <div class="product-detail-specs">
                        <h2 class="product-detail-specs__title">{{ __('products.specifications') }}</h2>
                        <div class="table-responsive product-spec-table-wrap">
                            <table class="product-spec-table">
                                <caption class="visually-hidden">{{ __('products.specifications') }} — {{ $productName }}</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('products.spec_label') }}</th>
                                        <th scope="col">{{ __('products.spec_value') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($specifications as $spec)
                                        <tr>
                                            <th scope="row">{{ $spec['label'] }}</th>
                                            <td>{{ $spec['value'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                <div class="product-detail-actions">
                    <a href="{{ ContactLinks::productQuoteUrl($product) }}" class="btn btn-primary btn-lg product-detail-cta-primary">
                        <i class="fas fa-file-invoice me-2"></i>{{ __('products.request_quote') }}
                    </a>
                    <a href="{{ ContactLinks::productWhatsAppUrl($product) }}"
                        class="btn btn-whatsapp btn-lg"
                        target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-whatsapp me-2"></i>{{ __('products.whatsapp_inquiry') }}
                    </a>
                    @if ($product->category)
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

@if ($product->description && strlen($product->description) > 180)
<section class="product-detail-section section-padding pt-0">
    <div class="container">
        <div class="product-detail-panel">
            <h2 class="product-detail-section-heading">{{ __('products.description') }}</h2>
            <div class="title-divider mb-4"></div>
            <div class="product-detail-prose">
                {!! nl2br(e($product->description)) !!}
            </div>
        </div>
    </div>
</section>
@endif

@if (count($featureLines) > 0)
<section class="product-detail-section section-padding pt-0">
    <div class="container">
        <div class="product-detail-panel">
            <h2 class="product-detail-section-heading">{{ __('products.features') }}</h2>
            <div class="title-divider mb-4"></div>
            <ul class="product-detail-list">
                @foreach ($featureLines as $feature)
                    <li>{{ $feature }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif

@if (count($usageLines) > 0)
<section class="product-detail-section section-padding pt-0">
    <div class="container">
        <div class="product-detail-panel">
            <h2 class="product-detail-section-heading">{{ __('products.applications') }}</h2>
            <div class="title-divider mb-4"></div>
            <ul class="product-applications" role="list">
                @foreach ($usageLines as $usage)
                    <li class="product-applications__item">{{ $usage }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif

@if ($relatedProducts->isNotEmpty())
<section class="product-detail-section section-padding pt-0">
    <div class="container">
        <div class="product-related">
            <div class="text-center mb-5">
                <h2 class="section-title mb-3">{{ __('products.related_products') }}</h2>
                <div class="title-divider mx-auto"></div>
                <p class="product-related__subtitle text-muted mt-3 mb-0">{{ __('products.related_products_subtitle') }}</p>
            </div>
            <div class="row g-4">
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        @include('partials.product-card', ['product' => $relatedProduct])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<section class="cta-band section-padding py-5">
    <div class="container">
        <div class="row align-items-center g-3">
            <div class="col-lg-8">
                <h2 class="cta-band-title mb-2">{{ __('products.cta_title') }}</h2>
                <p class="cta-band-text mb-0">{{ __('products.cta_subtitle') }}</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="{{ ContactLinks::productQuoteUrl($product) }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-handshake me-2"></i>{{ __('products.get_quote') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    (function () {
        const gallery = document.querySelector('[data-product-gallery]');
        if (!gallery) return;

        const mainImage = gallery.querySelector('#productGalleryMain');
        const thumbs = gallery.querySelectorAll('.product-gallery__thumb');
        if (!mainImage || thumbs.length === 0) return;

        thumbs.forEach((thumb) => {
            thumb.addEventListener('click', () => {
                const src = thumb.dataset.gallerySrc;
                const alt = thumb.dataset.galleryAlt;
                if (!src) return;

                mainImage.src = src;
                mainImage.alt = alt || '';

                thumbs.forEach((item) => {
                    const isActive = item === thumb;
                    item.classList.toggle('is-active', isActive);
                    item.setAttribute('aria-selected', isActive ? 'true' : 'false');
                    item.tabIndex = isActive ? 0 : -1;
                });
            });
        });
    })();
</script>
@endpush
