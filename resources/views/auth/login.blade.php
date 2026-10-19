@extends('layouts.guest')

@section('title', 'Log in — Shon HR')

@php
    $fieldLabel = 'mb-2 block text-2xs font-bold text-ink';
    $inputWrap = 'flex h-12 items-center gap-2.5 rounded-[10px] border border-line bg-white px-[13px] transition hover:border-primary-muted focus-within:border-primary focus-within:ring-3 focus-within:ring-primary/15';
    $input = 'h-full w-full min-w-0 border-0 bg-transparent text-[11px] text-ink outline-none placeholder:text-faint';
@endphp

@section('content')
    <main class="grid min-h-screen grid-cols-1 md:grid-cols-[minmax(350px,.85fr)_minmax(440px,1.15fr)] lg:grid-cols-[minmax(420px,.92fr)_minmax(500px,1.08fr)]">
        {{-- Promo panel --}}
        <section class="relative hidden min-h-screen flex-col overflow-hidden bg-primary px-[35px] pt-9 pb-[25px] text-white md:flex lg:px-[clamp(32px,5vw,76px)]
                        before:absolute before:top-[15%] before:-left-[36%] before:size-[580px] before:rounded-full before:bg-radial before:from-white/14 before:via-white/5 before:via-50% before:to-transparent before:to-72%
                        after:absolute after:-right-1/4 after:-bottom-[24%] after:size-[430px] after:rounded-full after:border after:border-white/12 after:shadow-[0_0_0_36px_rgb(255_255_255/0.05),0_0_0_72px_rgb(255_255_255/0.035)]">
            <x-brand inverted class="relative z-1" />

            <div class="relative z-1 my-auto pt-[55px] pb-7">
                <div class="inline-flex items-center gap-[9px] rounded-full border border-white/20 bg-white/10 px-[13px] py-[9px] text-3xs font-extrabold tracking-[1.3px] text-white">
                    <span class="size-[7px] rounded-full bg-white shadow-[0_0_0_4px_rgb(255_255_255/0.2)]"></span> YOUR PEOPLE, IN SYNC
                </div>
                <h1 class="mt-[23px] mb-4 font-display text-[clamp(38px,4.3vw,56px)] leading-[1.12] font-extrabold tracking-[-2.9px] text-white">
                    Great teams start<br>with <span class="text-primary-light">great HR.</span>
                </h1>
                <p class="max-w-[440px] text-[13px] leading-[1.9] text-white/80">One calm, connected workspace for the people you hire, the time they work, and the pay they count on.</p>
                <div class="mt-[25px] grid gap-[13px]">
                    @foreach (['Employee records in one place', 'Attendance and leave, tracked automatically', 'Payroll that runs on time'] as $point)
                        <span class="flex items-center gap-[9px] text-[11px] text-white/90"><i data-lucide="circle-check" class="size-[15px] text-primary-light"></i> {{ $point }}</span>
                    @endforeach
                </div>
            </div>

            <div class="relative z-1 mx-auto mb-[22px] w-full max-w-[420px] rounded-[15px] border border-white/20 bg-white/10 px-[18px] py-[17px] backdrop-blur-[10px]">
                <div class="flex items-center justify-between">
                    <span class="grid size-[31px] place-items-center rounded-[9px] bg-white/15 text-white"><i data-lucide="users" class="size-4"></i></span>
                    <span class="flex items-center gap-[7px] text-[7px] font-extrabold tracking-[1px] text-white/75">
                        <i class="size-[5px] rounded-full bg-white shadow-[0_0_0_4px_rgb(255_255_255/0.2)]"></i> PEOPLE OVERVIEW
                    </span>
                </div>
                <strong class="mt-[13px] block font-display text-[13px] font-bold">Your team at a glance</strong>
                <div class="mt-[13px] grid grid-cols-3 gap-2.5">
                    @foreach ([['Employees', '248', '+6 this month'], ['Present today', '231', '94% on time'], ['On leave', '12', '4 pending']] as [$label, $value, $change])
                        <div class="rounded-[9px] border border-white/15 bg-white/8 p-2.5">
                            <small class="block text-4xs text-white/70">{{ $label }}</small>
                            <b class="my-[5px] block font-display text-[17px] font-extrabold">{{ $value }}</b>
                            <span class="block text-4xs text-primary-light">{{ $change }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="mt-4 flex h-[43px] items-end gap-1.5 border-b border-white/20">
                    @foreach ([34, 47, 39, 63, 53, 79, 67, 92, 74, 100, 83, 94] as $height)
                        <i class="flex-1 rounded-t-[3px] bg-linear-to-b from-white to-primary-light opacity-75" style="height: {{ $height }}%"></i>
                    @endforeach
                </div>
            </div>

            <div class="relative z-1 flex justify-between gap-2.5 text-[7px] tracking-[1px] text-white/65">
                <span>SECURE HR WORKSPACE ACCESS</span><span>Hire. Track. Pay.</span>
            </div>
        </section>

        {{-- Sign-in form --}}
        <section class="flex min-h-screen flex-col px-[21px] pt-5 pb-4 xs:px-7 xs:pt-[25px] xs:pb-5 md:px-[35px] md:pt-7 lg:px-[clamp(30px,5vw,80px)]">
            <div class="mb-7 xs:mb-5 md:hidden"><x-brand /></div>

            <div class="m-auto w-[min(410px,100%)]">
                <a href="{{ route('home') }}" class="mb-[23px] inline-flex items-center gap-[7px] text-2xs font-bold text-muted transition-colors hover:text-primary-strong md:mb-7">
                    <i data-lucide="arrow-left" class="size-3.5"></i> Back to home
                </a>

                <div class="mb-[26px]">
                    <div class="mb-[19px] grid size-[43px] place-items-center rounded-[13px] border border-primary-light bg-primary-soft text-primary">
                        <i data-lucide="lock-keyhole" class="size-[19px]"></i>
                    </div>
                    <span class="text-4xs font-extrabold tracking-[1.6px] text-primary-strong">WELCOME BACK</span>
                    <h2 class="mt-[9px] mb-2 font-display text-[28px] font-extrabold tracking-[-1.4px] text-ink xs:text-[30px]">Sign in to Shon HR</h2>
                    <p class="text-[11px] leading-[1.7] text-muted">Enter your details to access your HR workspace.</p>
                </div>

                <form id="loginForm" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf

                    <label class="{{ $fieldLabel }}" for="email">Work email</label>
                    <div class="{{ $inputWrap }} mb-[19px]">
                        <i data-lucide="mail" class="size-4 shrink-0 text-faint"></i>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="you@company.com" autocomplete="username" required autofocus class="{{ $input }}">
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="{{ $fieldLabel }}" for="password">Password</label>
                        <a href="#" id="forgotPassword" class="mb-2 text-3xs font-bold text-primary-strong hover:underline">Forgot password?</a>
                    </div>
                    <div class="{{ $inputWrap }} mb-[13px]">
                        <i data-lucide="key-round" class="size-4 shrink-0 text-faint"></i>
                        <input id="password" name="password" type="password" placeholder="Enter your password" autocomplete="current-password" required class="{{ $input }}">
                        <button type="button" id="togglePassword" class="grid place-items-center rounded-md p-1 text-faint transition hover:text-primary" aria-label="Show password">
                            <i data-lucide="eye" class="size-4"></i>
                        </button>
                    </div>

                    <label class="relative mt-0.5 mb-[21px] flex cursor-pointer items-center gap-[9px] text-2xs text-muted">
                        <input type="checkbox" id="remember" name="remember" value="1" @checked(old('remember')) class="peer absolute size-4 opacity-0">
                        <span class="grid size-4 place-items-center rounded-[5px] border border-subtle bg-white text-[11px] font-extrabold text-white peer-checked:border-primary peer-checked:bg-primary peer-checked:after:content-['✓'] peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-primary"></span>
                        <span>Remember me on this device</span>
                    </label>

                    <x-button size="lg" type="submit" class="w-full justify-between! px-4!">
                        <span>Sign in</span><i data-lucide="arrow-right"></i>
                    </x-button>

                    <p id="formNote" role="{{ $errors->any() ? 'alert' : 'status' }}"
                       @class(['mt-[11px] text-center text-3xs leading-[1.6] text-faint [&.error]:text-danger', 'error' => $errors->any()])>
                        {{ $errors->first() ?: 'Use the account your HR administrator gave you.' }}
                    </p>
                </form>

                <p class="mt-[23px] text-center text-3xs text-muted">
                    Need access? <a href="{{ route('home') }}#how-it-works" class="font-bold text-primary-strong hover:underline">Contact your HR administrator</a>
                </p>
            </div>

            <footer class="mt-[22px] flex items-center justify-between gap-3 text-[7px] text-faint xs:text-4xs md:mt-0">
                <span>&copy; {{ now()->year }} Shon</span>
                <span class="flex items-center gap-[5px]"><i data-lucide="shield-check" class="size-3 text-primary"></i> Secure sign-in</span>
            </footer>
        </section>
    </main>
@endsection
