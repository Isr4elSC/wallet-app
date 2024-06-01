@php
    $usuarios = App\Models\User::all();
@endphp
<div class="lg:w-1/2">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_id">Selecciona el
        usuario</label>
    <select name="user_id" id="user_id"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500">
        @foreach ($usuarios as $user)
            @if ($user->id == $monedero->user_id || $user->id == old('user_id'))
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
<div class="lg:w-1/2">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="saldo">Saldo</label>
    <input
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
        type="number" name="saldo" id="saldo" class="form-control" placeholder="00,00 €"
        value="{{ old('saldo', $monedero->saldo) }}" required>
    @error('saldo')
        <div style="color:red">{{ $message }}</div>
    @enderror
</div>
