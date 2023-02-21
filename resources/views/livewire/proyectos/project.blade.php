    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th class="p-2">Estado</th>
                    <th class="p-2">Proyecto</th>
                    <th class="p-2">Prioridad</th>
                    <th class="p-2">Centro de costo</th>
                    <th class="p-2">Trabajo</th>
                    <th class="p-2">Escala</th>
                    <th class="p-2">Recompenza</th>
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
                        <x-jet-input type="text" wire:model="recompenza" class="w-full" />
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