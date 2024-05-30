        {{-- <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_id">Id usuario</label>
            <input
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                type="number" name="user_id" id="user_id" class="form-control"
                value="{{ old('id_user', $monedero->user_id) }}" required>
            @error('user_id')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div> --}}
        <div>
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="nombre">Nombre</label>
            <select name="user_id" id="user_id" class="form-control"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                @foreach (App\Models\User::all() as $user)
                    @if ($user->id == $monedero->user_id)
                        <option value="{{ $user->id }}" selected>{{ $user->nombre }}</option>
                    @else
                        <option value="{{ $user->id }}">{{ $user->nombre }}</option>
                    @endif
                @endforeach
            </select>
            @error('user_id')
                <div style="color:red">{{ $message }}</div>
            @enderror

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="saldo">Saldo</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                    type="number" name="saldo" id="saldo" class="form-control"
                    value="{{ old('saldo', $monedero->saldo) }}" required>
                @error('email')
                    <div style="color:red">{{ $message }}</div>
                @enderror
            </div>
