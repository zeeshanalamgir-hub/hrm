<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}@hasSection('title') — @yield('title')@endif</title>
        @include('partials.favicon')

        @fonts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="bg-canvas">
        <div class="min-h-screen">
            @include('layouts.partials.sidebar')

            <div id="sidebarOverlay" class="fixed inset-0 z-15 hidden bg-ink/30 backdrop-blur-[2px] lg:hidden [&.show]:block"></div>

            <main class="min-w-0 lg:ml-[258px]">
                @include('layouts.partials.topbar')

                <section class="mx-auto max-w-[1580px] px-4 pt-[21px] pb-4 xs:pt-6 md:px-[22px] md:pt-[26px] xl:px-[35px] xl:pt-[34px] xl:pb-5 2xl:pt-10">
                    @yield('content')

                    @include('layouts.partials.footer')
                </section>
            </main>
        </div>

        @include('layouts.partials.toast')
        @include('layouts.partials.confirm-delete-modal')

        @stack('scripts')
    </body>
</html>
