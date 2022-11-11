<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Hopexito') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    <script src="https://cdn.lordicon.com/xdjxvujz.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles --> 
    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        [x-cloak] {
            display: none;
        }
    </style>
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="">
        <!-- Navigation menu -->
        @livewire('navigation-menu')
        <!-- Page Content -->
        <main class="min-h-screen bg-black">
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
