<div class="p-5">
    <button wire:click="backTo()">Regresar</button>
    <livewire:proyectos.project :projectId="$tableProyecto->id" />

    <hr>
    
    
    <div class="my-2 bg-white m-auto rounded p-5">
        
        <div class=" h-10">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <x-jet-action-message on="successAlert">
                    <div class=" flex justify-center box-action-message">
                        <x-alert-blue message="{{$message}}"></x-alert-blue>
                    </div>
                </x-jet-action-message>
            </div> 
        </div> 

        <div class="grid grid-cols-3 gap-4">
            <div class="w-full">
                <button wire:click="saveEtapa()" class="btn bg-green-500 hover:bg-green-800 hover:text-white">Guardar</button>
                
            </div>
            <div>
                <p class="text-xl text-center">Etapas del Proyecto</p>
            </div>
            
            <div class="flex justify-end">
                <button wire:click="newEtapa()">Agregar</button>    
            </div>
        </div>
        <livewire:proyectos.table :projectId="$tableProyecto->id" />
    </div>
</div>