<x-layouts.app :title="'Monedero nº ' . $monedero->id" :header="'Monedero nº ' . $monedero->id" :meta-description="'informacion del monedero ' . $monedero->id">

    {{ Breadcrumbs::render('monederos.show', $monedero) }}
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
                    @endforeach
                    <x-transacciones.pie />
                    <x-monederos.acciones-show :monedero="$monedero" />
                    <p class="text-sm text-gray-400 dark:text-white">Fecha creado: {{ $monedero->created_at }} |
                        Fecha de
                        actualización: {{ $monedero->updated_at }}</p>
                </div>

            </main>
        </div>
    </div>

</x-layouts.app>
