    <div class="my-5">


        @if(count($errors) > 0)
            <div x-data="{ shown: false }"
                 x-init="clearTimeout(2000); shown = true; timeout = setTimeout(() => { shown = false }, 2000);"
                 x-show.transition.out.opacity.duration.1500ms="shown" 
                 x-transition:leave.opacity.duration.1500ms>
                <div class="fixed z-10 p-1 mt-1 bg-zinc-100 rounded-md">
                    <h3 class="text-xl">
                        <x-jet-input-error for="estado"/>
                        <x-jet-input-error for="proyecto"/>
                        <x-jet-input-error for="prioridad"/>
                        <x-jet-input-error for="centro_costo"/>
                        <x-jet-input-error for="trabajo"/>
                        <x-jet-input-error for="escala"/>
                        <x-jet-input-error for="recompensa"/>
                        <x-jet-input-error for="fecha_planteamiento"/>
                        <x-jet-input-error for="fecha_finalizacion"/>
                    </h3>
                </div>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th class="p-2">Proyecto</th>
                    <th class="p-2">Prioridad</th>
                    <th class="p-2">Responsable</th>
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
                        <x-jet-input type="text" wire:model="proyecto" class="w-full" />
                    </td>

                    <td class="p-2">
                        <select class="lw-select" wire:model="prioridad">
                           <option></option>
                           <optgroup label="Prioridad">
                            @foreach($desplegablePrioridad as $prioridad)
                                <option>{{$prioridad->descripcion}}</option>
                            @endforeach
                           </optgroup>
                       </select>
                    </td>
                    
                    <td class="p-2">
                        <select class="lw-select" wire:model="persona_id" >
                          <option value="{{$usuario ?? ''}}">Responsable</option>
                          <optgroup label="Centro de Costo">
                              @foreach($tableUser as $tu)
                              <option value="{{$tu->id}}">{{$tu->name}}</option>
                              @endforeach
                          </optgroup>
                        </select>
                    </td>

                    <td class="p-2">
                        <select class="lw-select" wire:model="centro_costo" >
                          <option value=""></option>
                          <optgroup label="Centro de Costo">
                              @foreach($desplegableCentro as $centro)
                              <option>{{$centro->descripcion}}</option>
                              @endforeach
                          </optgroup>
                        </select>
                    </td>                    


                    <td class="p-2">
                        <select class="lw-select" wire:model="trabajo">
                            <option></option>
                            <optgroup label="Trabajo">
                            @foreach($desplegableTrabajo as $trabajo)
                                <option>{{$trabajo->descripcion}}</option>
                            @endforeach
                           </optgroup>
                       </select>
                    </td>
                    <td class="p-2">
                        <select class="lw-select" wire:model="escala">
                           <option value=""></option>
                           <optgroup label="escala">
                            @foreach($desplegableEscala as $escala)
                                <option>{{$escala->descripcion}}</option>
                            @endforeach
                           </optgroup>
                       </select>
                    </td>
                    <td class="p-2">
                        <select class="lw-select" wire:model="recompensa">
                           <option value=""></option>
                           <optgroup label="Trabajo">
                            @foreach($desplegableRecompensa as $recompensa)
                                <option>{{$recompensa->descripcion}}</option>
                            @endforeach
                           </optgroup>
                       </select>
                    </td>
                    <td class="p-2">
                        <x-jet-input type="date" wire:model="fecha_planteamiento" class="w
                        -full" />

                    </td>
                    <td class="p-2">
                        <x-jet-input type="date" wire:model="fecha_finalizacion" class="w-
                        full" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>