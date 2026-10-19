@php
    $navItemBase = 'group my-0.5 flex min-h-[42px] items-center gap-3 rounded-xl px-3 text-[12.5px] font-medium transition-all duration-200';
    $navItemIdle = 'text-ink-soft hover:bg-primary-soft hover:text-primary-strong aria-expanded:text-primary-strong';
    $navItemActive = 'bg-primary font-semibold text-white shadow-primary';
    // A module whose submenu holds the current page.
    $navItemOpen = 'bg-primary-soft font-semibold text-primary-strong';

    $navIcon = 'size-[18px] shrink-0 stroke-[1.8] transition-colors';

    $subItemBase = "relative my-px ml-[34px] flex min-h-[34px] items-center rounded-lg px-3 text-xs transition-colors before:absolute before:top-1/2 before:-left-[14px] before:size-[7px] before:-translate-y-1/2 before:rounded-full before:border-[1.5px] before:bg-white before:transition-all before:content-['']";
    $subItemIdle = 'text-muted before:border-subtle hover:bg-primary-50 hover:text-primary-strong hover:before:border-primary';
    $subItemActive = 'bg-primary-soft font-semibold text-primary-strong before:border-primary before:bg-primary before:shadow-[0_0_0_3px_var(--color-primary-light)]';
@endphp

<aside id="sidebar" class="fixed inset-y-0 left-0 z-20 flex w-[258px] -translate-x-full flex-col overflow-y-auto scrollbar-thin border-r border-line bg-white px-[15px] pt-[22px] pb-3.5 text-ink transition-transform duration-250 lg:translate-x-0 [&.open]:translate-x-0 [&.open]:shadow-float">
    <div class="flex items-center gap-[11px] px-2 pb-3">
        <div class="grid size-[39px] place-items-center rounded-xl bg-primary text-white shadow-primary">
            <i data-lucide="layers-3" class="size-[21px]"></i>
        </div>
        <div class="flex flex-col gap-1">
            <strong class="font-display text-2xl leading-none font-extrabold tracking-[-1.3px] text-ink">Shon<span class="text-primary">.</span></strong>
            <small class="text-4xs font-bold tracking-[1.6px] text-faint">BUSINESS SUITE</small>
        </div>
        <x-icon-button icon="x" id="closeSidebar" class="ml-auto lg:hidden" aria-label="Close sidebar" />
    </div>

<nav class="flex-1" aria-label="Main navigation">
        @foreach ($navigation as $section)
            <p class="mt-[22px] mb-2 px-3 text-3xs font-bold tracking-[1.4px] text-faint uppercase">{{ $section['label'] }}</p>

            @foreach ($section['items'] as $item)
                @if (! empty($item['children']))
                    @php
                        $childRoutes = array_filter(array_column($item['children'], 'route'));
                        $isOpen = $childRoutes && request()->routeIs(...$childRoutes);
                    @endphp

                    <a href="#"
                       @class([$navItemBase, 'has-submenu', $navItemOpen => $isOpen, $navItemIdle => ! $isOpen, 'expanded' => $isOpen])
                       data-menu="{{ $item['key'] }}"
                       aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
                       aria-controls="submenu-{{ $item['key'] }}">
                        <i data-lucide="{{ $item['icon'] }}" @class([$navIcon, 'text-primary' => $isOpen, 'text-muted group-hover:text-primary group-aria-expanded:text-primary' => ! $isOpen])></i>
                        <span>{{ $item['title'] }}</span>
                        <i data-lucide="chevron-right" class="ml-auto size-3.5 text-faint transition-transform duration-200 group-aria-expanded:rotate-90 group-aria-expanded:text-primary"></i>
                    </a>

                    <div id="submenu-{{ $item['key'] }}"
                         @class(['nav-submenu relative mb-[7px] hidden pt-[3px] pb-[5px] before:absolute before:top-0 before:bottom-2 before:left-[23px] before:w-px before:bg-line [&.open]:block', 'open' => $isOpen])
                         aria-label="{{ $item['title'] }} submenu">
                        @foreach ($item['children'] as $child)
                            @isset($child['route'])
                                @php($childActive = request()->routeIs($child['route']))
                                <a href="{{ route($child['route']) }}" @class([$subItemBase, $subItemActive => $childActive, $subItemIdle => ! $childActive])>{{ $child['title'] }}</a>
                            @else
                                <a href="#" class="{{ $subItemBase }} {{ $subItemIdle }}" data-placeholder="{{ $child['title'] }}">{{ $child['title'] }}</a>
                            @endisset
                        @endforeach
                    </div>
                @else
                    @php($isActive = isset($item['route']) && request()->routeIs($item['active'] ?? $item['route']))

                    <a href="{{ isset($item['route']) ? route($item['route']) : '#' }}"
                       @class([$navItemBase, $navItemActive => $isActive, $navItemIdle => ! $isActive])
                       @unless (isset($item['route'])) data-placeholder="{{ $item['title'] }}" @endunless>
                        <i data-lucide="{{ $item['icon'] }}" @class([$navIcon, 'text-white' => $isActive, 'text-muted group-hover:text-primary' => ! $isActive])></i>
                        <span>{{ $item['title'] }}</span>
                        @isset($item['badge'])
                            <span @class(['ml-auto rounded-md px-1.5 py-[3px] text-3xs font-semibold', 'bg-white/20 text-white' => $isActive, 'bg-primary-soft text-primary-strong' => ! $isActive])>{{ $item['badge'] }}</span>
                        @endisset
                    </a>
                @endif
            @endforeach
        @endforeach
    </nav>

    <div class="mt-6">
        <div class="flex items-center gap-2.5 rounded-xl border border-line bg-canvas p-2.5">
            <x-avatar :initials="$currentUser['initials']" :src="$currentUser['avatar']" />
            <div class="flex min-w-0 flex-1 flex-col gap-1">
                <strong class="truncate text-[11px] font-semibold text-ink">{{ $currentUser['name'] }}</strong>
                <small class="text-2xs text-muted">{{ $currentUser['role'] }}</small>
            </div>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="grid size-8 place-items-center rounded-lg text-muted transition hover:bg-danger-soft hover:text-danger" aria-label="Sign out" title="Sign out">
                        <i data-lucide="log-out" class="size-[17px]"></i>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</aside>
