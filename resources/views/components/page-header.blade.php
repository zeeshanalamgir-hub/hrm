@props([
    'title',
    'subtitle' => null,
    'eyebrow' => null,
    'sparkle' => false,
])

<div class="mb-[22px] flex flex-col items-start justify-between gap-5 md:mb-[27px] md:flex-row md:items-end">
    <div>
        @if ($eyebrow)
            <p class="mb-3 flex items-center gap-[7px] text-3xs font-bold tracking-[1.35px] text-primary-strong uppercase">
                <span class="size-1.5 rounded-full bg-primary shadow-[0_0_0_3px_var(--color-primary-light)]"></span>
                {{ $eyebrow }}
            </p>
        @endif
        <h1 class="font-display text-[23px] font-bold tracking-[-1.1px] text-ink xs:text-[clamp(23px,2.1vw,30px)]">
            {{ $title }}
            @if ($sparkle)
                <span class="text-[22px] text-primary">✦</span>
            @endif
        </h1>
        @if ($subtitle)
            <p class="mt-[9px] text-[11px] leading-normal text-muted xs:text-xs">{{ $subtitle }}</p>
        @endif
    </div>

    @isset($actions)
        <div class="flex w-full flex-wrap items-center gap-2.5 md:w-auto md:flex-nowrap *:max-md:flex-1">
            {{ $actions }}
        </div>
    @endisset
</div>
