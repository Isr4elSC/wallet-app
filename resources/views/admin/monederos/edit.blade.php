<x-layouts.app header="Editar monedero" title="Editor de monedero" meta-description="formulario de edición de monedero">
    <form action="{{ route('monederos.update', $monedero) }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('PATCH')

        @include('admin.monederos._form')

        <button type="submit"
            class="text-white my-9 bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Actualizar
            Monedero</button>
    </form>
</x-layouts.app>
