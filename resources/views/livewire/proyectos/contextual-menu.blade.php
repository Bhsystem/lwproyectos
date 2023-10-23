<div>  
    <x-contextual-menu tittle="Opciones del proyecto">
        <slot>
            <li>
                <a href="{{$link}}"  class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100">
                    Ver Etapas
                </a>

                <a href="#" wire:click.prevent="shareProject()" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100">
                    Compartir Proyecto
                </a>


                <a href="#" wire:click.prevent="delayProject()" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100">
                    Aplazar Proyecto
                </a>                


                <a href="#" onclick="confirm('¿Está seguro?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProject()" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100 text-red-500">
                   Eliminar Proyecto
                </a>
            </li>
        </slot>
    </x-contextual-menu>

    @if($tableProject)

        <div x-data="{ open: @entangle('modalShare') }" class="fixed w-1/3 top-1/3 left-1/4 z-10">
            <div x-show="open" @click.outside="open = false" x-trap="open" class="bg-black/75 rounded p-5">
                <form class="bg-blue-200 p-5 w-1/2 mx-auto rounded shadow" wire:submit.prevent="submitShared({{$tableProject}})">
                    <h3>Compartir Proyectos</h3>
                    @if($sharedProject)
                    <ul>    
                        @foreach($sharedProject as $c)
                            <li><small>{{$c->user->name ?? 'usuario Eliminado'}}</small></li>
                        @endforeach
                    </ul>
                    @endif 
                    <div class="flex flex-col gap-2">
                        <label>
                            Personas
                        </label>
                        <select wire:model='usuario_id'>
                            <option value=""> Lista de Personas</option>
                            @foreach($this->managers as $user )
                                <option value="{{$user->id}}">{{$user->name}}</option> 
                            @endforeach
                        </select>

                        <x-jet-button>Compartir</x-jet-button>
                    </div>
                </form> 
            </div>
        </div>

       @if(session()->has('message')) 
           <div class="flex items-center justify-center bg-blue-500 text-white text-xl font-bold px-4 rounded" role="alert">
              <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
              <p>{{session('message')}}</p>
            </div>
        @endif
    @endif
</div>
