 <div class="py-5 flex gap-3">
     <div>
         <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-green-500 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300"
             href="{{ route('comercios.index') }}">
             <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" width="18" height="18" viewBox="0 0 24 24"
                 stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path d="M9 14l-4 -4l4 -4" />
                 <path d="M5 10h11a4 4 0 1 1 0 8h-1" />
             </svg>
             </svg> Volver</a>

     </div>
     <div>

         <a class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-sky-500 rounded-lg hover:bg-sky-600 focus:ring-4 focus:outline-none focus:ring-sky-300"
             href="{{ route('comercios.edit', $comercio) }}"><svg class="w-4 h-4 mr-2" fill="currentColor"
                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                 </path>
                 <path fill-rule="evenodd"
                     d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                     clip-rule="evenodd"></path>
             </svg> Editar</a>

     </div>
     <div>

         <form method="POST" action="{{ route('comercios.destroy', $comercio) }}">
             @csrf
             @method('DELETE')
             <button type="submit"
                 class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300"
                 type="submit"><svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd"
                         d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                         clip-rule="evenodd"></path>
                 </svg>
                 Eliminar</button>
         </form>
     </div>
 </div>
