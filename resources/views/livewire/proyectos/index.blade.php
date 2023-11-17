<div class="p-5">
    {{-- The Master doesn't talk, he acts. --}}

    {{-- Barra de accion --}}
    <div x-data="{showContextMenu:false}">

        <div class="flex justify-between items-end shadow bg-gray-200 py-3 px-5 rounded rounded-t" @click.away="showContextMenu=false">
            <div>
                <h1 class="text-center font-bold text-2xl">Proyectos</h1>
            </div>
            {{--No se que es <div>{{session('search')}}</div> --}}
            <div>
                <label for="select">estado del Proyecto</label><br>
                <select name="select" class="lw-select " wire:model="status">
                    <option>Activo</option>
                    <option>Aplazado</option>
                    <option>Finalizado</option>
                    <option>Todos</option>
                </select>
            </div>        
            @if(auth()->user()->id == 5)
            <div>
                <label for="select">Persona Responsable</label><br>
                <select name="select" class="lw-select" wire:model="manager">
                        <option value="">Todos</option>
                    @foreach($this->managers as $user )
                        <option value="{{$user->id}}">{{$user->name}}</option> 
                    @endforeach

                </select>
            </div>
            @endif

            <div class="justify-end px-3 ">
                <x-input-search type="text" wire:model="search" placeholder="Buscar" class="self-end "/>
            </div>

            <div>
                <a class="btn bg-blue-300  hover:bg-blue-500 hover:text-white" href="{{route('proyectos.create')}}">Crear Proyecto</a>
            </div>
        </div>

        {{-- Filtro de Busqueda --}}
            
        {{--Contenedor de tabla--}}
       <div class="w-60 md:w-full table-responsive">
            <livewire:proyectos.contextual-menu :managers="$this->managers"/>
            <table class="table table-simetric">
                <thead>
                    <tr class="cursor-alias">
                        @foreach($columns as $key => $column)
                            <th wire:click="sort('{{$column[0]}}')">
                                <div class="flex gap-1 "> 
                                {{$column[1]}} 

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
                <tbody>
                    @foreach($proyectos as $proyecto)
                    <tr class="hover:bg-gray-200 hover:font-bold cursor-pointer border-b-2 @if($proyecto->persona_id == auth::user()->id || auth::user()->id == 5) asd @else bg-blue-200 bg-opacity-25 @endif" 
                        x-on:contextmenu="$event.preventDefault();
                                          contextMenuPosition(); 
                                          $wire.emit('getTable',{{$proyecto->id}})
                                          showContextMenu=true;"  
                        @click.prevent="showContextMenu=false" wire:click="viewProject({{$proyecto->id}})">

                        <td class="hover:bg-gray-200 font-bold"><div class="truncate">{{$proyecto->proyecto}}</div></td>
                        <td><div class="truncate">{{$proyecto->user->name ?? 'Usuario Eliminado'}}</div></td>
                        <td><div class="truncate">{{$proyecto->trabajo}}</div></td>
                        <td><div class="truncate">{{$proyecto->prioridad}}</div></td>
                        <td>
                            <div class="truncate">
                                {!!$proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte') 
                                    ? ( $proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte')) > date('Y-m-d') 
                                        ? date('d/m/Y',strtotime($proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte'))) 
                                        : '<p class="text-red-800">'.date('d/m/Y',strtotime($proyecto->etapa->where('fecha_finalizacion',NULL)->min('fecha_corte'))).'</p>'
                                    : 'Sin Tarea Pendiente' !!}    
                            </div>
                        </td>
                        <td><div class="truncate">{{$proyecto->fecha_planteamiento ? date('d/m/Y',strtotime($proyecto->fecha_planteamiento)) : ''}}<div></td>
                        <td>
                            <div class="flex justify-between">
                                {{($proyecto->persona_id == auth::user()->id || auth::user()->id == 5) ? $proyecto->estado : 'Compartido' }} 
                                @if(count($proyecto->compartido) > 0) <x-icon-shared/> @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
