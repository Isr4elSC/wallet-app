<x-layouts.app header="Editar comercio" title="Editor de Comercio" meta-description="formulario de edición de un comercio">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('comercios.edit', $comercio) }}
            <x-flash />

            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            Editar Comercio: {{ $comercio->nombre }}
                        </h1>
                    </header>
                    <main>
                        <form action="{{ route('comercios.update', $comercio) }}" method="POST" class="mt-8 space-y-6">
                            @csrf
                            @method('PATCH')
                            {{-- @dump($errors->all()) --}}
                            @include('admin.comercios._form')
                            <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
                                {{ 'Actualizar Comercio' }}
                            </x-primary-button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
