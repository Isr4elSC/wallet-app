<x-layouts.app title="Panel de administración" header="Panel de administración"
    meta-description="Panel de administración de la app ISSC-Wallet">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('admin') }}
            <x-flash />
            <main>
                <div
                    class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                    <div class="flex flex-col w-full">
                        <header class="w-full">
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                Panel de administración
                            </h1>
                        </header>
                        <div class="w-full">
                            @if (Auth::user()->hasRole('Administrador'))
                                <p class="text-gray-600 dark:text-gray-200 my-3">Bienvenido al panel de administración
                                    de
                                    la
                                    app
                                    ISSC-Wallet</p>
                                <p class="text-gray-600 dark:text-gray-200 my-3">Desde aquí podrás gestionar los
                                    comercios,
                                    los
                                    usuarios, los monederos, las transacciones, las promociones y los sorteos de la app
                                    ISSC-Wallet</p>
                                <p class="text-gray-600 dark:text-gray-200 my-3">Selecciona una de las opciones del menú
                                    para
                                    comenzar a gestionar</p>
                                <div class="flex flex-wrap text-center">
                                    <div class="w-1/3 p-8">
                                        <div
                                        class="flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="{{ route('comercios.index') }}">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Comercios</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                            Panel de adminstración de comercios</p>
                                        <a href="{{ route('comercios.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Comercios</a>
                                    </div>
                                    </div>
                                    <div class="w-1/3 p-8">
                                    <div
                                        class="flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="{{ route('users.index') }}">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Usuarios</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Panel de
                                            administración de usuarios</p>
                                        <a href="{{ route('monederos.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Usuarios</a>
                                    </div>
                                                                        </div>
                                    <div class="w-1/3 p-8">
                                    <div
                                        class="md:w-1/3 flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="{{ route('users.index') }}">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Monederos</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Panel de
                                            administración de Monederos</p>
                                        <a href="{{ route('monederos.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Monederos</a>
                                    </div>
                                                                        </div>
                                    <div class="w-1/3 p-8">
                                    <div
                                        class="md:w-1/3 flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="{{ route('transacciones.index') }}">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Transacciones</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Panel de
                                            administración de transacciones</p>
                                        <a href="{{ route('monederos.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Transacciones</a>
                                    </div>
                                    </div>
                                    <div class="w-1/3 p-8">
                                    <div
                                        class="md:w-1/3 flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="{{ route('promociones.index') }}">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Promociones</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Panel de
                                            administración de Promociones</p>
                                        <a href="{{ route('promociones.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Promociones</a>
                                    </div>
                                    </div>
                                    <div class="w-1/3 p-8">
                                    <div
                                        class="md:w-1/3 flex flex-col justify-between max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <a href="{{ route('sorteos.index') }}">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                Sorteos</h5>
                                        </a>
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Panel de
                                            administración de Sorteos</p>
                                        <a href="{{ route('sorteos.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Sorteos</a>
                                    </div>
                                </div>
                                </div>
                            @else
                                <p class="text-gray-600 dark:text-gray-200 my-3">Bienvenido a la aplicación
                                    monedero
                                    ISSC-Wallet</p>
                                <p class="text-gray-600 dark:text-gray-200 my-3">Selecciona una de las opciones
                                    del menú
                                    para
                                    comenzar a utilizarla</p>
                            @endif
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
