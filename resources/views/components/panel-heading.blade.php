@props([
    'title',
    'subtitle' => null,
])

<div {{ $attributes->class('mb-[21px] flex items-center justify-between gap-[15px]') }}>
    <div>
        <h2 class="mb-1.5 font-display text-sm font-bold text-ink tracking-[-0.3px] xs:text-[15px]">{{ $title }}</h2>
        @if ($subtitle)
            <p class="text-2xs text-muted">{{ $subtitle }}</p>
        @endif
    </div>

    {{ $slot }}
</div>
