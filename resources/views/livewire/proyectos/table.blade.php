<div>
    <table class="table">
        <thead>
            <tr>
               @foreach($rows as $id => $row)
                <th wire:click="sort('{{$id}}')">{{$row}}</th>
               @endforeach
            </tr>
        </thead>
        <tbody>
            <tr class="bg-emerald-200" x-data="{ open: @entangle('newRow') }" x-show="open">
                <td>
                    <select wire:model="eEstado.0" required class="lw-select w-full">
                        <option>Tipo de Trabajo</option>
                        <optgroup label="Tipos de Trabajo">
                        @foreach($procesos as $pr)
                            <option>{{$pr}}</option>
                        @endforeach 
                        </optgroup>     
                    </select>
                </td>
                <td><x-jet-input type="text" wire:model="eDescription.0" class="w-full"/></td>
                <td><x-jet-input type="text" wire:model="ePendiente.0" wire:click="modalArea()" class="w-full"/></td>
                <td><x-jet-input type="date" wire:model="eCorte.0" class="w-full"/></td>
                <td><x-jet-input type="date" wire:model="ePlanteam.0" class="w-full"/></td>
                <td>@if(auth()->user()->id == 5)
                    <x-jet-input type="date" wire:model="efinalizacion.0" class="w-full"/>
                    @endif
                </td>
            </tr>


            @foreach($etapasTable as $etapas)
             <tr>
                <td>
                    <select wire:model="eEstado.{{ $etapas->id }}" :key="{{$etapas->id}}" class="lw-select">
                        <option>{{$etapas->estado ?? "Tipo de Trabajo"}}</option>
                        <optgroup label="Tipos de Trabajo">
                            @foreach($procesos as $pr)
                                <option>{{$pr}}</option>
                            @endforeach 
                        </optgroup>
                    </select>
                </td>
                <td>
                    <x-jet-input type="text" wire:model="eDescription.{{ $etapas->id }}" class="w-full"/>
                </td>
                <td>
                    <x-jet-input type="text" wire:model.lazy="ePendiente.{{ $etapas->id }}" wire:click="modalArea({{$etapas->id}})"  class="w-full"/>
                </td>
                <td>
                    <x-jet-input type="date" wire:model="eCorte.{{ $etapas->id }}"  class="w-full"/>
                </td>
                <td>
                    <x-jet-input type="date" wire:model="ePlanteam.{{ $etapas->id }}"  class="w-full"/>
                </td>
                <td>@if(auth()->user()->id == 5)
                    <x-jet-input type="date" wire:model="efinalizacion.{{ $etapas->id }}"  class="w-full"/>
                    @else
                        {{($etapas->fecha_finalizacion)? date('d/m/Y',strtotime($etapas->fecha_finalizacion)): '--'}}
                    @endif
                </td>
                <td><button class="btn-delete" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()" wire:click="deleteEtapa({{$etapas}})">Eliminar</button></td>
             </tr>   
            @endforeach
        </tbody>
    </table>

    <div x-data="{ open: @entangle('modalArease') }" class="fixed w-1/2 top-1/3 left-1/4 z-10">
        <div x-show="open" @click.outside="open = false" x-trap="open" class="bg-black/75 rounded  p-2 ">
            <label class="text-white"> Pendiente Por realizar</label>
            <textarea x-text="$wire.ePendiente" wire:model.debounce.400ms="ePendiente.{{ $elementId ?? 0 }}" class="w-full rounded"></textarea>
        </div>
    </div>
</div>  