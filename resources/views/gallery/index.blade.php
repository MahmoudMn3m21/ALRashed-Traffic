@extends('layouts.app')

@section('title', __('navbar.gallery'))

@section('content')
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="fade-in">
                    <h1 class="hero-title mb-4">{{ __('navbar.gallery') }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('gallery.hero_subtitle') }}</p>
                    <a href="#gallery-showcase" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                        View Gallery <i class="fas fa-images ms-2"></i>
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

<section id="gallery-showcase" class="section-padding">
    <div class="container">
        <h2 class="section-title mb-4 text-center">{{ __('gallery.page_title') }}</h2>
        <div class="title-divider mx-auto mb-5"></div>

        @if ($items->count() > 0)
        <div class="row g-4" id="galleryGrid">
            @foreach ($items as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <a href="{{ asset('storage/gallery/' . $item->image) }}" class="gallery-item" data-title="{{ $item->getTitle() }}" data-gallery="gallery">
                    <div class="ratio ratio-1x1 rounded-4 overflow-hidden shadow-sm bg-light">
                        <img src="{{ asset('storage/gallery/' . $item->image) }}" alt="{{ $item->getTitle() }}" class="object-fit-cover w-100 h-100">
                    </div>
                    @if ($item->getTitle())
                    <p class="small text-muted mt-2 mb-0 text-center">{{ $item->getTitle() }}</p>
                    @endif
                </a>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-4"></i>
            <p class="text-muted lead">{{ __('gallery.no_items') }}</p>
        </div>
        @endif
    </div>
</section>

@if ($items->count() > 0)
<!-- Bootstrap modal for lightbox -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">
            <div class="modal-body p-0 text-center">
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <img id="galleryModalImage" src="" alt="" class="img-fluid rounded">
                <p id="galleryModalCaption" class="text-white mt-2 mb-0"></p>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    var galleryModal = document.getElementById('galleryModal');
    if (!galleryModal) return;
    var modalImg = document.getElementById('galleryModalImage');
    var modalCaption = document.getElementById('galleryModalCaption');
    document.querySelectorAll('.gallery-item').forEach(function(el) {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            if (modalImg) modalImg.src = this.href;
            if (modalCaption) modalCaption.textContent = this.getAttribute('data-title') || '';
            new bootstrap.Modal(galleryModal).show();
        });
    });
});
</script>
@endpush
