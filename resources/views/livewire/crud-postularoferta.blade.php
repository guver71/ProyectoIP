<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <div class="flex items-center justify-between">
            <!--Input de busqueda   -->
            <div class="flex items-center p-2 rounded-md flex-1">
                <label class="w-full relative text-gray-400 focus-within:text-gray-600 block">
                    <svg class="pointer-events-none w-8 h-8 absolute top-1/2 transform -translate-y-1/2 left-3" viewBox="0 0 25 25"  fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <x-input type="text" wire:model="search" class="w-full block pl-14" placeholder="Buscar equipo..."/>
                </label>
            </div>
        </div>
        <!--Tabla lista de items   -->
        <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-indigo-500 text-white">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">FECHA PUBLICACION</td>
                  <td scope="col" class="px-6 py-3">CATEGORIA</td>
                  <td scope="col" class="px-6 py-3">DESCRIPTION</td>
                  <td scope="col" class="px-6 py-3">SALARIO</td>
                  <td scope="col" class="px-6 py-3">FECHA INICIO</td>
                  <td scope="col" class="px-6 py-3">FECHA FIN</td>
                  <td scope="col" class="px-6 py-3">REQUIERE EXPERIENCIA</td>
                  <td scope="col" class="px-6 py-3">MODALIDAD TIEMPO</td>
                  <td scope="col" class="px-6 py-3">BENEFICIOS</td>
                  <td scope="col" class="px-6 py-3">DATOS CONTACTO</td>
                  <td scope="col" class="px-6 py-3">TITULO</td>
                  <td scope="col" class="px-6 py-3">ANTECEDENTES</td>
                  <td scope="col" class="px-6 py-3">ESTADO</td>
                  <td scope="col" class="px-6 py-3">OPCIONES</td>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
                @foreach ($postularofertas as $item)
                <tr class="text-sm font-medium text-gray-900">
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-500 text-white">
                      {{$item->id}}
                    </span>
                  </td>
                  <td class="px-6 py-4">{{$item->fecha_publication}}</td>
                  <td class="px-6 py-4">{{$item->categoria}}</td>
                  <td class="px-6 py-4">{{$item->description}}</td>
                  <td class="px-6 py-4">{{$item->salario}}</td>
                  <td class="px-6 py-4">{{$item->fecha_inicio}}</td>
                  <td class="px-6 py-4">{{$item->fecha_fin}}</td>
                  <td class="px-6 py-4">{{$item->requiere_experiencia}}</td>
                  <td class="px-6 py-4">{{$item->modalidad_tiempo}}</td>
                  <td class="px-6 py-4">{{$item->beneficios}}</td>
                  <td class="px-6 py-4">{{$item->datos_contacto}}</td>
                  <td class="px-6 py-4">{{$item->titulo}}</td>
                  <td class="px-6 py-4">{{$item->antecedentes}}</td>
                  <td class="px-6 py-4">{{$item->estado}}</td>
                  <td class="px-6 py-4">
                    <button wire:click="create()" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" >
                        <i class=""></i> Postular
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$postularofertas->count())
            No existe ningun registro conincidente
        @endif
        @if($postularofertas->hasPages())
            <div class="px-6 py-3">
            {{$postularofertas->links()}}
            </div>
        @endif
        </div>
      </div>

      <!--Scripts - Sweetalert   -->
      @push('js')
        <script>
          Livewire.on('deleteItem',id=>{
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
              }).then((result) => {
                if (result.isConfirmed) {
                    //alert("del");
                    Livewire.emitTo('crud-team','delete',id);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                }
              })
          });
        </script>
      @endpush
</div>
