    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($transacciones as $transaccion)
                        @if ($transaccion->tipo == 'ingreso')
                            <p class="text-green-500">+{{ $transaccion->cantidad }} €</p>
                        @else
                            <p class="text-red-500">-{{ $transaccion->cantidad }} €</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
