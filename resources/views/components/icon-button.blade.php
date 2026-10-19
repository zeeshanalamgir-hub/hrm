@props(['icon'])

<button {{ $attributes->merge(['type' => 'button'])->class('grid size-[37px] shrink-0 place-items-center rounded-[11px] border border-line bg-white text-muted transition hover:border-primary-muted hover:bg-primary-50 hover:text-primary') }}>
    <i data-lucide="{{ $icon }}" class="size-[18px]"></i>
    {{ $slot }}
</button>
