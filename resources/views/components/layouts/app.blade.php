{{-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>issan.dev-Wallet - {{$title ?? ''}}</title>
    <meta name="description" meta="{{$metaDescription ?? 'Default meta descripción'}}">
</head>
<body>
    <x-layouts.nav/>

    {{$slot}}

</body>
</html> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ISC-Wallet') }} - {{ $title ?? '' }}</title>
    <meta name="description" meta="{{ $metaDescription ?? 'Default meta descripción' }}">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen max-w-screen-md mx-auto">
        <x-layouts.nav />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @if (session('status'))
                <div class="status">{{ session('status') }}</div>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>

</html>
