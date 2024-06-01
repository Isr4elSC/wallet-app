 <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->id }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ date('d-m-Y', strtotime($transaccion->fecha_transaccion)) }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->comercio->nombre }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->monedero->user->nombre }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->concepto }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->tipo_transaccion }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->estado }}
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         {{ $transaccion->cantidad }} €
     </td>
     <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
         <x-transacciones.acciones-admin :transaccion="$transaccion" />
     </td>
 </tr>
