@props([
    'initials',
    'src' => null,
    'size' => 'md',
])

@php
    $sizes = [
        'md' => 'size-[34px] rounded-[10px] text-[11px]',
        'sm' => 'size-[31px] rounded-[9px] text-2xs',
        'lg' => 'size-20 rounded-2xl text-xl',
    ];
@endphp

@if ($src)
    <img src="{{ $src }}" alt="" {{ $attributes->class(['shrink-0 object-cover', $sizes[$size]]) }}>
@else
    <span {{ $attributes->class(['grid shrink-0 place-items-center bg-primary-soft font-bold text-primary-strong ring-1 ring-primary-light ring-inset', $sizes[$size]]) }}>{{ $initials }}</span>
@endif
