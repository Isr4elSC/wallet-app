     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         @auth
             @if ($transaccion->estado == 'Pendiente')
                 <div class="flex flex-nowrap gap-2 justify-center">
                     <div>
                         <form action="{{ route('venta.pagar', $transaccion) }}" method="POST">
                             @csrf
                             @method('patch')
                             <input type="hidden" name="transaccion_id" id="transaccion_id" value="{{ $transaccion->id }}">
                             <button type="submit"
                                 class="px-3 py-2 text-xs uppercase font-medium text-center inline-flex items-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 Pagar
                             </button>
                         </form>
                     </div>
                     <div>
                         <form action="{{ route('venta.rechazar', $transaccion) }}" method="POST">
                             @csrf
                             @method('patch')
                             <input type="hidden" name="transaccion_id" id="transaccion_id" value="{{ $transaccion->id }}">
                             <button type="submit"
                                 class="px-3 py-2 text-xs uppercase font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                 Rechazar
                             </button>
                         </form>
                     </div>
                 </div>
             @endif
         @endauth
     </td>
     </tr>
