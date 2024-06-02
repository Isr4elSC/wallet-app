<x-layouts.app header="Nueva transacción" title="Creación de una transacción"
    meta-description="formulario de creación de transacciones">
    <div id="main-content" class="relative w-full h-full overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
        <div class="flex flex-col px-4 pt-6 dark:bg-gray-900">
            {{ Breadcrumbs::render('comercio-usuario', $comercio) }}
            @method('POST')
            @include('users.transacciones._form')
            <x-primary-button class="bg-sky-500 hover:bg-primary-800 ">
                {{ 'Crear transaccion' }}
            </x-primary-button>
            </form>
            </main>
        </div>
    </div>
    </div>
    <x-footer />
    </div>
</x-layouts.app>
