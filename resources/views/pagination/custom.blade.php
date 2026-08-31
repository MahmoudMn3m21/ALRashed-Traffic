@if ($paginator->hasPages())
    <nav class="pagination-nav" role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <p class="pagination-summary mb-0">
            <span class="pagination-count">
                @if ($paginator->firstItem())
                    {{ $paginator->firstItem() }}–{{ $paginator->lastItem() }}
                @else
                    {{ $paginator->count() }}
                @endif
            </span>
            <span class="pagination-total">{{ __('pagination.of') }} {{ $paginator->total() }}</span>
        </p>

        <div class="pagination-controls" role="list">
            @if ($paginator->onFirstPage())
                <span class="pagination-btn pagination-btn-nav pagination-btn-disabled" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                    <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}"></i>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn pagination-btn-nav" rel="prev" aria-label="{{ __('pagination.previous') }}">
                    <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}"></i>
                </a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pagination-ellipsis" aria-hidden="true">…</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pagination-btn pagination-btn-active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pagination-btn pagination-btn-number">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn pagination-btn-nav" rel="next" aria-label="{{ __('pagination.next') }}">
                    <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
                </a>
            @else
                <span class="pagination-btn pagination-btn-nav pagination-btn-disabled" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                    <i class="fas fa-chevron-{{ app()->getLocale() === 'ar' ? 'left' : 'right' }}"></i>
                </span>
            @endif
        </div>
    </nav>
@endif
