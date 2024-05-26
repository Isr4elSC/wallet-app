{{-- @component('components.layout'); --}}

<x-layouts.app title="Comercios" meta-description="meta descripción del Comercios">
    <h1>Comercios</h1>

    @foreach ($comercios as $comercio)
        {{-- @dump($usuario) --}}
        <h3>{{ $comercio->nombre_comercio }}</h3>
        <p>{{ $comercio->descripcion }}</p>
        <p>{{ $comercio->pagina_web }}</p>
        <p>{{ $comercio->saldo_disponible }}</p>
    @endforeach
</x-layouts.app>

{{-- @endcomponent --}}
