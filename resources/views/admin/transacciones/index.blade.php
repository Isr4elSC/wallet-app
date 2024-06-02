<x-layouts.app header="Transacciones" title="Transacciones" meta-description="Listado de transacciones de la app">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('transacciones.index') }}
            <x-flash />
            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Transacciones
                        </h1>
                    </header>
                    <div class="my-4 py-4">
                        <a class="px-5 py-2.5 text-sm uppercase font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300"
                            href="{{ route('transacciones.create') }}">Nueva Transacción</a>
                    </div>

                    <x-transacciones.cabecera />

                    @foreach ($transacciones as $transaccion)
                        <x-transacciones.fila :transaccion="$transaccion" />
                        <x-transacciones.acciones-admin :transaccion="$transaccion" />
                    @endforeach
                    <x-transacciones.pie />
                    {{-- {{ $transacciones->links() }} --}}
                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
