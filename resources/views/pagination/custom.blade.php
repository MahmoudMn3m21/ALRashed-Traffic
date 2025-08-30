@if ($paginator->hasPages())
    <nav class="pagination-nav" role="navigation" aria-label="{{ __('Pagination Navigation') }}">
        <div class="pagination-info">
            <div class="pagination-summary">
                <span class="pagination-count">
                    @if ($paginator->firstItem())
                        {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}
                    @else
                        {{ $paginator->count() }}
                    @endif
                </span>
                <span class="pagination-total">of {{ $paginator->total() }} items</span>
            </div>
        </div>

        <div class="pagination-controls">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="pagination-btn pagination-btn-disabled" aria-disabled="true">
                    <i class="fas fa-chevron-left"></i>
                    <span class="pagination-label">Previous</span>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn pagination-btn-nav" rel="prev">
                    <i class="fas fa-chevron-left"></i>
                    <span class="pagination-label">Previous</span>
                </a>
            @endif

            {{-- Page Numbers --}}
            <div class="pagination-numbers">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="pagination-ellipsis">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
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
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn pagination-btn-nav" rel="next">
                    <span class="pagination-label">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </a>
            @else
                <span class="pagination-btn pagination-btn-disabled" aria-disabled="true">
                    <span class="pagination-label">Next</span>
                    <i class="fas fa-chevron-right"></i>
                </span>
            @endif
        </div>
    </nav>
@endif