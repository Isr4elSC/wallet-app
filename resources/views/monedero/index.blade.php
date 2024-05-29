<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi monedero') }}
        </h2>
    </x-slot>

    @include('monedero.partials.saldo', ['saldo' => auth()->user()->monedero->saldo])
    @include('monedero.partials.transacciones', [
        'transacciones' => auth()->user()->monedero->transacciones,
    ])

</x-app-layout>
