        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nombre">Nombre</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="text" name="nombre" id="nombre" class="form-control"
                value="{{ old('title', $comercio->nombre) }}" required>
            @error('nombre')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="web">Web</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="text" name="web" id="web" class="form-control"
                value="{{ old('email', $comercio->web) }}" required>
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="Saldo">Saldo</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="number" name="saldo" id="saldo" class="form-control"
                value="{{ old('saldo', $comercio->saldo) }}" required>
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
