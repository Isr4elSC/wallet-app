       @php
           $monederos = App\Models\Monedero::all();
           $comercios = App\Models\Comercio::all();

           if (isset($fecha)) {
               $fecha = date('Y-m-d', strtotime($fecha));
           } else {
               $fecha = date('Y-m-d', strtotime($transaccion->fecha_transaccion));
           }
       @endphp

       <div class="w-1/4">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="monedero_id">Selecciona
               cliente</label>
           <select name="monedero_id" id="monedero_id" required
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
               <option value="">Selecciona un cliente</option>

               @foreach ($monederos as $monedero)
                   @if ($monedero->id == $transaccion->monedero_id || $monedero->id == old('monedero_id'))
                       <option value="{{ $monedero->id }}" selected>{{ $monedero->user->nombre }} - nº
                           monedero:{{ $monedero->id }}
                       </option>
                   @else
                       <option value="{{ $monedero->id }}">{{ $monedero->user->nombre }}</option>
                   @endif
               @endforeach
           </select>
           @error('monedero_id')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div class="w-1/4">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="comercio_id">Selecciona el
               comercio</label>
           <select name="comercio_id" id="comercio_id" required
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
               <option value="">Selecciona el comercio</option>
               @foreach ($comercios as $comercio)
                   @if ($comercio->id == $transaccion->comercio_id || $comercio->id == old('comercio_id'))
                       <option value="{{ $comercio->id }}" selected>{{ $comercio->nombre }}</option>
                   @else
                       <option value="{{ $comercio->id }}">{{ $comercio->nombre }}</option>
                   @endif
               @endforeach
           </select>
           @error('comercio_id')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div class="w-1/4">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="fecha_transaccion">Fecha de
               transacción</label>

           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="date" name="fecha_transaccion" id="fecha_transaccion" {{-- value="{{ old('fecha_transaccion', date('Y-m-d', strtotime($transaccion->fecha_transaccion))) }}" --}}
               value="{{ old('fecha_transaccion', $fecha) }}" required>
           @error('fecha_transaccion')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>

       <div class="w-1/4">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cantidad">Cantidad</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="cantidad" id="cantidad" value="{{ old('cantidad', $transaccion->cantidad) }}"
               required>
           @error('cantidad')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div class="w-1/2">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="concepto">Concepto</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="concepto" id="concepto" value="{{ old('concepto', $transaccion->concepto) }}"
               required>
           @error('concepto')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div class="w-1/4">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="tipo_transaccion">Tipo de
               Transacción</label>
           <select name="tipo_transaccion" id="tipo_transaccion"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
               <option value="Compra" selected>Compra</option>
               <option value="Recarga">Recarga</option>
               <option value="Premio">Premio</option>
           </select>
           @error('tipo_transaccion')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div class="w-1/4">
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="estado" required>Estado
           </label>
           <select name="estado" id="estado"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
               <option value="Pendiente" selected>Pendiente</option>
               <option value="Aprobado">Aprobado</option>
               <option value="Rechazado">Rechazado</option>
           </select>
           @error('estado')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
