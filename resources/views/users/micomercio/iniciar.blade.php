<x-layouts.app title="Nuevo Comercio" header="Nuevo Comercio" title="Creación de Comercio"
    meta-description="formulario de creación de comercio">
    {{ Breadcrumbs::render('comercio.usuario') }}
    <x-flash />
    <div
        class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
        <div class="flex flex-col w-full">
            <header>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Crea tu Comercio
                </h1>
                </p>
            </header>
            <main>
                <p class="my-4">Puedes crear tu comercio aquí.</p>
                <div>

                    <a class="px-3 py-2 text-xs uppercase font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-green-300"
                        href="{{ route('comercio.iniciar') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" width="18" height="18"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M19 12h2l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h5.5" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2" />
                            <path d="M16 19h6" />
                            <path d="M19 16v6" />
                        </svg> Crea tu comercio</a>
                </div>
            </main>
        </div>
    </div>
</x-layouts.app>
