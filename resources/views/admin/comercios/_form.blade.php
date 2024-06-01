       @php
           $usuarios = App\Models\User::all();
       @endphp

       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_id">Selecciona el
               usuario administrador del comercio</label>
           <select name="user_id" id="user_id"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
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
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="nombre" id="nombre" value="{{ old('nombre', $comercio->nombre) }}"
               placeholder="Nombre del Comercio" required>
           @error('nombre')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nif">NIF</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="nif" id="nif" value="{{ old('nif', $comercio->nif) }}"
               placeholder="X0000000X" required>
           @error('nif')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="direccion">Dirección</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="direccion" id="direccion" value="{{ old('direccion', $comercio->direccion) }}"
               placeholder="Calle, Número, Piso, Puerta" required>
           @error('direccion')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="poblacion">Población</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="poblacion" id="poblacion" value="{{ old('poblacion', $comercio->poblacion) }}"
               placeholder="Población" required>
           @error('poblacion')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="provincia">Provincia</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="text" name="provincia" id="provincia" value="{{ old('provincia', $comercio->provincia) }}"
               placeholder="Provincia" required>
           @error('provincia')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="cp">Código
               Postal</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="number" name="cp" id="cp" value="{{ old('cp', $comercio->cp) }}" placeholder="00000"
               required>
           @error('cp')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="telefono">Teléfono</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="tel" name="telefono" id="telefono" value="{{ old('telefono', $comercio->telefono) }}"
               placeholder="000000000" required>
           @error('telefono')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="email">Email</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="email" name="email" id="email" value="{{ old('email', $comercio->email) }}"
               placeholder="email@dominio.com" required>
           @error('email')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="web">Web</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="url" name="web" id="web" value="{{ old('web', $comercio->web) }}"
               placeholder="https://www.paginaweb.com" required>
           @error('web')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
       <div>
           <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="saldo">Saldo</label>
           <input
               class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
               type="number" name="saldo" id="saldo" value="{{ old('saldo', $comercio->saldo) }}"
               placeholder="00,00" required>
           @error('saldo')
               <div style="color:red">{{ $message }}</div>
           @enderror
       </div>
