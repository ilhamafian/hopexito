<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Hopexito') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- Filepond --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    <style>
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
    </style>
    @livewireStyles
    @livewire('navigation-menu')
</head>

<body class="min-h-screen font-sans antialiased bg-zinc-900">
    {{ $slot }}
    @stack('modals')
    @livewireScripts
    //comment
</body>
</html>
