{{-- @extends('layouts.webapp')
@section('title', 'Blog')
@section('meta-description', 'Informacion del blog de la issan.dev - wallet')

@section('content')
<h1>Blog</h1>

@endsection --}}

<x-layouts.app title="Blog" meta-description="meta descripción del Blog">
    <h1>Usuarios</h1>

    @foreach ($users as $usuario)
        {{-- @dump($usuario) --}}
        <h3>{{ $usuario->nombre }}</h3>
        <a href="{{ route('user.show', $usuario) }}">Ver detalles</a>
    @endforeach

</x-layouts.app>
