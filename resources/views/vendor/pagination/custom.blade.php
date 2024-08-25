<div class="col-md-12 text-center mt30">
    {{-- Previous Page Link --}}
    @if (!$paginator->onFirstPage())
        <a class="next page-numbers" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <span class="page-numbers">{{ $element }}</span>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span aria-current="page" class="numbers active">{{ $page }}</span>
                @else
                    <a class="numbers" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if (!$paginator->onLastPage() && $paginator->hasMorePages())
        <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next">Next &raquo;</a>
    @endif
</div>
