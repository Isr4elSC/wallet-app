<x-layouts.app :title="'Transacción Nº ' . $transaccion->id" :header="'Nº de Transacción ' . $transaccion->id" :meta-description="'informacion de la transacción ' . $transaccion->id">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">

            {{ Breadcrumbs::render('transacciones.show', $transaccion) }}
            <x-flash />
            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Transacción Nº {{ $transaccion->id }}
                        </h1>
                    </header>
                    <main>
                        <div class="flex flex-wrap -ml-4">
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Orden de transacción: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $transaccion->id }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Fecha de transacción: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">
                                        {{ date('d/m/Y', strtotime($transaccion->fecha_transaccion)) }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Usuario: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">
                                        {{ $transaccion->monedero->user->nombre }}</p>
                            </div>

                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Comercio: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">
                                        {{ $transaccion->comercio->nombre }}
                                    </p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Cantidad: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">
                                        {{ $transaccion->cantidad }} €</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white"> Tipo: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">
                                        {{ $transaccion->tipo_transaccion }}</p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Estado: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $transaccion->estado }}
                                    </p>
                            </div>
                            <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                                <h2 class="text-sm text-gray-500 dark:text-white">Concepto: </p>
                                    <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $transaccion->concepto }}
                                    </p>
                            </div>
                        </div>
                        <div>
                            <p class="my-4 text-sm text-gray-400 dark:text-white">Fecha de creación:
                                {{ $transaccion->created_at }} -
                                Fecha de actualización: {{ $transaccion->updated_at }}</p>
                        </div>
                        <x-transacciones.acciones-show :transaccion="$transaccion" />

                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
</x-layouts.app>
