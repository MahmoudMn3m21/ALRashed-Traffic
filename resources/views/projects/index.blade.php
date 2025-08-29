@extends('layouts.app')

@section('title', __('navbar.projects'))

@section('content')
<!-- Projects Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ __('navbar.projects') }}</h1>
                <p class="lead mb-4">{{ __('projects.hero_subtitle') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 fw-bold">{{ __('projects.page_title') }}</h2>
                <p class="lead text-muted">{{ __('projects.page_subtitle') }}</p>
            </div>
        </div>
        
        @if($projects->count() > 0)
            <div class="row g-4">
                @foreach($projects as $project)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="{{ $project->getTitle() }}" style="height: 250px; object-fit: cover;">
                        @else
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="fas fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->getTitle() }}</h5>
                            <p class="card-text text-muted">{{ $project->getAlternateTitle() }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h4>{{ __('projects.no_projects_title') }}</h4>
                        <p>{{ __('projects.no_projects_message') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection