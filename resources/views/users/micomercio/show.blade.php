<x-layouts.app :title="'Comercio ' . $comercio->nombre" :meta-description="'informacion del comercio ' . $comercio->nombre">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('comercio-usuario', $comercio) }}
            <x-flash />

            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Comercio: {{ $comercio->nombre }}
                        </h1>
                    </header>
                    <main>
                        <div class="my-2 flex flex-wrap -ml-4">
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Nombre:</h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->nombre }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Administrador: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->user->nombre }}
                                </p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Web: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->web }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">NIF: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->nif }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Dirección: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->direccion }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Población: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->poblacion }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Provincia: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->provincia }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Código Postal: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->cp }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Saldo: </h2>
                                <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $comercio->saldo }}</p>
                            </div>
                        </div>
                        <div class="my-4 py-4">
                            <a class="px-5 py-2.5 text-sm uppercase font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300"
                                href="{{ route('venta-create', $comercio) }}">Nueva Venta</a>
                        </div>
                        <h2 class="my-4 text-lg text-gray-500 uppercase dark:text-white">Transacciones: </h2>
                        <x-transacciones.cabecera />
                        @foreach ($comercio->transacciones as $transaccion)
                            <x-transacciones.fila :transaccion="$transaccion" />
                            <td></td>
                            </tr>
                        @endforeach
                        <x-transacciones.pie />

                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
