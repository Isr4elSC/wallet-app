<x-layouts.app header="Editar usuario" title="Editor de usuario" meta-description="formulario de creación de usuario">
    <form action="{{ route('users.update', $user) }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('PATCH')

        {{-- @dump($errors->all()) --}}

        @include('users._form')

        <button type="submit"
            class="text-white my-9 bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Actualizar
            Usuario</button>
    </form>
</x-layouts.app>
