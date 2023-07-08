<div class="py-5">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
        <div class="flex items-center justify-between">
            <!--Boton nuevo   -->
            <div class="lg:ml-40 ml-10 space-x-8">
                    <button wire:click="create()" class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer" >
                        <i class="fa-solid fa-plus"></i> Crear trabajo
                    </button>
                    @if($isOpen)
                        @include('livewire.crearoferta-create')
                    @endif
            </div>
        </div>
        <!--Tabla lista de items   -->
        <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 table-auto">
              <thead class="bg-indigo-500 text-white">
                <tr class="text-left text-xs font-bold  uppercase">
                  <td scope="col" class="px-6 py-3">ID</td>
                  <td scope="col" class="px-6 py-3">FECHA PUBLICACION</td>
                  <td scope="col" class="px-6 py-3">CATEGORI</td>
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
                @foreach ($creartrabajos as $item)
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
                    {{-- @livewire('cliente-edit',['cliente'=>$item],key($item->id)) --}}
                    <x-button wire:click="edit({{$item}})">
                        <i class="fas fa-edit"></i>
                    </x-button>
                    <x-danger-button wire:click="$emit('deleteItem',{{$item->id}})"> <!-- Usamos metodos magicos -->
                        <i class="fas fa-trash"></i>
                    </x-danger-button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </div>
        @if(!$creartrabajos->count())
            No existe ningun registro conincidente
        @endif
        @if($creartrabajos->hasPages())
            <div class="px-6 py-3">
            {{$creartrabajos->links()}}
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
