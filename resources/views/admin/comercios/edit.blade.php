<x-layouts.app header="Editar comercio" title="Editor de Comercio" meta-description="formulario de edición de un comercio">
    <form action="{{ route('users.update', $comercio) }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('PATCH')

        {{-- @dump($errors->all()) --}}

        @include('admin.comercios._form')

        <button type="submit"
            class="text-white my-9 bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Actualizar
            Usuario</button>
    </form>
</x-layouts.app>
