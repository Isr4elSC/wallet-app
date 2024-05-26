<x-layouts.app header="Crear usuarios" title="Creacion de usuario" meta-description="formulario de creación de usuario">
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        {{-- @dump($errors->all()) --}}

        @include('users._form')
        <button type="submit" class="btn btn-primary">{{ __('New user') }}</button>
    </form>
</x-layouts.app>
