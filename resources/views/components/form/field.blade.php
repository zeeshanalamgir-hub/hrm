{{-- Label + control + validation message. Used by the input, select and textarea components. --}}
@props([
    'name',
    'label',
    'required' => false,
    'hint' => null,
])

<div {{ $attributes->class('min-w-0') }}>
    <label for="{{ $name }}" class="mb-2 block text-[11px] font-semibold text-ink">
        {{ $label }}
        @if ($required)
            <span class="text-danger">*</span>
        @elseif ($hint)
            <span class="font-normal text-faint">({{ $hint }})</span>
        @endif
    </label>

    {{ $slot }}

    @error($name)
        <p class="mt-1.5 flex items-center gap-1 text-2xs text-danger">{{ $message }}</p>
    @enderror
</div>
