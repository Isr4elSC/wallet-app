<x-layouts.app :title="'Monedero nº ' . $monedero->id" :header="'Monedero nº ' . $monedero->id" :meta-description="'informacion del monedero ' . $monedero->id">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('monedero-usuario', $monedero) }}
            <x-flash />
            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Monedero nº {{ $monedero->id }}
                        </h1>
                    </header>
                    <main>
                        <div class="my-4 py-4">
                            <h2 class="text-xl text-gray-500 dark:text-white">Propietario:</h2>
                            <p class="mb-5 text-2xl text-gray-800 dark:text-white">{{ $monedero->user->nombre }}</p>
                            <h2 class="text-xl text-gray-500 dark:text-white">Saldo: </h2>
                            <p class="mb-5 text-2xl text-gray-800 dark:text-white">{{ $monedero->saldo }} €</p>
                            <h2 class="mb-2 text-xl uppercase text-gray-500 dark:text-white">Transacciones: </h2>
                            <x-transacciones.cabecera />
                            @foreach ($monedero->transacciones as $transaccion)
                                <x-transacciones.fila :transaccion="$transaccion" />
                                <x-transacciones.acciones-cliente :transaccion="$transaccion" />
                            @endforeach
                            <x-transacciones.pie />

                        </div>

                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
