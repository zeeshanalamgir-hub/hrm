@extends('layouts.guest')

@section('title', 'Shon HR — Manage your people with clarity')

@php
    $wrap = 'mx-auto w-[calc(100%-34px)] xs:w-[calc(100%-40px)] md:w-[min(1180px,calc(100%-64px))]';
    $eyebrow = 'text-3xs font-extrabold tracking-[1.6px] text-primary';
    $sectionTitle = 'font-display text-[31px] leading-[1.2] font-extrabold tracking-[-1.5px] text-ink xs:text-[clamp(30px,3.7vw,43px)] xs:tracking-[-2px]';
    $pill = 'inline-flex items-center gap-[9px] rounded-full border border-primary-light bg-primary-50 px-[13px] py-[9px] text-3xs font-extrabold tracking-[1.3px] text-primary-strong';
    $pulse = 'size-[7px] rounded-full bg-primary shadow-[0_0_0_4px_var(--color-primary-light)]';
    $featureCard = 'relative min-h-[280px] overflow-hidden rounded-[18px] border border-line bg-white p-[22px] xs:min-h-[300px] xs:p-[26px]';
    $featureTitle = 'my-[9px] font-display text-[21px] font-extrabold tracking-[-0.8px] text-ink';
    $featureText = 'max-w-[340px] text-[11px] leading-[1.8] text-muted';
    $featureNumber = 'text-4xs font-extrabold tracking-[1.1px] text-faint';
    $featureIcon = 'mb-[21px] grid size-[42px] place-items-center rounded-[13px]';
@endphp

