<div>
    <table class="table table-responsive">
        <thead>
            <tr>
               @foreach($rows as $id => $row)
                <th wire:click="sort('{{$id}}')" class="{{$row[1]}}">{{$row[0]}}</th>
               @endforeach
            </tr>
        </thead>
        <tbody class="max-h-[31rem]" x-data>
            {{-- Seccion para agergar nuevo elemento --}}
            <tr class="bg-emerald-200 " x-data="{ open: @entangle('newRow') }" x-show="open">
                <td class="w-2/12 py-2">
                    <select wire:model="eEstado.0" required class="input-table">
                        <option>Tipo de Trabajo</option>
                        <optgroup label="Tipos de Trabajo">
                        @foreach($procesos as $pr)
                            <option>{{$pr}}</option>
                        @endforeach 
                        </optgroup>     
                    </select>
                </td>
                <td class="w-3/12"><input type="text" wire:model="eDescription.0" class="input-table" /></td>
                <td class="w-3/12"><input type="text" wire:model="ePendiente.0" wire:click="modalArea()"class="input-table" /></td>
                <td class="w-1/12"><input type="date" wire:model="eCorte.0" class="input-table" /></td>
                <td class="w-1/12"><input type="date" wire:model="ePlanteam.0" class="input-table" /></td>
                <td class="w-1/12">@if(auth()->user()->id == 5)
                    <input type="date" wire:model="efinalizacion.0" class="input-table" />
                    @endif
                </td>
                <td class="w-1/12"></td>
            </tr>

            {{-- Seccion de los elementos existentes  --}}
            @foreach($etapasTable as $etapas)
             <tr  x-init="$wire.setColor({{$etapas->trabajo}}), console.log('{{$etapas->trabajo}}')" class="hover:bg-gray-200 color{{array_search($etapas->trabajo, $color)}}">
                <td class="w-2/12">
                    <select wire:model="eEstado.{{ $etapas->id }}" :key="{{$etapas->id}}" class="input-table">
                        <option>{{$etapas->estado ?? "Tipo de Trabajo"}}</option>
                        <optgroup label="Tipos de Trabajo">
                            @foreach($procesos as $pr)
                                <option>{{$pr}}</option>
                            @endforeach 
                        </optgroup>
                    </select>
                </td>
                <td class="w-3/12">
                    <input type="text" wire:model="eDescription.{{ $etapas->id }}" class="input-table" />
                </td>
                <td class="w-3/12"> 
                    <input type="text" wire:model.lazy="ePendiente.{{ $etapas->id }}" wire:click="modalArea({{$etapas->id}})" class="input-table" />
                </td>
                <td class="w-1/12">
                    <input type="date" wire:model="eCorte.{{ $etapas->id }}" class="input-table" />
                </td>
                <td class="w-1/12">
                    <input type="date" wire:model="ePlanteam.{{ $etapas->id }}" class="input-table" />
                </td>
                <td class="w-1/12">@if(auth()->user()->id == 5)
                    <input type="date" wire:model="efinalizacion.{{ $etapas->id }}" class="input-table" />
                    @else
                        <p> {{($etapas->fecha_finalizacion)? date('d/m/Y',strtotime($etapas->fecha_finalizacion)): '--'}} </p>
                    @endif
                </td>
                <td class="w-1/12"><button class="btn-delete" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()" wire:click="deleteEtapa({{$etapas}})">Eliminar</button></td>
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


