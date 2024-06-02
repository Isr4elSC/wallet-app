<x-layouts.app title="Panel de administración" header="Panel de administración"
    meta-description="Panel de administración de la app ISSC-Wallet">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('venta-create', $comercio) }}
            <x-flash />
            <div
                class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                <div class="flex flex-col w-full">
                    <header>
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            Realizar venta
                        </h2>
                    </header>
                    <main>
                        <form action="{{ route('venta-store', $comercio) }}" method="POST" class="mt-8 space-y-6">
                            @csrf
                            @method('POST')
                            @include('users.ventas._form')
                            <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
                                {{ 'Realizar venta' }}
                            </x-primary-button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</x-layouts.app>