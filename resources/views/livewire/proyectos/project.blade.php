    <div class="my-5">
        <x-jet-input-error for="proyecto"/>
        @error('estado') {{$message}} @enderror
        @error('proyecto') {{$message}} @enderror
        @error('prioridad') {{$message}} @enderror
        @error('centro_costo') {{$message}} @enderror
        @error('trabajo') {{$message}} @enderror
        @error('escala') {{$message}} @enderror
        @error('recompensa') {{$message}} @enderror
        @error('fecha_planteamiento') {{$message}} @enderror
        @error('fecha_finalizacion') {{$message}} @enderror
        
        <table class="table">
            <thead>
                <tr>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Proyecto</th>
                    <th class="p-2">Prioridad</th>
                    <th class="p-2">Centro de costo</th>
                    <th class="p-2">Trabajo</th>
                    <th class="p-2">Escala</th>
                    <th class="p-2">Recompensa</th>
                    <th class="p-2">Fecha de planteamiento</th>
                    <th class="p-2">Fecha de finalizacion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-2">     
                        <x-jet-input type="text" wire:model="estado" class="w-full" />
                    </td>
                    <td class="p-2">
                        <x-jet-input type="text" wire:model="proyecto" class="w-full" />
                    </td>
                    <td class="p-2">
                        <x-jet-input type="text" wire:model="prioridad" class="w-full" />
                    </td>
                    <td class="p-2">
                        <x-jet-input type="text" wire:model="centro_costo" class="w-full"
                         /></td>
                    <td class="p-2">
                        <x-jet-input type="text" wire:model="trabajo" class="w-full" />
                    </td>
                    <td class="p-2">
                        <x-jet-input type="text" wire:model="escala" class="w-full" />
                    </td>
                    <td class="p-2">
                        <x-jet-input type="text" wire:model="recompensa" class="w-full" />
                    </td>
                    <td class="p-2">
                        <x-jet-input type="date" wire:model="fecha_planteamiento" class="w
                        -full" /></td>
                    <td class="p-2">
                        <x-jet-input type="date" wire:model="fecha_finalizacion" class="w-
                        full" /></td>
                </tr>
            </tbody>
        </table>
    </div>