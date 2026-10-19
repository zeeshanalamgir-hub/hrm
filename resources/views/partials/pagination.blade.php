{{-- Pagination links styled to match the ERP tables. Use with $paginator->links('partials.pagination'). --}}
@if ($paginator->hasPages())
    @php
        $base = 'grid h-7 min-w-7 place-items-center rounded-[7px] px-1.5 text-2xs';
        $arrow = $base.' border border-line bg-white text-muted transition';
    @endphp

    <nav class="flex items-center gap-[5px] self-end xs:self-auto" aria-label="Pagination">
        @if ($paginator->onFirstPage())
            <span class="{{ $arrow }} opacity-40" aria-disabled="true"><i data-lucide="chevron-left" class="size-3.5"></i></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="{{ $arrow }} hover:border-primary-muted hover:text-primary" aria-label="Previous page"><i data-lucide="chevron-left" class="size-3.5"></i></a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-0.5 text-muted">…</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="{{ $base }} bg-primary font-semibold text-white shadow-primary" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="{{ $base }} text-muted transition hover:bg-primary-soft hover:text-primary-strong">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="{{ $arrow }} hover:border-primary-muted hover:text-primary" aria-label="Next page"><i data-lucide="chevron-right" class="size-3.5"></i></a>
        @else
            <span class="{{ $arrow }} opacity-40" aria-disabled="true"><i data-lucide="chevron-right" class="size-3.5"></i></span>
        @endif
    </nav>
@endif
