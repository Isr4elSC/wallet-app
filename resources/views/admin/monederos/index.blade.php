<x-layouts.app header="Monederos" title="Monederos" meta-description="Listado de monederos de la app">
    <div class="my-4 py-4">
        <a class="text-white my-9 bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800"
            href="{{ route('monederos.create') }}">Crear Monedero</a>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow">
                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cliente
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Saldo
                                </th>
                                <th
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th colspan="3"
                                    class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-600 dark:bg-gray-800">
                            @foreach ($monederos as $monedero)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $monedero->user->nombre }}
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $monedero->saldo }} €
                                    </td>
                                    <td
                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                        {{ $monedero->user->email }}
                                    </td>
                                    <td class="py-4 space-x-0 text-center whitespace-nowrap">
                                        <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            href="{{ route('monederos.show', $monedero) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" width="18"
                                                height="18" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                                <path d="M21 21l-6 -6" />
                                                <path d="M8 8l-2 2l2 2" />
                                                <path d="M12 8l2 2l-2 2" />
                                            </svg> Detalles</a>
                                    </td>
                                    <td class="py-4 space-x-0 text-center whitespace-nowrap">
                                        <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            href="{{ route('monederos.edit', $monedero) }}"><svg class="w-4 h-4 mr-2"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                    clip-rule="evenodd"></path>
                                            </svg> Editar</a>
                                    </td>
                                    <td class="py-4 space-x-0 text-center whitespace-nowrap">
                                        <form method="POST" action="{{ route('monederos.destroy', $monedero) }}">
                                            @csrf
                                            @method('DELETE')
                                            <x-danger-button type="submit">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Eliminar
                                            </x-danger-button>
                                            {{-- <button type="submit"
                                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                type="submit"><svg class="w-4 h-4 mr-2" fill="currentColor"
                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Eliminar</button> --}}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ $monederos->links() }} --}}
</x-layouts.app>
