<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Research Grant System') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <style>[x-cloak] { display: none !important; }</style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased h-full">
<x-ui.banner/>
<div x-data="{ opensidebar: false }" @keydown.window.escape="opensidebar = false">
    @include('layouts.responsive-sidebar')
    @include('layouts.sidebar')
    <div class="md:pl-64 flex flex-col flex-1">
        @livewire('navigation-menu')
        <main>
            <div class="py-6">
                @if(isset($header))
                    <div class="max-w-full mx-auto px-4 sm:px-6 md:px-8 lg:flex lg:items-center lg:justify-between">
                        {{ $header }}
                    </div>
                @endif
                <div class="max-w-full mx-auto px-4 sm:px-6 md:px-8">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>
</div>

@stack('modals')
@stack('scripts')
@livewireScripts
@livewire('notifications')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@stack('js')
</body>
</html>
