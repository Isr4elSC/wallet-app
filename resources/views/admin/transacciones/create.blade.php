<x-layouts.app header="Nueva transacción" title="Creación de una transacción"
    meta-description="formulario de creación de transacciones">
    {{ Breadcrumbs::render('transacciones.create', $transaccion) }}

    <form action="{{ route('transacciones.store') }}" method="POST" class="mt-8 space-y-6">
        @csrf
        {{-- @dump($errors->all()) --}}
        @method('POST')
        @include('admin.transacciones._form')
        <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
            {{ 'Crear transaccion' }}
        </x-primary-button>
    </form>
</x-layouts.app>
