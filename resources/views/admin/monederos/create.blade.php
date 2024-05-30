<x-layouts.app header="Crear Monedero" title="Creación de Monedero" meta-description="formulario de creación de monedero">
    <form action="{{ route('monederos.store') }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('POST')
        @include('admin.monederos._form')
        <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
            {{ 'Crear Monedero' }}
        </x-primary-button>
    </form>
</x-layouts.app>
