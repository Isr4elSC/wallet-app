       @php
           $usuarios = App\Models\User::all();
       @endphp

       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_id">Selecciona el
               usuario administrador del comercio</label>
           <select name="user_id" id="user_id"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
               @foreach ($usuarios as $user)
                   @if ($user->id == $comercio->user_id || $user->id == old('user_id'))
                       <option value="{{ $user->id }}" selected>{{ $user->nombre }}</option>
                   @else
                       <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                   @endif
               @endforeach
           </select>
           @error('user_id')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nombre">Nombre del
               comercio</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="text" name="nombre" id="nombre" value="{{ old('nombre', $comercio->nombre) }}"
               placeholder="Nombre del Comercio" required>
           @error('nombre')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nif">NIF</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="text" name="nif" id="nif" value="{{ old('nif', $comercio->nif) }}"
               placeholder="X0000000X" required>
           @error('nif')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="direccion">Dirección</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="text" name="direccion" id="direccion" value="{{ old('direccion', $comercio->direccion) }}"
               placeholder="Calle, Número, Piso, Puerta" required>
           @error('direccion')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="telefono">Teléfono</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="tel" name="telefono" id="telefono" value="{{ old('telefono', $comercio->telefono) }}"
               placeholder="000000000" required>
           required>
           @error('telefono')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="email" name="email" id="email" value="{{ old('email', $comercio->email) }}"
               placeholder="email@dominio.com" required>
           @error('email')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="web">Web</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="url" name="web" id="web" value="{{ old('web', $comercio->web) }}"
               placeholder="https://www.paginaweb.com" required>
           @error('web')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="saldo">Saldo</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
               type="number" name="saldo" id="saldo" value="{{ old('saldo', $comercio->saldo) }}"
               placeholder="00,00" required>
           @error('saldo')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
