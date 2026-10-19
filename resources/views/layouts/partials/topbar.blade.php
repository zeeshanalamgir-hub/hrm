<header class="sticky top-0 z-10 flex h-[68px] items-center justify-between gap-[7px] border-b border-line bg-white/90 px-4 backdrop-blur-md xs:gap-5 md:px-[22px] lg:h-[75px] lg:px-6 xl:px-[35px]">
    <div class="flex items-center gap-3">
        <x-icon-button icon="menu" id="menuButton" class="lg:hidden" aria-label="Open sidebar" />
        <div class="flex items-center gap-[5px] text-[11px] text-muted xs:gap-2.5 xs:text-xs">
            <span>Workspace</span>
            <i data-lucide="chevron-right" class="size-3.5 text-subtle"></i>
            <strong class="font-semibold text-ink">@yield('breadcrumb', 'Dashboard')</strong>
        </div>
    </div>

    <div class="flex items-center gap-[7px] xs:gap-2 md:gap-2.5 xl:gap-4">

        @php
            $dropdownPanel = 'invisible absolute top-[calc(100%+10px)] right-0 z-30 origin-top-right translate-y-1 scale-95 rounded-xl border border-line bg-white opacity-0 shadow-float transition duration-150 [&.open]:visible [&.open]:translate-y-0 [&.open]:scale-100 [&.open]:opacity-100';
            $menuItem = 'flex w-full items-center gap-2.5 rounded-lg px-2.5 py-2 text-left text-[11px] font-medium transition-colors';
            $unreadCount = collect($notifications)->where('unread', true)->count();
        @endphp

        {{-- Notifications --}}
        <div class="relative" data-dropdown>
            <x-icon-button icon="bell" id="notificationButton" class="relative max-xs:size-[34px]"
                           aria-label="Notifications" aria-haspopup="true" aria-expanded="false" aria-controls="notificationDropdown" data-dropdown-toggle>
                @if ($unreadCount)
                    <span id="notificationDot" class="absolute top-[7px] right-[7px] size-[7px] rounded-full border-[1.5px] border-white bg-danger"></span>
                @endif
            </x-icon-button>

            <div id="notificationDropdown" data-dropdown-panel class="{{ $dropdownPanel }} w-[min(340px,calc(100vw-32px))] max-xs:-right-14">
                <div class="flex items-center justify-between border-b border-line-soft px-4 py-3">
                    <div class="flex items-center gap-2">
                        <h3 class="font-display text-[13px] font-bold text-ink">Notifications</h3>
                        @if ($unreadCount)
                            <span id="notificationCount" class="rounded-full bg-primary-soft px-1.5 py-0.5 text-3xs font-bold text-primary-strong">{{ $unreadCount }} new</span>
                        @endif
                    </div>
                    @if ($unreadCount)
                        <button type="button" id="markAllRead" class="text-2xs font-semibold text-primary-strong hover:underline">Mark all as read</button>
                    @endif
                </div>

                <ul class="max-h-[360px] overflow-y-auto p-1.5">
                    @forelse ($notifications as $notification)
                        <li>
                            <a href="#" role="menuitem" data-placeholder="{{ $notification['title'] }}"
                               @class(['notification-item group/item relative flex gap-3 rounded-lg px-2.5 py-2.5 transition-colors hover:bg-primary-50', 'unread' => $notification['unread']])>
                                <span class="grid size-8 shrink-0 place-items-center rounded-[10px] {{ $notification['tone'] }}">
                                    <i data-lucide="{{ $notification['icon'] }}" class="size-[15px]"></i>
                                </span>
                                <span class="min-w-0 flex-1">
                                    <span class="block text-[11px] font-semibold text-ink">{{ $notification['title'] }}</span>
                                    <span class="mt-0.5 block text-2xs leading-normal text-muted">{{ $notification['text'] }}</span>
                                    <span class="mt-1 block text-3xs text-faint">{{ $notification['time'] }}</span>
                                </span>
                                <span class="mt-1.5 hidden size-2 shrink-0 rounded-full bg-primary group-[.unread]/item:block" aria-label="Unread"></span>
                            </a>
                        </li>
                    @empty
                        <li class="px-4 py-8 text-center text-[11px] text-muted">You're all caught up.</li>
                    @endforelse
                </ul>

                <div class="border-t border-line-soft p-1.5">
                    <a href="#" role="menuitem" data-placeholder="All notifications" class="flex items-center justify-center gap-1.5 rounded-lg py-2 text-2xs font-semibold text-primary-strong hover:bg-primary-soft">
                        View all notifications <i data-lucide="arrow-up-right" class="size-[13px]"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="hidden h-7 w-px bg-line md:block"></div>

        {{-- Profile --}}
        <div class="relative" data-dropdown>
            <button type="button" id="topProfileButton" class="group flex items-center gap-[9px] rounded-xl py-1 pr-1.5 pl-1 text-[11px] font-semibold text-ink transition hover:bg-primary-50"
                    aria-haspopup="menu" aria-expanded="false" aria-controls="profileDropdown" data-dropdown-toggle>
                <x-avatar :initials="$currentUser['initials']" :src="$currentUser['avatar']" size="sm" />
                <span class="hidden md:inline">{{ $currentUser['firstName'] }}</span>
                <i data-lucide="chevron-down" class="hidden size-3.5 text-faint transition-transform group-aria-expanded:rotate-180 md:block"></i>
            </button>

            <div id="profileDropdown" role="menu" data-dropdown-panel class="{{ $dropdownPanel }} w-[220px] p-1.5">
                <div class="flex items-center gap-2.5 border-b border-line-soft px-2.5 pt-1.5 pb-3">
                    <x-avatar :initials="$currentUser['initials']" :src="$currentUser['avatar']" size="sm" />
                    <div class="min-w-0">
                        <p class="truncate text-[11px] font-semibold text-ink">{{ $currentUser['name'] }}</p>
                        @if ($currentUser['email'])
                            <p class="mt-0.5 truncate text-2xs text-faint">{{ $currentUser['email'] }}</p>
                        @endif
                    </div>
                </div>

                <div class="pt-1.5">
                    <a href="{{ route('settings.edit') }}" role="menuitem" class="{{ $menuItem }} text-ink-soft hover:bg-primary-soft hover:text-primary-strong">
                        <i data-lucide="settings-2" class="size-4"></i> Settings
                    </a>

                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" role="menuitem" class="{{ $menuItem }} text-danger hover:bg-danger-soft">
                                <i data-lucide="log-out" class="size-4"></i> Log out
                            </button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</header>
