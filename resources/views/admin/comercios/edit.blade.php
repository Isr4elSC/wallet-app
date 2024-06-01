<x-layouts.app header="Editar comercio" title="Editor de Comercio" meta-description="formulario de edición de un comercio">
    {{ Breadcrumbs::render('comercios.edit', $comercio) }}

    <form action="{{ route('comercios.update', $comercio) }}" method="POST" class="mt-8 space-y-6">
        @csrf
        @method('PATCH')
        {{-- @dump($errors->all()) --}}
        @include('admin.comercios._form')
        <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
            {{ 'Actualizar Comercio' }}
        </x-primary-button>
    </form>
</x-layouts.app>
