<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="theme-color" content="#419b78">

        <title>@yield('title', config('app.name'))</title>
        @include('partials.favicon')

        @fonts
        @vite(['resources/css/app.css', 'resources/js/guest.js'])
        @stack('styles')
    </head>
    <body class="bg-white text-ink">
        @yield('content')

        <div id="guestToast" role="status" aria-live="polite"
             class="pointer-events-none fixed bottom-6 left-1/2 z-50 -translate-x-1/2 translate-y-[15px] rounded-[11px] bg-ink px-[17px] py-3 text-xs text-white opacity-0 shadow-float transition [&.show]:translate-y-0 [&.show]:opacity-100"></div>

        @stack('scripts')
    </body>
</html>
