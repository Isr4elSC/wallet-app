<x-layouts.app header="Nueva transacción" title="Creación de una transacción"
    meta-description="formulario de creación de transacciones">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('transacciones.create', $transaccion) }}
            <x-flash />
            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Nueva transacción
                        </h1>
                    </header>
                    <main>
                        <form action="{{ route('transacciones.store') }}" method="POST" class="mt-8 space-y-6">
                            @csrf
                            {{-- @dump($errors->all()) --}}
                            @method('POST')
                            @include('admin.transacciones._form')
                            <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
                                {{ 'Crear transaccion' }}
                            </x-primary-button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
