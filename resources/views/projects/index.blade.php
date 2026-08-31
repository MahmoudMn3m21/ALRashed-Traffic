@extends('layouts.app')

@section('title', __('navbar.projects'))

@section('content')
<!-- Projects Hero Section -->
<section class="hero-section position-relative overflow-hidden">
    <div class="hero-background"></div>
    <div class="hero-overlay"></div>
    <div class="container position-relative">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-10 col-xl-8 mx-auto text-center text-white">
                <div class="fade-in">
                    <h1 class="hero-title mb-4">{{ __('navbar.projects') }}</h1>
                    <p class="hero-subtitle mb-5">{{ __('projects.hero_subtitle') }}</p>
                    <a href="#projects-showcase" class="btn btn-light btn-lg px-5 py-3 rounded-pill smooth-scroll">
                        {{ __('projects.view_projects') }}
                        <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <a href="#projects-showcase" class="smooth-scroll" aria-label="Scroll down">
            <i class="fas fa-chevron-down"></i>
        </a>
    </div>
</section>

<!-- Projects Showcase Section -->
<section id="projects-showcase" class="section-padding">
    <div class="container">
        <div class="section-header text-center fade-in">
            <h2 class="section-title mb-4">{{ __('projects.page_title') }}</h2>
            <div class="title-divider mx-auto mb-4"></div>
            <p class="section-subtitle mb-5">{{ __('projects.page_subtitle') }}</p>
        </div>

        <!-- Projects Info -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <div class="projects-info fade-in">
                    <div class="info-card rounded-4 shadow-sm p-4 d-inline-block">
                        <h3 class="text-primary mb-2">{{ $projects->total() }}</h3>
                        <p class="text-muted mb-0">{{ __('projects.total_projects') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        @if ($projects->count() > 0)
        <div class="row g-4" id="projectsContainer">
            @foreach ($projects as $index => $project)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="project-card bg-white rounded-4 shadow-lg h-100 overflow-hidden">
                    <div class="project-image-wrapper">
                        @if ($project->image)
                        <img src="{{ asset('storage/projects/' . $project->image) }}"
                            alt="{{ $project->getTitle() }}" class="project-image"
                            width="400" height="250" loading="lazy" decoding="async">
                        @else
                        <img src="{{ asset('images/placeholder.jpg') }}"
                            alt="{{ $project->getTitle() }}" class="project-image"
                            width="400" height="250" loading="lazy" decoding="async">
                        @endif
                        <div class="project-overlay">
                            <div class="project-overlay-content">
                                <h3 class="project-overlay-title">{{ $project->getTitle() }}</h3>
                                @if ($project->getAlternateTitle())
                                <p class="project-overlay-subtitle">{{ $project->getAlternateTitle() }}</p>
                                @endif
                                <div class="overlay-actions">
                                    <button type="button" class="btn btn-light btn-sm rounded-pill me-2 project-detail-trigger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#projectDetailModal"
                                        data-title="{{ $project->getTitle() }}"
                                        data-subtitle="{{ $project->getAlternateTitle() }}"
                                        data-description="{{ $project->getDescription() }}"
                                        data-image="{{ $project->image ? asset('storage/projects/' . $project->image) : '' }}">
                                        <i class="fas fa-eye me-1"></i>
                                        {{ __('projects.view_details') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-content p-4">
                        <h3 class="project-title fw-bold mb-3">{{ $project->getTitle() }}</h3>
                        @if ($project->getAlternateTitle())
                        <p class="project-subtitle text-muted mb-3">{{ $project->getAlternateTitle() }}</p>
                        @endif
                        @if ($project->getDescription())
                        <p class="project-description mb-0">
                            {{ Str::limit($project->getDescription(), 150) }}
                        </p>
                        @endif
                    </div>
                    <button type="button" class="product-card-footer-link project-detail-trigger"
                        data-bs-toggle="modal"
                        data-bs-target="#projectDetailModal"
                        data-title="{{ $project->getTitle() }}"
                        data-subtitle="{{ $project->getAlternateTitle() }}"
                        data-description="{{ $project->getDescription() }}"
                        data-image="{{ $project->image ? asset('storage/projects/' . $project->image) : '' }}">
                        {{ __('projects.view_details') }}
                        <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }} icon-dir icon-dir-flip"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Shared project detail modal (avoids duplicating images in DOM) -->
        <div class="modal fade" id="projectDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="projectDetailModalTitle"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body p-0">
                        <img id="projectDetailModalImage" src="" alt="" class="img-fluid w-100 mb-3 d-none">
                        <div class="p-4">
                            <p class="text-muted mb-3 d-none" id="projectDetailModalSubtitle"></p>
                            <p class="mb-3 d-none" id="projectDetailModalDescription"></p>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            {{ __('projects.close') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        @if ($projects->hasPages())
        <div class="pagination-section mt-5">
            <div class="pagination-wrapper">
                {{ $projects->links('pagination.custom') }}
            </div>
        </div>
        @endif
        @else
        <div class="col-12">
            <div class="empty-state text-center py-5">
                <i class="fas fa-building fa-4x text-muted mb-4"></i>
                <h3 class="text-muted">{{ __('projects.no_projects') }}</h3>
                <p class="text-muted">{{ __('projects.no_projects_desc') }}</p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary">
                    {{ __('projects.discuss_project') }}
                </a>
            </div>
        </div>
        @endif
    </div>
</section>

<!-- Call to Action Section -->
<section class="cta-band section-padding">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="fade-in">
                    <h2 class="mb-3 cta-band-title">{{ __('projects.cta_title') }}</h2>
                    <p class="lead mb-0 cta-band-text">{{ __('projects.cta_subtitle') }}</p>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                <div class="fade-in">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg px-5 py-3">
                        <i class="fas fa-handshake me-2"></i>
                        {{ __('projects.start_project') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modal = document.getElementById('projectDetailModal');
    if (!modal) {
        return;
    }

    modal.addEventListener('show.bs.modal', function (event) {
        var trigger = event.relatedTarget;
        if (!trigger) {
            return;
        }

        var titleEl = document.getElementById('projectDetailModalTitle');
        var imageEl = document.getElementById('projectDetailModalImage');
        var subtitleEl = document.getElementById('projectDetailModalSubtitle');
        var descriptionEl = document.getElementById('projectDetailModalDescription');

        if (titleEl) {
            titleEl.textContent = trigger.dataset.title || '';
        }

        if (imageEl) {
            var imageUrl = trigger.dataset.image || '';
            if (imageUrl) {
                imageEl.src = imageUrl;
                imageEl.alt = trigger.dataset.title || '';
                imageEl.classList.remove('d-none');
            } else {
                imageEl.removeAttribute('src');
                imageEl.classList.add('d-none');
            }
        }

        if (subtitleEl) {
            var subtitle = trigger.dataset.subtitle || '';
            subtitleEl.textContent = subtitle;
            subtitleEl.classList.toggle('d-none', subtitle === '');
        }

        if (descriptionEl) {
            var description = trigger.dataset.description || '';
            descriptionEl.textContent = description;
            descriptionEl.classList.toggle('d-none', description === '');
        }
    });
});
</script>
@endpush