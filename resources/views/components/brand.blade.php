@props([
    'size' => 'md',
    'inverted' => false,
])

<a {{ $attributes->merge(['href' => route('home')])->class('inline-flex shrink-0 items-center gap-[11px]') }} aria-label="Shon home">
    <span @class([
        'grid place-items-center',
        'bg-primary text-white shadow-primary' => ! $inverted,
        'bg-white text-primary shadow-[0_6px_16px_-6px_rgb(48_59_53/0.35)]' => $inverted,
        'size-9 rounded-[13px] xs:size-10' => $size === 'md',
        'size-8 rounded-[10px]' => $size === 'sm',
    ])>
        <i data-lucide="layers-3" class="size-[21px] stroke-[2.4]"></i>
    </span>
    <span @class([
        'font-display leading-none font-extrabold tracking-[-1.2px]',
        'text-[21px] xs:text-[23px]' => $size === 'md',
        'text-[19px]' => $size === 'sm',
        'text-white' => $inverted,
    ])>
        Shon<span @class(['text-primary' => ! $inverted, 'text-primary-light' => $inverted])>.</span>
        <small @class([
            'mt-[5px] block font-sans font-bold tracking-[2px]',
            'text-4xs' => $size === 'md',
            'text-[6px]' => $size === 'sm',
            'text-white/70' => $inverted,
            'text-faint' => ! $inverted,
        ])>BUSINESS SUITE</small>
    </span>
</a>
