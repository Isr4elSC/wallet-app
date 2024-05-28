{{-- <nav class="bg-gray-800">
    <ul>
        <li><a href="{{ route('inicio') }}">Inicio</a></li>
        <li><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li><a href="{{ route('monederos.index') }}">monederos</a></li>
        <li><a href="{{ route('transacciones.index') }}">transacciones</a></li>
        <li><a href="{{ route('comercios.index') }}">comercios</a></li>
    </ul>
</nav> --}}
<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700"">
    <div class="flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('admin') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <svg class="w-8 h-8 text-sky-500" fill="none" stroke-width="2" width="0" stroke="currentColor"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
            </svg> <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">ISSC-Wallet</span>

        </a>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="44"
            height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#1d4ed8" fill="none" stroke-linecap="round"
            stroke-linejoin="round">

        </svg>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        {{-- <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a href="{{ route('inicio') }}"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-sky-500 md:p-0 dark:text-white md:dark:text-blue-500"
                        aria-current="page">Inicio</a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Usuarios</a>
                </li>
                <li>
                    <a href="{{ route('monederos.index') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Monederos</a>
                </li>
                <li>
                    <a href="{{ route('transacciones.index') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Transacciones</a>
                </li>
                <li>
                    <a href="{{ route('comercios.index') }}"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-sky-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Comercios</a>
                </li>
            </ul>
        </div> --}}
    </div>
</nav>
{{-- <nav
    class="w-screen overflow-scroll bg-white border-b dark:bg-slate-900 border-slate-900/10 lg:px-8 dark:border-slate-300/10 lg:mx-0">
    <div class="px-4 mx-auto max-w-7xl sm:px-16 lg:px-20">
        <div class="relative flex items-center justify-between h-16">
            <div class="flex items-center justify-center flex-1 sm:items-stretch sm:justify-start">
                <div class="flex items-center flex-shrink-0">
                    <a href="{{ route('inicio') }}">
                        <svg class="w-8 h-8 text-sky-500" fill="none" width="0" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                            <path
                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="mx-auto">
                    <div class="flex space-x-4">
                        <a href="{{ route('inicio') }}"
                            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('inicio') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                            Home
                        </a>
                        <a href="{{ route('users.index') }}"
                            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('users.*') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                            Usuarios
                        </a>
                        <a href="{{ route('monederos.index') }}"
                            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('monederos.*') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                            Monederos
                        </a>
                        <a href="{{ route('transacciones.index') }}"
                            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('transacciones.*') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                            Transacciones
                        </a>
                        <a href="{{ route('comercios.index') }}"
                            class="px-3 py-2 text-sm font-medium rounded-md hover:text-sky-600 dark:hover:text-white {{ request()->routeIs('comercios.*') ? 'text-sky-600 dark:text-white' : 'text-slate-400' }}">
                            Comercios
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav> --}}
