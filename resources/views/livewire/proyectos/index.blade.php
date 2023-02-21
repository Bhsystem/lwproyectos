<div class="p-5">
    {{-- The Master doesn't talk, he acts. --}}
    
    {{-- Barra de accion --}}
    <div class="flex justify-between shadow bg-gray-200 p-2 rounded">
        <div>
            <h1>Proyectos</h1>
        </div>
        <div>
            <label for="select">estado del Proyecto</label><br>
            <select name="select" class="w-full" wire:model="status">
                <option>Activo</option>
                <option>Aplazado</option>
                <option>Finalizado</option>
                <option value="">Todos</option>
            </select>
        </div>        

        <div>
            <label for="select">Persona Responsable</label><br>
            <select name="select" class="w-full" wire:model="manager">
                    <option value="">Todos</option>
                @foreach($this->managers as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option> 
                @endforeach

            </select>
        </div>
        <div>
            <a href="{{route('proyectos.create')}}">Crear Proyecto</a>
        </div>
    </div>

    {{-- Filtro de Busqueda --}}
        <div class="bg-white flex justify-end pt-5">
            <x-input-search type="text" wire:model="search" placeholder="Buscar" class="self-end "/>
        </div>
    {{--Contenedor de tabla--}}
    <div class=" bg-red-200">


        <table class="w-full border-2 border-black">
            <thead class="w-90">
                <tr class="py-2 bg-black text-white text-left">
                    @foreach($columns as $key => $column)
                        <th class="py-2 w-1" wire:click="sort('{{$key}}')">
                            <div class="flex gap-1"> 
                            {{$column}}

                            @if($this->sortOrder == 'asc' && $this->sortColumn == $key)
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                </svg>
                            @endif

                            @if($this->sortOrder == 'desc' && $this->sortColumn == $key )
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                                  <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                                </svg>
                            @endif
                                                    
                            </div>
                        </th>       
                    @endforeach
                </tr>
            </thead>
            <tbody class="bg-white overflow-auto">
                @foreach($proyectos as $proyecto)
                <tr class="hover:bg-gray-200 hover:font-bold" wire:click="viewProject({{$proyecto->id}})">
                    <td class="p-2">{{$proyecto->proyecto}}</td>
                    <td>{{$proyecto->user->name ?? 'Usuario Eliminado'}}</td>
                    <td>{{$proyecto->centro_costo}}</td>
                    <td>{{$proyecto->trabajo}}</td>
                    <td>{{$proyecto->prioridad}}</td>
                   
                        @if($proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte') > date('Y-m-d'))
                         
                           <td>{{date('d/m/Y',strtotime($proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte')))}}</td>
                        @elseif(is_null($proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte')))
                            <td>sin Tareas pendientes</td>
                        @else
                            <td class="text-red-500">{{date('d/m/Y',strtotime($proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte')))}}</td>
                        @endif
                    
                    <td>@if($proyecto->fecha_planteamiento){{date('d/m/Y',strtotime($proyecto->fecha_planteamiento))}}@endif</td>
                    <td>{{$proyecto->recompensa}}</td>
                    <td>{{$proyecto->escala}}</td>
                    <td>{{$proyecto->estado}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
