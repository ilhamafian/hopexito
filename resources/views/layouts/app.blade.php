<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'HopeXito')</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="shortcut icon" href="{{ asset('image/xito-icon.png') }}">
    {{-- Swiper --}}
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
    {{-- Filepond --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@marcreichel/alpine-typewriter@latest/dist/alpine-typewriter.min.js" defer>
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    <style>
        html {
            scroll-behavior: smooth;
        }
        /* Hide Scrollbar */
        ::-webkit-scrollbar {
            display: none;
        }
        /* Reconfigure Input Autocomplete Background Color */
        input:-webkit-autofill {
            transition: background-color 100s ease-in-out 0s;
            -webkit-text-fill-color: white !important;
        }
        /* Hide AlpineJS Component */
        [x-cloak] {
            display: none;
        }
        /* Filepond Customization */
        .filepond--panel-root {
            background-color: #262626;
        }
        .filepond--drop-label {
            color: white;
        }
        .filepond--label-action {
            color: #6366f1;
            text-decoration: none;
        }
        .filepond--item-panel {
            background-color: #6366f1;
        }
        [data-filepond-item-state='processing-complete'] .filepond--item-panel {
            background-color: #22c55e;
        }
        /* html range customization */
        input[type=range]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 18px;
            width: 18px;
            border-radius: 25%;
            background: #fff;
        }
    </style>
    @livewireStyles
    {{-- Global Nav Menu --}}
    @livewire('navigation-menu')
</head>

<body class="text-xs antialiased leading-6 text-gray-200 select-none sm:text-sm font-poppins bg-zinc-900 border-box">
    {{ $slot }}
    @stack('modals')
    @livewireScripts
</body>
{{-- Global Footer --}}
<x-jet-footer></x-jet-footer>

</html>
