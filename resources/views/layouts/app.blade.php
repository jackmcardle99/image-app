<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">  {{-- themes may suffer from FOIT (flash of incorrect them https://css-tricks.com/a-complete-guide-to-dark-mode-on-the-web/--}}
{{-- could resolve but would take up too much time--}}
    <head bg-gradient-to-tr from-indigo-900 to-pink-900>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>IndieScene</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Fav icon -->
        <link rel="shortcut icon" sizes="28x28" href="{{ asset('newSvg.svg') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
           class="antialiased font-sans antialiased bg-slate-100 dark:bg-[conic-gradient(at_bottom_left,_var(--tw-gradient-stops))] from-slate-900 via-purple-900 to-slate-900">
        <div class="min-h-screen dark:bg-[conic-gradient(at_bottom_left,_var(--tw-gradient-stops))] from-slate-900 via-purple-900 to-slate-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="shadow dark:bg-[#141a1c]">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main >
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