@section('content')
    <header class="relative mx-auto flex h-[72px] w-[calc(100%-34px)] items-center justify-between gap-3 xs:w-[calc(100%-40px)] xs:gap-[30px] md:h-[82px] md:w-[min(1280px,calc(100%-64px))]">
        <x-brand />

        <nav id="siteNav" aria-label="Main navigation"
             class="absolute top-[65px] right-0 left-0 z-10 hidden flex-col rounded-[13px] border border-line bg-white p-[15px] shadow-float md:static md:ml-auto md:flex md:flex-row md:items-center md:gap-5 md:border-0 md:bg-transparent md:p-0 md:shadow-none lg:gap-[33px] [&.open]:flex">
            @foreach (['features' => 'Features', 'modules' => 'Modules', 'how-it-works' => 'How it works'] as $anchor => $label)
                <a href="#{{ $anchor }}" class="p-3 text-[13px] font-semibold text-ink-soft transition-colors hover:text-primary md:p-0">{{ $label }}</a>
            @endforeach
        </nav>

        <div class="flex items-center gap-3 xs:gap-[15px] lg:gap-[23px]">
            @auth
                <x-button size="sm" :href="route('dashboard')">Go to dashboard <i data-lucide="arrow-up-right"></i></x-button>
            @else
                <a href="{{ route('login') }}" class="hidden text-[13px] font-semibold text-ink-soft transition-colors hover:text-primary xs:inline">Log in</a>
                <x-button size="sm" :href="route('login')">Get started <i data-lucide="arrow-up-right"></i></x-button>
            @endauth
            <button type="button" id="mobileMenu" class="grid size-10 place-items-center rounded-[10px] bg-primary-soft text-primary-strong md:hidden" aria-label="Open navigation" aria-expanded="false" aria-controls="siteNav">
                <i data-lucide="menu" class="size-5"></i>
            </button>
        </div>
    </header>

    <main>
        {{-- Hero --}}
        <section class="{{ $wrap }} grid grid-cols-1 items-center gap-[35px] pt-[43px] pb-[45px] xs:pt-[55px] md:min-h-[600px] md:grid-cols-[.94fr_1.06fr] md:gap-6 md:pt-[74px] md:pb-[66px] lg:gap-[46px]">
            <div class="relative z-2 max-w-[650px] pb-2">
                <div class="{{ $pill }}"><span class="{{ $pulse }}"></span> ONE PLACE FOR YOUR PEOPLE.</div>
                <h1 class="mt-[21px] mb-5 font-display text-[43px] leading-[1.12] font-extrabold tracking-[-2.6px] text-ink xs:mt-[26px] xs:text-[clamp(43px,5.1vw,66px)] xs:tracking-[-3.6px] md:max-lg:text-[52px]">
                    Manage your people.<br><span class="text-primary">Not your paperwork.</span>
                </h1>
                <p class="max-w-[480px] text-[13px] leading-[1.8] text-muted xs:text-[15px] xs:leading-[1.9]">Bring employee records, attendance, leave, payroll, and hiring together in one clear workspace built for HR teams and the people they support.</p>
                <div class="mt-[30px] flex flex-col items-stretch gap-3 xs:flex-row xs:flex-wrap xs:items-center">
                    <x-button size="lg" :href="route('dashboard')">Explore your workspace <i data-lucide="arrow-right"></i></x-button>
                    <x-button size="lg" variant="neutral" href="#features"><i data-lucide="circle-play"></i> Discover the features</x-button>
                </div>
                <div class="mt-[26px] flex items-center gap-[13px] xs:mt-9">
                    <div class="flex pl-[3px]">
                        @foreach (['AM' => 'bg-primary-light text-primary-strong', 'SK' => 'bg-info-soft text-info', 'ZA' => 'bg-warning-soft text-warning'] as $initials => $tone)
                            <span class="-ml-1 grid size-[31px] place-items-center rounded-full border-2 border-white text-4xs font-extrabold {{ $tone }}">{{ $initials }}</span>
                        @endforeach
                    </div>
                    <div>
                        <strong class="block text-[11px]">Your whole team, in sync</strong>
                        <small class="mt-1 block text-2xs text-muted">From first day to every payday</small>
                    </div>
                </div>
            </div>

            @include('partials.landing.dashboard-preview')
        </section>

        {{-- Module strip --}}
        <section class="{{ $wrap }} flex flex-wrap items-center justify-center gap-[14px] border-y border-line py-[22px] xs:gap-[22px] xs:pt-[27px] xs:pb-[34px] md:justify-between">
            <span class="w-full text-center text-3xs font-extrabold tracking-[1.1px] text-faint md:w-auto md:text-left">BUILT AROUND THE EMPLOYEE LIFECYCLE</span>
            @foreach (['users' => 'Employees', 'clock' => 'Attendance', 'calendar-days' => 'Leave', 'wallet' => 'Payroll', 'briefcase' => 'Recruitment'] as $icon => $label)
                <div class="flex items-center gap-2 text-2xs font-bold text-ink-soft xs:text-[11px]"><i data-lucide="{{ $icon }}" class="size-4 text-primary"></i> {{ $label }}</div>
            @endforeach
        </section>

        {{-- Features --}}
        <section id="features" class="{{ $wrap }} py-[67px] md:py-20 lg:pt-[108px] lg:pb-[105px]">
            <div class="mx-auto mb-[43px] max-w-[680px] text-center">
                <div class="{{ $eyebrow }}">LESS ADMIN. MORE PEOPLE.</div>
                <h2 class="{{ $sectionTitle }} mt-[17px] mb-[13px]">Everything HR handles,<br><span class="text-primary">working as one.</span></h2>
                <p class="text-[11px] leading-[1.8] text-muted xs:text-[13px]">Spend less time chasing forms and spreadsheets, and more time supporting your team as it grows.</p>
            </div>

            <div class="grid grid-cols-1 gap-4 xs:grid-cols-2">
                <article class="{{ $featureCard }} bg-linear-140 from-primary-50 to-white to-68%">
                    <div class="{{ $featureIcon }} bg-primary-soft text-primary"><i data-lucide="contact-round" class="size-5"></i></div>
                    <span class="{{ $featureNumber }}">01 / EMPLOYEES</span>
                    <h3 class="{{ $featureTitle }}">Know your whole team.</h3>
                    <p class="{{ $featureText }}">Keep profiles, departments, job titles, contracts, and documents in one place.</p>
                    <a href="{{ route('dashboard') }}" class="mt-[18px] inline-flex items-center gap-[7px] text-2xs font-extrabold text-primary">Manage employees <i data-lucide="arrow-up-right" class="size-[13px]"></i></a>
                    <div class="absolute right-[17px] bottom-[18px] w-[48%] overflow-hidden rounded-[11px] border border-line bg-white/85 shadow-card xs:right-[23px] xs:w-[44%]">
                        @foreach ([['EMP-1008', 'Aisha Malik', 'Engineering'], ['EMP-1042', 'Sam Khan', 'Finance'], ['EMP-1107', 'Zara Ahmed', 'Design']] as [$code, $name, $department])
                            <div class="grid grid-cols-[1fr_auto] gap-x-2 gap-y-[3px] border-b border-line px-2.5 py-[9px] last:border-b-0">
                                <span class="text-[7px] text-faint">{{ $code }}</span>
                                <b class="col-start-1 text-4xs text-ink">{{ $name }}</b>
                                <strong class="col-start-2 row-span-2 row-start-1 self-center text-4xs text-primary">{{ $department }}</strong>
                            </div>
                        @endforeach
                    </div>
                </article>

                <article class="{{ $featureCard }}">
                    <div class="{{ $featureIcon }} bg-info-soft text-info"><i data-lucide="clock" class="size-5"></i></div>
                    <span class="{{ $featureNumber }}">02 / ATTENDANCE</span>
                    <h3 class="{{ $featureTitle }}">See who’s in today.</h3>
                    <p class="{{ $featureText }}">Track check-ins, shifts, overtime, and late arrivals without manual registers.</p>
                    <div class="mt-[29px] flex items-center gap-[9px] text-faint">
                        @foreach (['log-in', 'timer', 'log-out'] as $icon)
                            <span class="grid size-[61px] place-items-center rounded-[15px] border border-line bg-line-soft text-primary"><i data-lucide="{{ $icon }}" class="size-[23px]"></i></span>
                            @unless ($loop->last)
                                <i data-lucide="arrow-right" class="size-3.5"></i>
                            @endunless
                        @endforeach
                    </div>
                </article>

                <article class="{{ $featureCard }}">
                    <div class="{{ $featureIcon }} bg-primary-light text-primary-strong"><i data-lucide="calendar-check" class="size-5"></i></div>
                    <span class="{{ $featureNumber }}">03 / LEAVE</span>
                    <h3 class="{{ $featureTitle }}">Approve time off faster.</h3>
                    <p class="{{ $featureText }}">Handle requests, approvals, balances, and holidays in a single workflow.</p>
                    <div class="mt-[25px] grid gap-2.5">
                        @foreach ([
                            'Request submitted' => 'bg-primary shadow-[0_0_0_4px_var(--color-primary-soft)]',
                            'Manager approved' => 'bg-info shadow-[0_0_0_4px_var(--color-info-soft)]',
                            'Balance updated' => 'bg-faint shadow-[0_0_0_4px_var(--color-line-soft)]',
                        ] as $step => $dot)
                            <span class="flex items-center gap-2 text-2xs text-ink-soft"><i class="size-2 rounded-full {{ $dot }}"></i> {{ $step }}</span>
                        @endforeach
                    </div>
                </article>

                <article class="{{ $featureCard }}">
                    <div class="{{ $featureIcon }} bg-primary-soft text-primary"><i data-lucide="banknote" class="size-5"></i></div>
                    <span class="{{ $featureNumber }}">04 / PAYROLL</span>
                    <h3 class="{{ $featureTitle }}">Pay everyone on time.</h3>
                    <p class="{{ $featureText }}">Run payroll with allowances, deductions, and payslips built from attendance and leave.</p>
                    <div class="mt-6 flex h-[67px] items-end gap-2 px-[3px]">
                        @foreach ([35, 52, 43, 72, 58, 86, 66, 96, 78] as $height)
                            <i class="max-w-[25px] flex-1 rounded-t-[5px] rounded-b-[2px] bg-linear-to-b from-primary to-primary" style="height: {{ $height }}%"></i>
                        @endforeach
                    </div>
                </article>
            </div>
        </section>

        {{-- Modules --}}
        <section id="modules" class="relative overflow-hidden bg-primary-soft text-ink after:absolute after:-top-[190px] after:-right-[150px] after:size-[460px] after:rounded-full after:bg-radial after:from-primary-light after:to-transparent after:to-70%">
            <div class="{{ $wrap }} relative z-1 grid grid-cols-1 items-center gap-7 py-[60px] xs:gap-[35px] md:grid-cols-[1fr_.9fr] md:py-[82px] lg:gap-[100px]">
                <div>
                    <div class="{{ $eyebrow }}">ONE CONNECTED HR WORKSPACE</div>
                    <h2 class="{{ $sectionTitle }} mt-4 mb-[13px]">Every module supports<br>the people behind your business.</h2>
                    <p class="mb-[25px] max-w-[410px] text-[13px] leading-[1.8] text-muted">Start with your employee directory, then switch on attendance, leave, and payroll as your team grows.</p>
                    <x-button size="lg" :href="route('dashboard')">Enter your workspace <i data-lucide="arrow-right"></i></x-button>
                </div>
                <div class="grid grid-cols-2 gap-2 xs:gap-3">
                    @foreach ([
                        'users' => 'Employee directory',
                        'clock' => 'Attendance & shifts',
                        'calendar-days' => 'Leave management',
                        'wallet' => 'Payroll & payslips',
                        'briefcase' => 'Recruitment & onboarding',
                        'target' => 'Performance reviews',
                    ] as $icon => $label)
                        <span class="flex min-h-[51px] items-center gap-[7px] rounded-[11px] border border-white bg-white p-[9px] text-3xs font-medium text-ink-soft shadow-card xs:min-h-[55px] xs:gap-2.5 xs:p-3 xs:text-2xs">
                            <i data-lucide="{{ $icon }}" class="size-3.5 text-primary xs:size-4"></i> {{ $label }}
                        </span>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- How it works --}}
        <section id="how-it-works" class="{{ $wrap }} py-[67px] lg:pt-[105px] lg:pb-[100px]">
            <div class="mx-auto mb-[43px] max-w-[680px] text-center">
                <div class="{{ $eyebrow }}">SIMPLE BY DESIGN</div>
                <h2 class="{{ $sectionTitle }} mt-[17px] mb-[13px]">Get your HR work<br><span class="text-primary">into a better rhythm.</span></h2>
            </div>
            <div class="grid grid-cols-1 gap-[22px] xs:grid-cols-3 xs:gap-[25px]">
                @foreach ([
                    ['Set up your organization', 'Add departments, designations, work shifts, and leave policies.'],
                    ['Bring in your people', 'Import employees, assign managers, and give everyone self-service access.'],
                    ['Run HR day to day', 'Track attendance, approve leave, and process payroll from one place.'],
                ] as [$title, $text])
                    <article class="border-t border-line pt-[17px] pr-2.5 xs:pt-[22px]">
                        <span class="grid size-[34px] place-items-center rounded-[11px] bg-primary-soft font-display text-[13px] font-extrabold text-primary">{{ $loop->iteration }}</span>
                        <h3 class="mt-[13px] mb-1.5 font-display text-[15px] font-extrabold text-ink xs:mt-[18px] xs:mb-2">{{ $title }}</h3>
                        <p class="max-w-[270px] text-[11px] leading-[1.8] text-muted">{{ $text }}</p>
                    </article>
                @endforeach
            </div>
        </section>

        {{-- Call to action --}}
        <section class="{{ $wrap }} mb-[42px] flex flex-col items-stretch justify-between gap-[18px] rounded-[20px] border border-primary-light bg-linear-110 from-primary-50 to-white to-75% p-6 xs:mb-[68px] xs:flex-row xs:items-center xs:gap-[30px] xs:px-[39px] xs:py-[35px]">
            <div>
                <span class="{{ $eyebrow }}">YOUR PEOPLE, BETTER SUPPORTED</span>
                <h2 class="mt-2.5 mb-2 font-display text-[25px] leading-[1.2] font-extrabold tracking-[-1.2px] text-ink xs:text-[27px]">Ready to simplify HR?</h2>
                <p class="text-[11px] leading-[1.8] text-muted">Step into a workspace designed to make people operations easier to run.</p>
            </div>
            <x-button size="lg" :href="route('dashboard')">Open Shon HR <i data-lucide="arrow-up-right"></i></x-button>
        </section>
    </main>

    <footer class="{{ $wrap }} flex min-h-[93px] flex-wrap items-center justify-center gap-3 border-t border-line py-[22px] text-center xs:flex-nowrap xs:justify-between xs:gap-5 xs:py-0 xs:text-left">
        <x-brand size="sm" />
        <p class="order-3 w-full text-3xs text-faint xs:order-none xs:w-auto">One workspace for the people who move your business.</p>
        <span class="text-3xs text-faint">&copy; {{ now()->year }} Shon. All rights reserved.</span>
    </footer>
@endsection
