{{-- @extends('layouts.webapp')
@section('title', 'Blog')
@section('meta-description', 'Informacion del blog de la issan.dev - wallet')

@section('content')
<h1>Blog</h1>

@endsection --}}

<x-layouts.app header="Usuarios" title="Usuarios" meta-description="Listado de usuarios de la app">

    {{-- @if (session('status'))
        <div class="status">{{ session('status') }}</div>
    @endif --}}
    {{-- @session('status')
        <div class="status">{{ $value }}</div>
    @endsession --}}

    <a href="{{ route('users.create') }}">Crear usuario</a>
    {{-- @dump($users) --}}
    @foreach ($users as $user)
        {{-- @dump($usuario) --}}
        <div style="display:flex;gap:5px;align-items:baseline;border-top:1px solid grey;margin-top:5px">
            {{ $user->nombre }} |
            {{ $user->email }} |
            {{ $user->monedero->saldo }} |
            <a href="{{ route('users.show', $user) }}">Ver detalles</a> |
            <a href="{{ route('users.edit', $user) }}">Editar</a> |
            {{-- <a href="{{ route('user.destroy', $user) }}">Eliminar</a> | --}}
            <form method="POST" action="{{ route('users.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar" />
            </form>
        </div>
    @endforeach
    {{-- @dump($users) --}}
    {{-- @dump($users->links()) --}}
    {{ $users->onEachSide(5)->links() }}
</x-layouts.app>
