<x-layouts.app header="Usuarios" title="Usuarios" meta-description="Listado de usuarios de la app">
    {{ Breadcrumbs::render('users.index') }}
    <x-flash />
    <div
        class="p-4 my-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
        <div class="flex flex-col w-full">
            <header>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    {{-- {{ $header ?? 'Panel de administración' }} --}}
                    Administración de Usuarios
                </h1>
            </header>
            <main>
                <div class="my-4 py-4">
                    <a class="px-5 py-2.5 uppercase text-sm font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300"
                        href="{{ route('users.create') }}">Nuevo usuario</a>
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
                                                Nombre
                                            </th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Cliente
                                            </th>
                                            <th
                                                class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Comercio
                                            </th>
                                            <th
                                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Administrador
                                            </th>
                                            <th
                                                class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody
                                        class="bg-white divide-y divide-gray-200 dark:divide-gray-600 dark:bg-gray-800">
                                        @foreach ($users as $user)
                                            {{-- @dump($usuario) --}}
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td
                                                    class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $user->nombre }}
                                                </td>
                                                <td
                                                    class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $user->email }}
                                                </td>
                                                <td
                                                    class="p-4 text-sm text-center font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    @if ($user->hasRole('Cliente'))
                                                        {{ __('SÍ') }}
                                                    @else
                                                        {{ __('NO') }}
                                                    @endif
                                                </td>
                                                <td
                                                    class="p-4 text-sm text-center font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    @if ($user->hasRole('Comercio'))
                                                        {{ __('SI') }}
                                                    @else
                                                        {{ __('NO') }}
                                                    @endif
                                                </td>
                                                <td
                                                    class="p-4 text-sm text-center font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    @if ($user->hasRole('Administrador'))
                                                        {{ __('SI') }}
                                                    @else
                                                        {{ __('NO') }}
                                                    @endif
                                                </td>
                                                <td class="py-4 space-x-0 text-center whitespace-nowrap">
                                                    <x-users.acciones-admin :user="$user" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $users->links() }}
            </main>
        </div>
    </div>
</x-layouts.app>
