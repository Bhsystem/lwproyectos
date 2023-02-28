<div class="p-5">
    {{-- The Master doesn't talk, he acts. --}}

    {{-- Barra de accion --}}
    <div x-data="{showContextMenu:false}">
        
        <div class="flex justify-between shadow bg-gray-200 py-3 px-5 rounded rounded-t" @click.away="showContextMenu=false">
            <div>
                <h1>Proyectos</h1>
            </div>

            <div>
                <label for="select">estado del Proyecto</label><br>
                <select name="select" class="lw-select " wire:model="status">
                    <option>Activo</option>
                    <option>Aplazado</option>
                    <option>Finalizado</option>
                    <option value="">Todos</option>
                </select>
            </div>        

            <div>
                <label for="select">Persona Responsable</label><br>
                <select name="select" class="lw-select" wire:model="manager">
                        <option value="">Todos</option>
                    @foreach($this->managers as $user )
                        <option value="{{$user->id}}">{{$user->name}}</option> 
                    @endforeach

                </select>
            </div>
            <div class="my-auto">
                <a class="btn bg-blue-300 my-1 hover:bg-blue-500 hover:text-white" href="{{route('proyectos.create')}}">Crear Proyecto</a>
            </div>
        </div>

        {{-- Filtro de Busqueda --}}
            <div class="bg-white flex justify-end px-5 ">
                <x-input-search type="text" wire:model="search" placeholder="Buscar" class="self-end "/>
            </div>

        {{--Contenedor de tabla--}}
       <div role="region" aria-labelledby="HeadersRow" tabindex="0" class="colheaders">
            <table class="w-full border-2 border-black">
                <thead class="w-90">
                    <tr class="py-2 bg-black text-white text-left cursor-alias">
                        @foreach($columns as $key => $column)
                            <th class="py-2 w-1" wire:click="sort('{{$key}}')" >
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
                    <tr class="hover:bg-gray-200 hover:font-bold cursor-pointer" x-data="{porject_id : 10}" x-on:contextmenu="$event.preventDefault();contextMenuPosition('blue');showContextMenu=true"  @click.prevent="showContextMenu=false" wire:click="viewProject({{$proyecto->id}})">
                        <th scope="row" class="p-2 hover:bg-gray-200">{{$proyecto->proyecto}}</th>
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
        {{-- <livewire:proyectos.contextual-menu projectId="1" /> --}}
        <x-contextual-menu link=""/>

    </div>

</div>

<script>
    var menu = document.getElementById("contextMenuModal")

        function contextMenuPosition($color){
            var e = window.event;
            menu.style.left = e.x + "px" ;
            menu.style.top = e.y + "px" ;
        }    
</script>








{{-- Borrar esta mamada --}}

{{-- <div x-data="juego()">
    <h1 >
        <span x-text="intentos"></span>
        Intentos
    </h1>
    <div class="grid grid-cols-3 w-44">
        <template x-for="(carta, index) in cartas" :key="index">                
                <div class="bg-amber-500 w-10 p-2 m-2" @click="voltear(carta)">                        
                    <button>
                        <i x-bind:class="(carta.volteada ? carta.icon : '')"></i>
                    </button>                        
                </div>                
        </template>
    </div>    
</div>

<div id="dialogo" x-data="{show:true, message:''}" x-show="show" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
        >
            <h1 x-text="message"></h1>
</div>   

<script>
    function juego() {
        return {
            cartas: [
                { icon: 'fa-solid fa-baseball-bat-ball', volteada: false, encontrada: false },
                { icon: 'fa-solid fa-baseball-bat-ball', volteada: false, encontrada: false },
                { icon: 'fa-solid fa-medal', volteada: false, encontrada: false },
                { icon: 'fa-solid fa-medal', volteada: false, encontrada: false },                     
                { icon: 'fa-solid fa-bicycle', volteada: false, encontrada: false },
                { icon: 'fa-solid fa-bicycle', volteada: false, encontrada: false },                      
                ].sort(() => Math.random() - .5),
            intentos:0,
            voltear(carta) {
                carta.volteada = true ;  
                if( this.cartasVolteadas.length == 2 )
                {
                    this.intentos++;
                    if (this.cartasVolteadas[0].icon ==  this.cartasVolteadas[1].icon )
                    {
                        this.mensaje("Encontraste una pareja!!");     
                        this.cartasVolteadas.forEach(carta => carta.encontrada = true);
                        if (this.cartasEnJuego.length == 0) 
                        {
                            alert("Ganaste!!!");
                            // Resetear el juego
                            this.baraja.forEach(carta => {carta.volteada = false; carta.encontrada = false});
                        }                                       
                    }
                    else
                    {

                        setTimeout(() => 
                        {
                            this.cartasVolteadas.forEach(carta => carta.volteada = false);                                
                        }, 500);
                    }
                }                   
            },
            get cartasVolteadas() 
            {
                return this.cartas.filter(carta => (carta.volteada && !carta.encontrada));
            },    

            get cartasEnJuego()
            {
                return this.cartas.filter(carta => (!carta.encontrada));
            },

            get baraja()
            {
                return this.cartas;
            }   ,  
            mensaje(msg)
            {
                console.log(  msg );
                document.getElementById('dialogo')._x_dataStack[0].show = 1;
                document.getElementById('dialogo')._x_dataStack[0].message = msg;
                setInterval(() => {
                    document.getElementById('dialogo')._x_dataStack[0].show = 0;
                }, 2500);
            }                        
        }        
    };
</script> --}}