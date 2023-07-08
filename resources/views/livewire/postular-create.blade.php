<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            <h3>Registro nueva Producto</h3>
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label value="Link Curriculom Vitae" class="font-bold" />
                        <x-input type="text" wire:model.defer="postular.ruta_cv" class="w-full" />
                        <x-input-error for="postular.ruta_cv" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label value="Puntaje rango(1-20)" class="font-bold" />
                        <x-input type="text" wire:model.defer="postular.puntaje" class="w-full" />
                        <x-input-error for="postular.puntaje" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="w-full">
                        <x-label for="estado" value="Estado de la  oferta" class="font-bold" />
                        <select id="estado" wire:model.defer="postular.estado" class="block w-full rounded-md py-3 px-4 pr-8 bg-gray-200 border border-gray-200 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">Aprobado</option>
                            <option value="2">Rechazado</option>
                        </select>
                        <x-input-error for="postular.estado" />
                    </div>
                </div>
                <div class="mt-6">
                    <x-label for="egresado" :value="__('egresado')" />
                    <select id="egresado" class="block mt-1 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                         wire:model.defer="postular.egresado_id" required>
                        <option value="">Select empresa</option>
                        @foreach ($egresados as $egresado)
                            <option value="{{ $egresado->id }}">{{ $egresado->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="postular.egresado_id" class="mt-2" />
                  </div>
                  <div class="mt-6">
                    <x-label for="trabajo" :value="__('trabajo')" />
                    <select id="trabajo" class="block mt-1 appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                         wire:model.defer="postular.trabajo_id" required>
                        <option value="">Select trabajo</option>
                        @foreach ($trabajos as $trabajo)
                            <option value="{{ $trabajo->id }}">{{ $trabajo->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="postular.trabajo_id" class="mt-2" />
                  </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isOpen',false)" class="mx-2">Cancelar</x-secondary-button>
            <x-button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store"
                class="disabled:opacity-25">
                Registrar
            </x-button>
        </x-slot>

    </x-dialog-modal>
</div>
