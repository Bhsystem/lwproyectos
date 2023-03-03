<div>  
    <x-contextual-menu tittle="Opciones del proyecto">
        <slot>
            <li>
                <a href="{{$link}}"  class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100">
                    Ver Etapas
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
</div>
