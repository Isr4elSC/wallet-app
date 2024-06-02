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
                                <div class="flex flex-row gap-3">
                                    <div class="md:w-1/4 p-8">
                                        <a href="{{ route('comercios.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Comercios</a>
                                    </div>
                                    <div class="md:w-1/4 p-8">
                                        <a href="{{ route('users.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Usuarios</a>
                                    </div>
                                    <div class="md:w-1/4 p-8">
                                        <a href="{{ route('monederos.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Monederos</a>
                                    </div>
                                    <div class="md:w-1/4 p-8">
                                        <a href="{{ route('transacciones.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Transacciones</a>
                                    </div>
                                    <div class="md:w-1/4 p-8">
                                        <a href="{{ route('promociones.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Promociones</a>
                                    </div>
                                    <div class="md:w-1/4 p-8">
                                        <a href="{{ route('sorteos.index') }}"
                                            class="bg-sky-500 hover:bg-primary-800 text-white font-base py-2 px-4 rounded">Sorteos</a>
                                    </div>
                                </div>
                            @else
                                <p class="text-gray-600 dark:text-gray-200 my-3">Bienvenido a la aplicación monedero
                                    ISSC-Wallet</p>
                                <p class="text-gray-600 dark:text-gray-200 my-3">Selecciona una de las opciones del menú
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
