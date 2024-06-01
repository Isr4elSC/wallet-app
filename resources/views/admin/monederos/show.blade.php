<x-layouts.app :title="'Monedero nº ' . $monedero->id" :header="'Monedero nº ' . $monedero->id" :meta-description="'informacion del monedero ' . $monedero->id">
    {{ Breadcrumbs::render('monederos.show', $monedero) }}
    <p>Nombre: {{ $monedero->user->nombre }}</p>
    <p>Saldo: {{ $monedero->saldo }}</p>
    <p>Transacciones: </p>
    @foreach ($monedero->transacciones as $transaccion)
        <p>{{ $transaccion->fecha_transaccion }} - {{ $transaccion->cantidad }} - {{ $transaccion->concepto }} -
            {{ $transaccion->comercio->nombre_comercio }} - {{ $transaccion->estado }} </p>
    @endforeach
    <p>Fecha creado: {{ $monedero->created_at }}</p>
    <p>Fecha ultima actualización: {{ $monedero->updated_at }}</p>
    <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        href="{{ route('monederos.destroy', $monedero) }}"><svg class="w-4 h-4 mr-2" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M10 3a1 1 0 00-1 1v10a1 1 0 102 0V4a1 1 0 00-1-1zM5 9a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z"
                clip-rule="evenodd"></path>
        </svg> Eliminar</a>
    <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        href="{{ route('monederos.edit', $monedero) }}"><svg class="w-4 h-4 mr-2" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
            </path>
            <path fill-rule="evenodd"
                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                clip-rule="evenodd"></path>
        </svg> Editar</a>
    <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        href="{{ route('monederos.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" width="18" height="18" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 14l-4 -4l4 -4" />
            <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
        </svg>
        </svg> Volver</a>

</x-layouts.app>
