{{-- Illustrative HR dashboard mock-up shown in the landing page hero. --}}
@php
    $previewCard = 'rounded-[9px] border border-line bg-white';
    $floatingCard = 'absolute z-2 flex items-center gap-1.5 rounded-[9px] border border-line bg-white p-2 shadow-float xs:gap-[9px] xs:rounded-xl xs:px-[13px] xs:py-[11px]';
    $floatIcon = 'grid size-[26px] place-items-center rounded-[9px] xs:size-[31px]';
@endphp

<div class="relative mx-auto w-full max-w-[650px] min-w-0 px-0 pt-2.5 pb-[22px] xs:px-3 md:max-w-none md:pt-[18px] md:pr-0 md:pb-[26px] md:pl-2.5" aria-label="HR dashboard preview">
    <div class="absolute inset-[4%_-4%_0_2%] rounded-[45%] bg-radial from-primary-light via-primary-50 via-42% to-white to-72% blur-[5px]"></div>

    <div class="relative z-1 overflow-hidden rounded-[18px] border border-line bg-white shadow-[0_28px_70px_rgb(48_59_53/0.1)] md:[transform:perspective(1400px)_rotateY(-4deg)_rotateX(1deg)]">
        <div class="flex h-[42px] items-center gap-[13px] border-b border-line px-[15px] text-3xs text-muted">
            <div class="flex gap-1">
                @foreach (['bg-subtle', 'bg-primary-light', 'bg-primary-muted'] as $dot)
                    <i class="size-1.5 rounded-full {{ $dot }}"></i>
                @endforeach
            </div>
            <span>People overview</span>
            <span class="ml-auto flex items-center gap-1.5 text-4xs text-primary-strong"><i class="size-[5px] rounded-full bg-primary shadow-[0_0_0_4px_var(--color-primary-light)]"></i> Live overview</span>
        </div>

        <div class="flex min-h-[355px]">
            <aside class="flex w-[35px] flex-col items-center gap-2.5 border-r border-line-soft bg-white py-[15px] xs:w-[49px] xs:gap-[13px]">
                <div class="mb-2 grid size-[25px] place-items-center rounded-lg bg-primary text-white"><i data-lucide="layers-3" class="size-3.5"></i></div>
                @foreach (['layout-dashboard', 'users', 'clock', 'calendar-days', 'wallet'] as $icon)
                    <span @class(['grid size-[25px] place-items-center rounded-lg xs:size-[29px]', 'bg-primary text-white shadow-primary' => $loop->first, 'text-faint' => ! $loop->first])>
                        <i data-lucide="{{ $icon }}" class="size-3.5"></i>
                    </span>
                @endforeach
            </aside>

            <div class="min-w-0 flex-1 bg-canvas px-[11px] pt-[15px] pb-3 xs:px-[19px] xs:pt-[21px] xs:pb-4">
                <div class="flex items-center justify-between">
                    <div>
                        <small class="text-[7px] tracking-[0.8px] text-faint uppercase">{{ now()->format('l, F j') }}</small>
                        <h3 class="mt-[7px] mb-[3px] font-display text-[15px] font-extrabold tracking-[-0.7px] text-ink xs:text-[19px]">Good morning 👋</h3>
                        <p class="text-3xs text-muted">Here’s your team at a glance.</p>
                    </div>
                    <span class="grid size-[29px] place-items-center rounded-[10px] bg-primary-light text-3xs font-extrabold text-primary-strong">ZA</span>
                </div>

                <div class="mt-3.5 grid grid-cols-3 gap-[5px] xs:mt-[19px] xs:gap-[9px]">
                    @foreach ([
                        ['users', 'Employees', '248', '↗ 6 new this month', true],
                        ['user-check', 'Present today', '231', 'Across 9 departments', false],
                        ['calendar-days', 'On leave', '12', '4 awaiting approval', false],
                    ] as [$icon, $label, $value, $note, $positive])
                        <div class="{{ $previewCard }} px-1.5 py-2 xs:px-[9px] xs:py-[11px]">
                            <span class="flex items-center gap-[5px] text-[7px] text-muted xs:text-4xs"><i data-lucide="{{ $icon }}" class="size-[11px] text-primary"></i> {{ $label }}</span>
                            <strong class="mt-2.5 mb-[5px] block font-display text-[13px] font-extrabold tracking-[-0.6px] text-ink xs:text-[17px]">{{ $value }}</strong>
                            <small @class(['text-[6px] xs:text-[7px]', 'text-primary' => $positive, 'text-muted' => ! $positive])>{{ $note }}</small>
                        </div>
                    @endforeach
                </div>

                <div class="mt-2.5 rounded-[10px] border border-line bg-white p-[9px] xs:p-3">
                    <div class="flex items-center justify-between">
                        <div>
                            <strong class="block text-3xs text-ink">Attendance trend</strong>
                            <small class="mt-[3px] block text-[7px] text-faint">Employees checked in per day</small>
                        </div>
                        <span class="rounded-[5px] border border-line p-[5px] text-[7px] text-muted">Last 7 days⌄</span>
                    </div>
                    <div class="relative mt-2.5 pl-[30px]">
                        <div class="absolute top-0 bottom-5 left-0 flex flex-col justify-between text-[6px] text-faint">
                            @foreach (['250', '200', '150', '100'] as $label)
                                <span>{{ $label }}</span>
                            @endforeach
                        </div>
                        <svg viewBox="0 0 500 150" role="img" aria-label="Illustrative attendance chart"
                             class="h-[83px] w-full overflow-visible bg-[repeating-linear-gradient(to_bottom,transparent_0,transparent_20px,var(--color-line-soft)_21px)]">
                            <defs>
                                <linearGradient id="previewAreaFill" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" class="[stop-color:var(--color-primary)]" stop-opacity=".22" />
                                    <stop offset="100%" class="[stop-color:var(--color-primary)]" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                            <path d="M0 119 C25 110 35 86 65 98 S105 80 130 87 S175 48 205 66 S250 75 280 44 S325 58 350 37 S400 51 425 21 S470 37 500 9 L500 150 L0 150 Z" fill="url(#previewAreaFill)" />
                            <path d="M0 119 C25 110 35 86 65 98 S105 80 130 87 S175 48 205 66 S250 75 280 44 S325 58 350 37 S400 51 425 21 S470 37 500 9" fill="none" class="stroke-primary" stroke-width="3" stroke-linecap="round" />
                        </svg>
                        <div class="mt-0.5 flex justify-between text-[6px] text-faint">
                            @foreach (['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'] as $day)
                                <span>{{ $day }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="mt-2.5 grid grid-cols-[1fr_61px] gap-3 xs:grid-cols-[1fr_75px]">
                    <div class="{{ $previewCard }} p-2 xs:p-2.5">
                        <strong class="mb-[7px] block text-4xs">Recent activity</strong>
                        @foreach ([['bg-primary', 'Leave approved', 'Sam K.', 'Just now'], ['bg-info', 'New hire', 'Zara A.', '18 min ago']] as [$dot, $label, $ref, $time])
                            <span class="mt-1.5 flex items-center gap-[3px] text-[6px] text-muted xs:gap-[5px] xs:text-[7px]">
                                <i class="size-1.5 rounded-full {{ $dot }}"></i> {{ $label }} <b class="font-bold text-ink">{{ $ref }}</b>
                                <small class="ml-auto text-faint">{{ $time }}</small>
                            </span>
                        @endforeach
                    </div>
                    <div class="{{ $previewCard }} grid place-items-center">
                        <div class="grid size-[46px] content-center justify-items-center rounded-full border-[5px] border-primary-light border-r-primary xs:size-[54px]">
                            <strong class="font-display text-xs font-extrabold">94%</strong>
                            <small class="mt-0.5 text-[6px] text-faint">On time</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="{{ $floatingCard }} top-[3%] -right-1 xs:top-[13%] lg:-right-4">
        <span class="{{ $floatIcon }} bg-primary-soft text-primary"><i data-lucide="user-plus" class="size-4"></i></span>
        <div>
            <strong class="block text-4xs text-ink xs:text-2xs">Onboarding done</strong>
            <small class="mt-1 block text-[7px] text-muted xs:text-4xs">New hire is ready day one</small>
        </div>
        <i data-lucide="circle-check" class="ml-1 size-3 text-primary xs:size-[15px]"></i>
    </div>

    <div class="{{ $floatingCard }} bottom-0 -left-1 xs:bottom-[8%] lg:-left-4">
        <span class="{{ $floatIcon }} bg-info-soft text-info"><i data-lucide="banknote" class="size-4"></i></span>
        <div>
            <strong class="block text-4xs text-ink xs:text-2xs">Payroll processed</strong>
            <small class="mt-1 block text-[7px] text-muted xs:text-4xs">248 payslips sent</small>
        </div>
    </div>
</div>
