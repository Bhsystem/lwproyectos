<x-contextual-menu tittle="Opciones del proyecto">
    <slot>
        <li>
            <a href="{{$link}}"  class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100">
                View Task
            </a>
            <a href="#" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100">
                Edit Task
            </a>
            <a href="#" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100 text-red-500">   Delete Task
            </a>
        </li>
    </slot>
</x-contextual-menu>
