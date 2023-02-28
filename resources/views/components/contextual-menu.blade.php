   @props(['bgColor' => 'bg-red-200', 'link' => '#' ])

    <div id="contextMenuModal" class="absolute mt-1 w-48 z-30 " style="display:none;"  
        x-data="{project_id}"
        x-show="showContextMenu" 
        x-transition:enter="transition ease duration-100 transform" 
        x-transition:enter-start="opacity-0 scale-90 translate-y-1" 
        x-transition:enter-end="opacity-100 scale-100 translate-y-0" 
        x-transition:leave="transition ease duration-100 transform" 
        x-transition:leave-start="opacity-100 scale-100 translate-y-0" 
        x-transition:leave-end="opacity-0 scale-90 translate-y-1">
        
        <span class="absolute top-0 left-0 w-2 h-2 bg-white transform rotate-45 -mt-1 ml-3 border-gray-300 border-l border-t z-20"></span>
        <div class="{{$bgColor}} overflow-auto rounded-lg shadow-md w-full z-10 py-2 border border-gray-300 text-gray-800 text-xs w-1/2">
            <ul class="list-reset">
                <li>
                    <a href="{{$link}}" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100" @click.prevent="showContextMenu=false">View Task</a>
                    <a href="#" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100" @click.prevent="showContextMenu=false">Edit Task</a>
                    <a href="#" class="px-4 py-1 flex hover:bg-gray-100 no-underline hover:no-underline transition-colors duration-100 text-red-500" @click.prevent="showContextMenu=false">Delete Task</a>
                </li>
            </ul>
        </div>
    </div>