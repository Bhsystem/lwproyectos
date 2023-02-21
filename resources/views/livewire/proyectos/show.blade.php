<div class="p-5">

    <livewire:proyectos.project :projectId="$tableProyecto->id" />

    <hr>
    
    <div class="my-2 bg-white m-auto rounded p-5">
        <p class="text-xl text-center">Etapas del Proyecto</p>
        <div class="flex justify-between">
            
            <button wire:click="saveEtapa()">Guardar</button>
            
            
            @if ($mesage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $mesage }}
            </div>

            <button type="button" class="close" data-dismiss="alert"
                aria-label="Cerrar">
                <span aria-hidden="true">&times;</span>
            </button>
            
            @endif
            

            @if(count($tableEtapas) == 0)
                <button wire:click="newEtapa()">Agregar</button>
            @endif


                
        </div>
        <livewire:proyectos.table :projectId="$tableProyecto->id" />
    </div>

</div>