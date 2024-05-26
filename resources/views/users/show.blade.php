{{-- <x-layouts.app title="Usuario {{ $user->nombre }}" meta-description="informacion del usuario {{ $user->nombre }}"> --}}
<x-layouts.app :title="'Usuario ' . $user->nombre" :meta-description="'informacion del uduario ' . $user->nombre">
    <h3>Nombre: {{ $user->nombre }}</h3>
    <p>Email: {{ $user->email }}</p>
    <p>Fecha creado: {{ $user->created_at }}</p>
    <p>Fecha ultima actualización: {{ $user->updated_at }}</p>
    <p>Saldo: {{ $user->monedero->saldo }}</p>
    <p>Monedero: {{ $user->monedero->transacciones }}</p>
    <a href="{{ route('users.edit', $user) }}">Editar</a>
    <a href="{{ route('users.index') }}">Volver</a>
</x-layouts.app>
