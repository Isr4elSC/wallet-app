{{-- <x-layouts.app title="Usuario {{ $user->nombre }}" meta-description="informacion del usuario {{ $user->nombre }}"> --}}
<x-layouts.app :title="'Usuario ' . $user->nombre" :header="'Usuario ' . $user->nombre" :meta-description="'informacion del uduario ' . $user->nombre">
    <p>Nombre: {{ $user->nombre }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Fecha creado: {{ $user->created_at }}</p>
    <p>Fecha ultima actualización: {{ $user->updated_at }}</p>
    {{-- <p>Saldo: {{ $user->monedero->saldo }}</p>
    <p>Monedero: {{ $user->monedero->transacciones }}</p> --}}
    <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        href="{{ route('users.edit', $user) }}"><svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
            </path>
            <path fill-rule="evenodd"
                d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                clip-rule="evenodd"></path>
        </svg> Editar</a>
    <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        href="{{ route('users.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" width="18" height="18" viewBox="0 0 24 24"
            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path d="M9 14l-4 -4l4 -4" />
            <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
        </svg>
        </svg> Volver</a>
</x-layouts.app>
