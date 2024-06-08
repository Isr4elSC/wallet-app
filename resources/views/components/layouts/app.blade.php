<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ISSC-Wallet') }} - {{ $title ?? '' }}</title>
    <meta name="description" meta="{{ $metaDescription ?? 'App Monedero ISSCWallet' }}">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}

</head>

<body class="bg-gray-50 dark:bg-gray-800">
    <!-- Page Heading -->
    <x-nav />
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">
        <!-- Page Sidebar -->
        <x-sidebar />

        <!-- Page Content -->
        <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <div class="flex flex-col px-4 pt-10 dark:bg-gray-900">

                <main>

                    {{ $slot }}


                </main>
            </div>
            <x-footer />
        </div>

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

</body>

</html>
