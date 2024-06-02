<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ISSC.Wallet</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Styles -->
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl h-screen flex flex-col justify-between">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-2">
                    <div class="flex">
                        <a href="/">
                            <div class="flex flex-row">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet"
                                    width="35" height="35" viewBox="0 0 24 24" stroke-width="2" stroke="#00abfb"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                                    <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                                </svg>
                                <span
                                    class="self-center text-xl text-black sm:text-lg whitespace-nowrap dark:text-white">
                                    ISSC.Wallet</span>
                            </div>
                        </a>
                    </div>
                    @if (Route::has('login'))
                        <nav class="-mx-3 flex flex-1 justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Panel de control
                                </a>
                            @else
                                <a href="{{ route('login') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                    Acceder
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                        Registate
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </header>

                <main class="mt-6">
                    <div class="container">
                        <div class="-mx-4 flex flex-wrap">
                            <div class="w-full px-4">
                                <div class="mx-auto max-w-[800px] text-center">
                                    <h1
                                        class="mb-5 text-3xl font-bold leading-tight text-black dark:text-white sm:text-4xl sm:leading-tight md:text-5xl md:leading-tight">
                                        <span class="text-sky-600">Monedero Virtual </span><br><span>de San Lorenzo de
                                            El Escorial</span>
                                    </h1>
                                    <p class="mb-4 text-grey-600">by Issc</p>
                                    <p
                                        class="mb-12 text-base !leading-relaxed text-body-color dark:text-body-color-dark sm:text-lg md:text-xl">
                                        La aplicación wed de monedero virtual que te permite pagar con el dinero de las
                                        promociones de San Lorenzo de El Escorial en tus tiendas
                                        favoritas de forma rápida, segura y cómoda.</p>
                                    <div
                                        class="flex flex-col items-center justify-center space-y-4 sm:flex-row sm:space-x-4 sm:space-y-0">
                                        <a class="inline-block rounded-lg bg-sky-600 px-8 py-4 text-base font-semibold text-white duration-300 ease-in-out hover:bg-black/90"
                                            href="{{ route('login') }}">Acceder</a>
                                        <a class="inline-block rounded-lg bg-sky-800 px-8 py-4 text-base font-semibold text-white duration-300 ease-in-out hover:bg-black/90"
                                            href="{{ route('register') }}">Registate</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    © 2024 <a href="https://issc.es"> issc.es.</a> Todos los derechos reservados.
                </footer>
            </div>
        </div>
    </div>
</body>

</html>
