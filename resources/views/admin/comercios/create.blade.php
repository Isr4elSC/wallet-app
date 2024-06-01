<x-layouts.app header="Crear Comercio" title="Creación de Comercio" meta-description="formulario de creación de comercio">
    <form action="{{ route('comercios.store') }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('POST')
        @include('admin.comercios._form')
        <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
            {{ 'Crear Comercio' }}
        </x-primary-button>
    </form>

</x-layouts.app>
