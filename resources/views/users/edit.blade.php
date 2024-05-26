<x-layouts.app header="Editar usuario" title="Editor de usuario" meta-description="formulario de creación de usuario">
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PATCH')

        {{-- @dump($errors->all()) --}}

        @include('users._form')

        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>
</x-layouts.app>
