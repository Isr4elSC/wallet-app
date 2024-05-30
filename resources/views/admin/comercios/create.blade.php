<x-layouts.app header="Crear usuario" title="Creación de usuario" meta-description="formulario de creación de usuario">
    <form action="{{ route('users.store') }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('POST')
        @include('admin.comercios._form')
        <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
            {{ 'Crear Comercio' }}
        </x-primary-button>
    </form>
</x-layouts.app>
