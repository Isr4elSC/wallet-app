<x-layouts.app header="Crear Monedero" title="Creación de Monedero" meta-description="formulario de creación de monedero">
    {{ Breadcrumbs::render('monederos.create') }}
    <x-flash />
    <div
        class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
        <div class="flex flex-col w-full">
            <header>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Crear Monedero
                </h1>
            </header>
            <main>
                <form action="{{ route('monederos.store') }}" method="POST" class="mt-8 space-y-6">
                    @csrf
                    @method('POST')
                    @include('admin.monederos._form')
                    <x-primary-button class="bg-sky-500 uppercase hover:bg-primary-800 ">
                        {{ 'Crear Monedero' }}
                    </x-primary-button>
                </form>
            </main>
        </div>
    </div>
</x-layouts.app>
