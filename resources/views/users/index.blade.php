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

    <a href="{{ route('user.create') }}">Crear usuario</a>
    {{-- @dump($users) --}}
    @foreach ($users as $user)
        {{-- @dump($usuario) --}}
        <div style="display:flex;gap:5px;align-items:baseline;border-top:1px solid grey;margin-top:5px">
            <h3>{{ $user->nombre }}</h3>
            <a class="btn" href="{{ route('user.show', $user) }}">Ver detalles</a> |
            <a href="{{ route('user.edit', $user) }}">Editar</a> |
            <form method="POST" action="{{ route('user.destroy', $user) }}">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar" />
            </form>
        </div>
    @endforeach

</x-layouts.app>
