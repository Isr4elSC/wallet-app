<x-layouts.app header="Crear usuario" title="Creación de usuario" meta-description="formulario de creación de usuario">
    <form action="{{ route('users.store') }}" method="POST" class="mt-8 space-y-6">
        @csrf
        {{-- @dump($errors->all()) --}}
        @method('POST')
        @include('admin.users._form')
        <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
            {{ 'Crear usuario' }}
        </x-primary-button>
</x-layouts.app>
