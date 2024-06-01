<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password">Password</label>
    <input
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
        type="password" name="password" id="password" required>
    @error('password')
        <div style="color:red">{{ $message }}</div>
    @enderror
</div>

<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="password_confirmation">Confirma
        Password</label>
    <input
        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-500 focus:border-sky-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-sky-500 dark:focus:border-sky-500"
        type="password" name="password_confirmation" id="password_confirmation" required>
    @error('password_confirmation')
        <div style="color:red">{{ $message }}</div>
    @enderror
</div>
