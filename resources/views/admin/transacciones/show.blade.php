<x-layouts.app :title="'Transaccion de ' . $transaccion->cantidad" :meta-description="'informacion de la transacción ' . $transaccion->id">
    <p>Usuario: {{ $transaccion->id_monedero }}</p>
    <p>Comercio: {{ $transaccion->id_comercio }}</p>
    <p>Fecha: {{ $transaccion->created_at }}</p>
    <p>Cantidad: {{ $transaccion->cantidad }}</p>
    <p>Estado: {{ $transaccion->estado }}</p>
    <p>Tipo: {{ $transaccion->tipo }}</p>
    <a href="{{ route('transacciones.edit', $transaccion) }}">Editar</a>
    <a href="{{ route('transacciones.index') }}">Volver</a>
</x-layouts.app>
