@extends('layouts.app')

@section('title', $product->name)

@section('content')
<!-- Product Hero Section -->
<section class="text-white py-5" style="background-color: #fbb116;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold mb-4">{{ $product->getName() }}</h1>
                @if($product->description)
                <p class="lead mb-4">{{ $product->description }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Product Details Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-4">
                @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded shadow" alt="{{ $product->getName() }}">
                @else
                <div class="bg-light d-flex align-items-center justify-content-center rounded shadow" style="height: 400px;">
                    <i class="fas fa-image fa-5x text-muted"></i>
                </div>
                @endif
            </div>

            <!-- Product Information -->
            <div class="col-lg-6">
                <h2 class="mb-4">{{ $product->getName() }}</h2>
                <p class="text-muted mb-4"><strong>{{ $product->getAlternateName() }}</strong></p>

                @if($product->description)
                <div class="mb-4">
                    <h5>Description</h5>
                    <p class="text-muted">{{ $product->description }}</p>
                </div>
                @endif

                <div class="row">
                    @if($product->code)
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold">Product Code</h6>
                        <p class="text-muted mb-0">{{ $product->code }}</p>
                    </div>
                    @endif

                    @if($product->material)
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold">Material</h6>
                        <p class="text-muted mb-0">{{ $product->material }}</p>
                    </div>
                    @endif

                    @if($product->color)
                    <div class="col-md-6 mb-3">
                        <h6 class="fw-bold">Color</h6>
                        <p class="text-muted mb-0">{{ $product->color }}</p>
                    </div>
                    @endif
                </div>

                @if($product->features)
                <div class="mb-4">
                    <h5>Features</h5>
                    <div class="text-muted">
                        {!! nl2br(e($product->features)) !!}
                    </div>
                </div>
                @endif

                @if($product->usages)
                <div class="mb-4">
                    <h5>Usages</h5>
                    <div class="text-muted">
                        {!! nl2br(e($product->usages)) !!}
                    </div>
                </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-warning">
                        <i class="fas fa-arrow-left me-2"></i>Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection