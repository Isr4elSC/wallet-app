<x-layouts.app :title="'Usuario ' . $user->nombre" :header="'Usuario ' . $user->nombre" :meta-description="'informacion del uduario ' . $user->nombre">

    {{ Breadcrumbs::render('users.show', $user) }}
    <x-flash />
    <div
        class="p-4 my-4 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
        <div class="flex flex-col w-full">
            <header>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    {{ $user->nombre }}
                </h1>
            </header>
            <main>
                <div class="my-2 flex flex-wrap -ml-4">
                    <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                        <h2 class="text-sm text-gray-500 dark:text-white">Nombre:</h2>
                        <p class="mb-2 text-base text-gray-800 dark:text-white">{{ $user->nombre }}</p>
                    </div>
                    <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                        <h2 class="text-sm text-gray-500 dark:text-white">Saldo:</h2>
                        <p class="mb-2 text-lg text-gray-800 dark:text-white">{{ $user->monedero->saldo }}
                            €
                        </p>
                    </div>
                    <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                        <h2 class="text-sm text-gray-500 dark:text-white">Email:</h2>
                        <p class="mb-2 text-lg text-gray-800 dark:text-white">{{ $user->email }}</p>
                    </div>
                    <div class="w-1/2 p-4 hover:bg-gray-100 py-2">
                        <h2 class="text-sm text-gray-500 dark:text-white">Roles:</h2>
                        <p class="mb-2 text-lg text-gray-800 dark:text-white">
                            @foreach ($user->roles as $rol)
                                {{ $rol->name }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </div>
                </div>
                <h2 class="my-4 uppercase text-base text-gray-600 dark:text-white">Transacciones: </h2>
                <x-transacciones.cabecera />
                @foreach ($user->monedero->transacciones as $transaccion)
                    <x-transacciones.fila :transaccion="$transaccion" />
                @endforeach
                <x-transacciones.pie />

                <x-users.acciones-show :user="$user" />
                <p class="my-4 text-sm text-gray-400 dark:text-white">Fecha creado: {{ $user->created_at }}
                    -
                    Fecha actualización: {{ $user->updated_at }}</p>
            </main>
        </div>
    </div>
</x-layouts.app>
