<x-layouts.app title="Panel de sorteos" header="Panel de sorteos"
    meta-description="Panel de sorteos de la app ISSC-Wallet">


    {{ Breadcrumbs::render('sorteos.index') }}
    <x-flash />
    <div
        class="p-4 my-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
        <div class="flex flex-col w-full">
            <header>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Sorteos
                </h1>
            </header>
            <main>
                <div class="my-4 py-4">
                    <a class="px-5 py-2.5 text-sm uppercase font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300"
                        href="#">Nuevo sorteo</a>
                </div>
                <div class="flex flex-col">
                    <p>AUN POR IMPLEMENTAR</p>
                    {{-- <div class="overflow-x-auto">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden shadow">
                                        <table
                                            class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                            <thead class="bg-gray-100 dark:bg-gray-700">
                                                <tr>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Nombre del comercio
                                                    </th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Dirección
                                                    </th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        web
                                                    </th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Administrador
                                                    </th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        saldo
                                                    </th>
                                                    <th
                                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        acciones
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200 dark:divide-gray-600 dark:bg-gray-800">
                                                @foreach ($comercios as $comercio)
                                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                        <td
                                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $comercio->nombre }}
                                                        </td>
                                                        <td
                                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $comercio->direccion }}

                                                        </td>
                                                        <td
                                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $comercio->pagina_web }}

                                                        </td>
                                                        <td
                                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $comercio->user->nombre }}
                                                        <td
                                                            class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                            {{ $comercio->saldo }}
                                                        </td>
                                                        <td class="py-4 space-x-0 text-center whitespace-nowrap">
                                                            <x-comercios.acciones-admin :comercio="$comercio" />
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    <div class="mt-5">
                        {{-- {{ $sorteos->links() }} --}}
                    </div>
            </main>
        </div>
    </div>

</x-layouts.app>
