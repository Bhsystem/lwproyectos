    <div class="my-5">
        {{-- <x-jet-input-error for="estado"/> --}}
        <ul>    
            @error('estado') <li>{{$message}}</li> @enderror
            @error('proyecto') <li>{{$message}}</li> @enderror
            @error('prioridad') <li>{{$message}}</li> @enderror
            @error('centro_costo') <li>{{$message}}</li> @enderror
            @error('trabajo') <li>{{$message}}</li> @enderror
            @error('escala') <li>{{$message}}</li> @enderror
            @error('recompensa') <li>{{$message}}</li> @enderror
            @error('fecha_planteamiento') <li>{{$message}}</li> @enderror
            @error('fecha_finalizacion') <li>{{$message}}</li> @enderror
        </ul>
        
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
                        <select class="lw-select" wire:model="estado" >
                          <option value=""></option>
                          <optgroup label="Estado">
                             <option>Activo</option>
                             <option>Aplazado</option>
                             <option>Finalizado</option>
                          </optgroup>
                        </select>
                    </td>

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
                        -full" /></td>
                    <td class="p-2">
                        <x-jet-input type="date" wire:model="fecha_finalizacion" class="w-
                        full" /></td>
                </tr>
            </tbody>
        </table>
    </div>