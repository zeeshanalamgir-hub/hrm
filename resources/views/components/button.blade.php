@props([
    'variant' => 'primary',
    'size' => 'md',
    'href' => null,
])

@php
    $sizes = [
        // Compact buttons inside the app.
        'md' => 'h-[39px] gap-2 rounded-[10px] px-[13px] text-[11px] font-semibold [&>svg]:size-[15px]',
        // Marketing-site buttons.
        'sm' => 'min-h-[38px] gap-2.5 rounded-[10px] px-3 text-[11px] font-bold xs:min-h-[42px] xs:px-4 xs:text-[13px] [&>svg]:size-4',
        'lg' => 'min-h-[49px] gap-2.5 rounded-xl px-5 text-[13px] font-bold [&>svg]:size-4',
    ];

    // Hierarchy: primary for the main action, secondary (light green) for supporting
    // actions, neutral for dismissive ones (Cancel, Back), danger for destructive ones.
    $variants = [
        'primary' => 'border border-primary bg-primary text-white shadow-primary hover:border-primary-dark hover:bg-primary-dark active:translate-y-px',
        'secondary' => 'border border-primary-soft bg-primary-soft text-primary-strong hover:border-primary-light hover:bg-primary-light active:translate-y-px',
        'neutral' => 'border border-line bg-white text-ink-soft shadow-[0_1px_2px_rgb(48_59_53/0.04)] hover:border-primary-muted hover:bg-primary-50 hover:text-primary-strong active:translate-y-px',
        'danger' => 'border border-danger bg-danger text-white shadow-[0_6px_16px_-6px_rgb(201_84_84/0.55)] hover:border-danger-dark hover:bg-danger-dark active:translate-y-px',
        'light' => 'border border-white bg-white text-primary-strong hover:bg-primary-soft active:translate-y-px',
    ];

    $classes = 'inline-flex items-center justify-center whitespace-nowrap transition duration-150 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary disabled:pointer-events-none disabled:opacity-50 '.$sizes[$size].' '.$variants[$variant];
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->class($classes) }}>{{ $slot }}</a>
@else
    <button {{ $attributes->merge(['type' => 'button'])->class($classes) }}>{{ $slot }}</button>
@endif
