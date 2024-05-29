{{-- <x-layouts.app title="Usuario {{ $user->nombre }}" meta-description="informacion del usuario {{ $user->nombre }}"> --}}
<x-layouts.app :title="'Usuario ' . $comercio->nombre" :meta-description="'informacion del uduario ' . $comercio->nombre">
    <p>Nombre: {{ $comercio->nombre }}</p>
    <p>Web: {{ $comercio->web }}</p>
    <p>Fecha creado: {{ $comercio->created_at }}</p>
    <p>Fecha última actualización: {{ $comercio->updated_at }}</p>
    <p>Saldo: {{ $comercio->saldo }}</p>
    {{-- <p>Monedero: {{ $comercio->transacciones }}</p> --}}
    <a href="{{ route('admin.comercios.edit', $comercio) }}">Editar</a>
    <a href="{{ route('admin.comercios.index') }}">Volver</a>
</x-layouts.app>