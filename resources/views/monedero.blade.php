{{-- @extends('layouts.webapp')
@section('title','Conctacto')
@section('meta-description','Informacion de contacto de la issan.dev - wallet')
@section('content')
<h1>Contacto</h1>

@endsection --}}

<x-layouts.app title="Monederos" meta-description="meta descripción del Monedero">
    <h1>Monederos</h1>

        @foreach ($monederos as $monedero)
        {{-- @dump($usuario) --}}
        <h3>{{ $monedero->saldo }}</h3>
    @endforeach
</x-layouts.app>