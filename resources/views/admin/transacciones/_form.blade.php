        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="fecha_transaccion">Fecha de
                transacción</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="date" name="fecha_transaccion" id="fecha_transaccion" class="form-control"
                value="{{ old('fecha_transaccion', $transaccion->fecha_transaccion) }}" required>
            @error('fecha_transaccion')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cantidad">Cantidad</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="number" name="cantidad" id="cantidad" class="form-control"
                value="{{ old('cantidad', $transaccion->cantidad) }}" required>
            @error('cantidad')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="concepto">Concepto</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="text" name="concepto" id="concepto" class="form-control"
                value="{{ old('Concepto', $transaccion->Concepto) }}" required>
            @error('concepto')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
