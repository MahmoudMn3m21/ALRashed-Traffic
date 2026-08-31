@extends('layouts.app')

@section('title', __('navbar.gallery'))

@section('content')
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-10 col-xl-8 mx-auto text-center text-white">
                <div class="fade-in">
                    <h1 class="hero-title mb-4">{{ __('navbar.gallery') }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('gallery.hero_subtitle') }}</p>
                    <a href="#gallery-showcase" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                        {{ __('gallery.view_gallery') }} <i class="fas fa-images ms-2"></i>
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
        <a href="#gallery-showcase" class="smooth-scroll" aria-label="Scroll down">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<section id="gallery-showcase" class="section-padding">
    <div class="container">
        <h2 class="section-title mb-4 text-center">{{ __('gallery.page_title') }}</h2>
        <div class="title-divider mx-auto mb-5"></div>

        @if ($items->count() > 0)
        <div class="row g-4" id="galleryGrid">
            @foreach ($items as $index => $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <button type="button"
                    class="gallery-item"
                    data-src="{{ asset('storage/gallery/' . $item->image) }}"
                    data-title="{{ $item->getTitle() }}"
                    data-index="{{ $index }}"
                    aria-label="{{ __('gallery.open_image') }}{{ $item->getTitle() ? ': ' . $item->getTitle() : '' }}">
                    <div class="gallery-item__frame ratio ratio-1x1 rounded-4 overflow-hidden">
                        <img src="{{ asset('storage/gallery/' . $item->image) }}" alt="{{ $item->getTitle() }}"
                            class="gallery-item__img object-fit-cover w-100 h-100" width="300" height="300"
                            loading="lazy" decoding="async">
                        <span class="gallery-item__zoom" aria-hidden="true">
                            <i class="fas fa-search-plus"></i>
                        </span>
                    </div>
                    @if ($item->getTitle())
                    <p class="gallery-item__caption">{{ $item->getTitle() }}</p>
                    @endif
                </button>
            </div>
            @endforeach
        </div>

        @if ($items->hasPages())
        <div class="pagination-section mt-5">
            <div class="pagination-wrapper">
                {{ $items->links('pagination.custom') }}
            </div>
        </div>
        @endif
        @else
        <div class="text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-4"></i>
            <p class="text-muted lead">{{ __('gallery.no_items') }}</p>
        </div>
        @endif
    </div>
</section>

@if ($items->count() > 0)
<div id="galleryLightbox" class="gallery-lightbox" aria-hidden="true" role="dialog" aria-modal="true"
    aria-labelledby="galleryLightboxCaption">
    <div class="gallery-lightbox__backdrop" data-gallery-close></div>
    <div class="gallery-lightbox__panel">
        <button type="button" class="gallery-lightbox__close" data-gallery-close
            aria-label="{{ __('gallery.close') }}">
            <i class="fas fa-times"></i>
        </button>

        <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--prev" id="galleryLightboxPrev"
            aria-label="{{ __('gallery.previous') }}">
            <i class="fas fa-chevron-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }}"></i>
        </button>

        <button type="button" class="gallery-lightbox__nav gallery-lightbox__nav--next" id="galleryLightboxNext"
            aria-label="{{ __('gallery.next') }}">
            <i class="fas fa-chevron-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
        </button>

        <figure class="gallery-lightbox__figure">
            <img id="galleryLightboxImage" src="" alt="" class="gallery-lightbox__image">
            <figcaption id="galleryLightboxCaption" class="gallery-lightbox__caption"></figcaption>
        </figure>

        <p class="gallery-lightbox__counter" id="galleryLightboxCounter" aria-live="polite"></p>
    </div>
</div>
@endif
@endsection

@push('styles')
<style>
    /* Gallery page — grid + lightbox popup */
    #gallery-showcase .gallery-item {
        display: block;
        width: 100%;
        padding: 0;
        border: 0;
        background: transparent;
        text-align: center;
        cursor: pointer;
        color: inherit;
        transition: transform 0.25s ease;
    }

    #gallery-showcase .gallery-item:hover,
    #gallery-showcase .gallery-item:focus-visible {
        transform: translateY(-4px);
        outline: none;
    }

    #gallery-showcase .gallery-item__frame {
        position: relative;
        background: var(--bg-elevated, #0e1016);
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.35);
        transition: border-color 0.25s ease, box-shadow 0.25s ease;
    }

    #gallery-showcase .gallery-item:hover .gallery-item__frame,
    #gallery-showcase .gallery-item:focus-visible .gallery-item__frame {
        border-color: rgba(255, 201, 35, 0.45);
        box-shadow: 0 16px 40px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(255, 201, 35, 0.12);
    }

    #gallery-showcase .gallery-item__img {
        transition: transform 0.45s ease;
    }

    #gallery-showcase .gallery-item:hover .gallery-item__img {
        transform: scale(1.05);
    }

    #gallery-showcase .gallery-item__zoom {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(180deg, transparent 40%, rgba(7, 8, 11, 0.75));
        color: #fff;
        font-size: 1.35rem;
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    #gallery-showcase .gallery-item:hover .gallery-item__zoom,
    #gallery-showcase .gallery-item:focus-visible .gallery-item__zoom {
        opacity: 1;
    }

    #gallery-showcase .gallery-item__zoom i {
        width: 44px;
        height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 201, 35, 0.92);
        color: #07080b;
        box-shadow: 0 8px 24px rgba(255, 201, 35, 0.35);
    }

    #gallery-showcase .gallery-item__caption {
        margin: 0.65rem 0 0;
        font-size: 0.875rem;
        color: var(--text-muted, #9aa0ad);
        line-height: 1.4;
    }

    /* Lightbox popup */
    .gallery-lightbox {
        position: fixed;
        inset: 0;
        z-index: 1090;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    .gallery-lightbox.is-open {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .gallery-lightbox__backdrop {
        position: absolute;
        inset: 0;
        background: rgba(7, 8, 11, 0.92);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .gallery-lightbox__panel {
        position: relative;
        z-index: 2;
        width: min(960px, 100%);
        max-height: calc(100dvh - 2rem);
        display: flex;
        flex-direction: column;
        align-items: center;
        animation: galleryLightboxIn 0.35s ease;
    }

    @keyframes galleryLightboxIn {
        from {
            opacity: 0;
            transform: scale(0.96) translateY(12px);
        }

        to {
            opacity: 1;
            transform: scale(1) translateY(0);
        }
    }

    .gallery-lightbox__figure {
        margin: 0;
        width: 100%;
        text-align: center;
    }

    .gallery-lightbox__image {
        display: block;
        max-width: 100%;
        max-height: min(72dvh, 720px);
        width: auto;
        height: auto;
        margin: 0 auto;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        box-shadow: 0 24px 60px rgba(0, 0, 0, 0.55);
        object-fit: contain;
        background: #0e1016;
    }

    .gallery-lightbox__image.is-loading {
        min-height: 200px;
        opacity: 0.5;
    }

    .gallery-lightbox__caption {
        margin-top: 1rem;
        color: #f4f5f7;
        font-size: 1rem;
        font-weight: 600;
        line-height: 1.5;
        max-width: 640px;
        margin-inline: auto;
    }

    .gallery-lightbox__caption:empty {
        display: none;
    }

    .gallery-lightbox__counter {
        margin: 0.75rem 0 0;
        color: #9aa0ad;
        font-size: 0.85rem;
        font-weight: 500;
    }

    .gallery-lightbox__close,
    .gallery-lightbox__nav {
        position: absolute;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid rgba(255, 255, 255, 0.14);
        background: rgba(19, 22, 30, 0.92);
        color: #f4f5f7;
        cursor: pointer;
        transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        z-index: 3;
    }

    .gallery-lightbox__close:hover,
    .gallery-lightbox__nav:hover,
    .gallery-lightbox__close:focus-visible,
    .gallery-lightbox__nav:focus-visible {
        background: #ffc923;
        border-color: #ffc923;
        color: #07080b;
        outline: none;
    }

    .gallery-lightbox__close {
        top: 0;
        inset-inline-end: 0;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        font-size: 1.1rem;
        transform: translate(25%, -25%);
    }

    .gallery-lightbox__nav {
        top: 50%;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        font-size: 1rem;
        transform: translateY(-50%);
    }

    .gallery-lightbox__nav--prev {
        inset-inline-start: -0.5rem;
    }

    .gallery-lightbox__nav--next {
        inset-inline-end: -0.5rem;
    }

    .gallery-lightbox__nav:disabled {
        opacity: 0.35;
        cursor: not-allowed;
        pointer-events: none;
    }

    body.gallery-lightbox-open {
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .gallery-lightbox {
            padding: 0.75rem;
        }

        .gallery-lightbox__panel {
            max-height: calc(100dvh - 1.5rem);
        }

        .gallery-lightbox__image {
            max-height: min(62dvh, 560px);
            border-radius: 10px;
        }

        .gallery-lightbox__close {
            top: 0.25rem;
            inset-inline-end: 0.25rem;
            transform: none;
        }

        .gallery-lightbox__nav {
            width: 44px;
            height: 44px;
        }

        .gallery-lightbox__nav--prev {
            inset-inline-start: 0.25rem;
        }

        .gallery-lightbox__nav--next {
            inset-inline-end: 0.25rem;
        }
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var lightbox = document.getElementById('galleryLightbox');
    if (!lightbox) return;

    var items = Array.from(document.querySelectorAll('#galleryGrid .gallery-item'));
    if (!items.length) return;

    var imageEl = document.getElementById('galleryLightboxImage');
    var captionEl = document.getElementById('galleryLightboxCaption');
    var counterEl = document.getElementById('galleryLightboxCounter');
    var prevBtn = document.getElementById('galleryLightboxPrev');
    var nextBtn = document.getElementById('galleryLightboxNext');
    var currentIndex = 0;

    function showSlide(index) {
        if (index < 0 || index >= items.length) return;
        currentIndex = index;

        var item = items[currentIndex];
        var src = item.getAttribute('data-src');
        var title = item.getAttribute('data-title') || '';

        imageEl.classList.add('is-loading');
        imageEl.src = src;
        imageEl.alt = title;
        captionEl.textContent = title;
        counterEl.textContent = (currentIndex + 1) + ' / ' + items.length;

        if (prevBtn) prevBtn.disabled = currentIndex === 0;
        if (nextBtn) nextBtn.disabled = currentIndex === items.length - 1;
    }

    imageEl.addEventListener('load', function () {
        imageEl.classList.remove('is-loading');
    });

    function openLightbox(index) {
        showSlide(index);
        lightbox.classList.add('is-open');
        lightbox.setAttribute('aria-hidden', 'false');
        document.body.classList.add('gallery-lightbox-open');
        lightbox.querySelector('.gallery-lightbox__close').focus();
    }

    function closeLightbox() {
        lightbox.classList.remove('is-open');
        lightbox.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('gallery-lightbox-open');
        imageEl.removeAttribute('src');
    }

    items.forEach(function (item, index) {
        item.addEventListener('click', function () {
            openLightbox(index);
        });
    });

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            showSlide(currentIndex - 1);
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            showSlide(currentIndex + 1);
        });
    }

    lightbox.querySelectorAll('[data-gallery-close]').forEach(function (el) {
        el.addEventListener('click', closeLightbox);
    });

    document.addEventListener('keydown', function (event) {
        if (!lightbox.classList.contains('is-open')) return;

        var isRtl = document.documentElement.getAttribute('dir') === 'rtl';

        if (event.key === 'Escape') {
            closeLightbox();
            return;
        }

        if (event.key === 'ArrowLeft') {
            if (isRtl) {
                if (!nextBtn.disabled) showSlide(currentIndex + 1);
            } else if (!prevBtn.disabled) {
                showSlide(currentIndex - 1);
            }
        } else if (event.key === 'ArrowRight') {
            if (isRtl) {
                if (!prevBtn.disabled) showSlide(currentIndex - 1);
            } else if (!nextBtn.disabled) {
                showSlide(currentIndex + 1);
            }
        }
    });
});
</script>
@endpush
