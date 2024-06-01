        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nombre">Nombre</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                type="text" name="nombre" id="nombre" value="{{ old('title', $user->nombre) }}" placeholder="Nombre"
                required>
            @error('nombre')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
                type="email" name="email" id="email" placeholder="email@dominio.es" pattern=".+@.+\..+"
                value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <p class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Roles de
                usuario</p>
            <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" id="cliente" name="cliente" value="true" class="sr-only peer"
                    @if (old('cliente', $user->hasRole('Cliente'))) checked @endif>
                <div
                    class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Cliente</span>
            </label>
            <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" id="comercio" name="comercio" value="true" class="sr-only peer"
                    @if (old('comercio', $user->hasRole('Comercio'))) checked @endif>
                <div
                    class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Comercio</span>
            </label>
            <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" id="administrador" name="administrador" value="true" class="sr-only peer"
                    @if (old('administrador', $user->hasRole('Administrador'))) checked @endif>
                <div
                    class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-sky-300 dark:peer-focus:ring-sky-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-sky-600">
                </div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Administrador</span>
            </label>
        </div>
