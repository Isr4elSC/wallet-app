{{-- <x-layouts.app title="Usuario {{ $user->nombre }}" meta-description="informacion del usuario {{ $user->nombre }}"> --}}
<x-layouts.app :title="'Usuario ' . $comercio->nombre" :meta-description="'informacion del uduario ' . $comercio->nombre">
    {{ Breadcrumbs::render('comercios.show', $comercio) }}
    <div class="flex flex-wrap -ml-4">
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Nombre:</h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->nombre }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Administrador: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->user->nombre }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Web: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->web }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">NIF: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->nif }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Dirección: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->direccion }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Población: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->poblacion }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Provincia: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->provincia }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Código Postal: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->cp }}</p>
        </div>
        <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
            <h2 class="text-sm text-gray-500 dark:text-white">Saldo: </h2>
            <p class="mb-2 text-base text-gray-600 dark:text-white">{{ $comercio->saldo }}</p>
        </div>
    </div>
    <p class="my-4 text-sm text-gray-400 dark:text-white">Fecha creado: {{ $comercio->created_at }}
        - Fecha última actualización: {{ $comercio->updated_at }}</p>

    <h2 class="my-4 text-lg text-gray-500 dark:text-white">Transacciones: </h2>
    <x-transacciones.cabecera />

    @foreach ($comercio->transacciones as $transaccion)
        <x-transacciones.fila :transaccion="$transaccion" />
    @endforeach
    <x-transacciones.pie />

    <x-monederos.acciones-show :monedero="$comercio" />

</x-layouts.app>
