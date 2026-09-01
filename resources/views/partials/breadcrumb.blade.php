@if (!empty($items) && count($items) > 0)
<nav class="page-breadcrumb" aria-label="{{ __('products.breadcrumb') }}">
    <ol class="breadcrumb mb-0">
        @foreach ($items as $item)
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['label'] }}</li>
            @else
                <li class="breadcrumb-item">
                    <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endif
