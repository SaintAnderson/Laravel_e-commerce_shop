@if ($paginator->hasPages())

<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
    <div class="Pagination">
        <div class="Pagination-ins">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="Pagination-element Pagination-element_prev" style="pointer-events: none;">
                    <img src="/assets/img/icons/prevPagination.svg" alt="prevPagination.svg" />
                </span>
            @else
                <a class="Pagination-element Pagination-element_prev" href="{{ $paginator->previousPageUrl() }}"> 
                    <img src="/assets/img/icons/prevPagination.svg" alt="prevPagination.svg" />
                </a>
            @endif
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <a class="Pagination-element Pagination-element_current" href="javascript:void(0)">
                                <span class="Pagination-text">{{ $page }}</span>
                            </a>
                        @else
                            <a class="Pagination-element" href="{{ $url }}">
                                <span class="Pagination-text">{{ $page }}</span>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{-- Next Page Link --}}
            @if($paginator->hasMorePages())
                <a class="Pagination-element Pagination-element_prev" href="{{ $paginator->nextPageUrl() }}"><img src="/assets/img/icons/nextPagination.svg" alt="nextPagination.svg" />
                </a>
            @else
                <span class="Pagination-element Pagination-element_prev" style="pointer-events: none;"><img src="/assets/img/icons/nextPagination.svg" alt="nextPagination.svg" />
                </span>
            @endif
        </div>
    </div>
</nav>

@endif