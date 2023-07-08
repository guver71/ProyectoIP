<div>
    <x-dialog-modal wire:model="isOpen">
        <x-slot name="title">
            <h3>Registro nueva Oferta Laboral</h3>
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="fecha_publication" value="Fecha Publicación" class="font-bold" />
                        <x-input type="date" wire:model.defer="creartrabajo.fecha_publication" id="fecha_publication" class="w-full" />
                        <x-input-error for="creartrabajo.fecha_publication" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="categoria" value="Descripción Categoría" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.categoria" id="categoria" class="w-full" />
                        <x-input-error for="creartrabajo.categoria" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="description" value="Descripción Empleo" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.description" id="description" class="w-full" />
                        <x-input-error for="creartrabajo.description" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="salario" value="Salario Mensual" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.salario" id="salario" class="w-full" />
                        <x-input-error for="creartrabajo.salario" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="fecha_inicio" value="Fecha Inicio" class="font-bold" />
                        <x-input type="date" wire:model.defer="creartrabajo.fecha_inicio" id="fecha_inicio" class="w-full" />
                        <x-input-error for="creartrabajo.fecha_inicio" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="fecha_fin" value="Fecha Fin" class="font-bold" />
                        <x-input type="date" wire:model.defer="creartrabajo.fecha_fin" id="fecha_fin" class="w-full" />
                        <x-input-error for="creartrabajo.fecha_fin" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="w-full">
                        <x-label for="requiere_experiencia" value="Requiere Experiencia" class="font-bold" />
                        <select id="requiere_experiencia" wire:model.defer="creartrabajo.requiere_experiencia" class="block w-full rounded-md py-3 px-4 pr-8 bg-gray-200 border border-gray-200 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                        <x-input-error for="creartrabajo.requiere_experiencia" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="w-full">
                        <x-label for="modalidad_tiempo" value="Modalidad Tiempo de Trabajo" class="font-bold" />
                        <select id="modalidad_tiempo" wire:model.defer="creartrabajo.modalidad_tiempo" class="block w-full rounded-md py-3 px-4 pr-8 bg-gray-200 border border-gray-200 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">Tiempo Completo</option>
                            <option value="2">Medio Tiempo</option>
                        </select>
                        <x-input-error for="creartrabajo.modalidad_tiempo" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="beneficios" value="Beneficios" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.beneficios" id="beneficios" class="w-full" />
                        <x-input-error for="creartrabajo.beneficios" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="datos_contacto" value="Datos de Contacto" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.datos_contacto" id="datos_contacto" class="w-full" />
                        <x-input-error for="creartrabajo.datos_contacto" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="titulo" value="Título" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.titulo" id="titulo" class="w-full" />
                        <x-input-error for="creartrabajo.titulo" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="mb-2 md:mr-2 md:mb-0 w-full">
                        <x-label for="antecedentes" value="Antecedentes" class="font-bold" />
                        <x-input type="text" wire:model.defer="creartrabajo.antecedentes" id="antecedentes" class="w-full" />
                        <x-input-error for="creartrabajo.antecedentes" />
                    </div>
                </div>
                <div class="flex justify-between mx-2 mb-6">
                    <div class="w-full">
                        <x-label for="estado" value="Estado de la trabajo Trabajo" class="font-bold" />
                        <select id="estado" wire:model.defer="creartrabajo.estado" class="block w-full rounded-md py-3 px-4 pr-8 bg-gray-200 border border-gray-200 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="1">ACTIVO</option>
                            <option value="2">INACTIVO</option>
                        </select>
                        <x-input-error for="creartrabajo.estado" />
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isOpen', false)" class="mx-2">Cancelar</x-secondary-button>
            <x-button wire:click.prevent="store()" wire:loading.attr="disabled" wire:target="store" class="disabled:opacity-25">
                Registrar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
