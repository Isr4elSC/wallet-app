<x-layouts.app header="Editar transaccion" title="Editor de transacciones"
    meta-description="formulario de edición de transacciones">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('transacciones.edit', $transaccion) }}
            <x-flash />
            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Editar transaccion {{ $transaccion->id }}
                        </h1>
                    </header>
                    <main>

                        <form action="{{ route('transacciones.update', $transaccion) }}" method="POST"
                            class="mt-8 space-y-6">
                            @csrf
                            @method('PATCH')

                            {{-- @dump($errors->all()) --}}

                            @include('admin.transacciones._form')

                            <button type="submit"
                                class="text-white my-9 bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Actualizar
                                Transacción</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
