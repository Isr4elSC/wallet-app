{{-- <x-layouts.app title="Usuario {{ $user->nombre }}" meta-description="informacion del usuario {{ $user->nombre }}"> --}}
<x-layouts.app :title="'Usuario ' . $user->nombre" :meta-description="'informacion del uduario ' . $user->nombre">
    <h3>{{ $user->nombre }}</h3>
    <p>{{ $user->email }}</p>
    <p>{{ $user->created_at }}</p>
    <p>{{ $user->updated_at }}</p>
    <a href="{{ route('users') }}">Volver</a>
</x-layouts.app>
