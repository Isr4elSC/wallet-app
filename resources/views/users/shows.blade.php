<x-layouts.app title="Usuario {{ $user->nombre }}" meta-description="informacion del usuario {{ $user->nombre }}">
    <h3>{{ $user->nombre }}</h3>
    <p>{{ $user->email }}</p>
    <p>{{ $user->created_at }}</p>
    <p>{{ $user->updated_at }}</p>
    <a href="{{ route('user.index') }}">Volver</a>
</x-layouts.app>
