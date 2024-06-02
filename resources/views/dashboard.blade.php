<x-layouts.app title="Panel de administración" header="Panel de administración"
    meta-description="Panel de administración de la app ISSC-Wallet">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('admin') }}
            <x-flash />
            <main>
                <div
                    class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
                    <div class="flex flex-col w-full">
                        <header>
                            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                                Panel de administración
                            </h1>
                        </header>
                    </div>
                </div>
            </main>
        </div>
        <x-footer />
    </div>
</x-layouts.app>
