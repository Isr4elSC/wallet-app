<x-layouts.app header="Editar usuario" title="Editor de usuario" meta-description="formulario de creación de usuario">
    {{ Breadcrumbs::render('users.edit', $user) }}

    <x-flash />
    <div
        class="p-4 my-6 bg-white rounded-lg shadow md:flex md:items-center md:justify-between md:p-6 xl:p-8 dark:bg-gray-800">
        <div class="flex flex-col w-full">
            <header>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Editar Usuario {{ $user->nombre }}
                </h1>
            </header>
            <main>
                <form action="{{ route('users.update', $user) }}" method="POST" class="mt-8 space-y-6">
                    @csrf
                    @method('PATCH')

                    @include('admin.users._form')

                    <button type="submit"
                        class="text-white uppercase my-9 bg-sky-500 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">Actualizar
                        Usuario</button>
                </form>
            </main>
        </div>
    </div>
</x-layouts.app>
