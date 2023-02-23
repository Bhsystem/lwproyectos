<div class="p-5">
    <button wire:click="backTo()">Regresar</button>
    <livewire:proyectos.project :projectId="$tableProyecto->id" />

    <hr>
    
    
    <div class="my-2 bg-white m-auto rounded p-5">
        <p class="text-xl text-center">Etapas del Proyecto</p>
        <div class="flex justify-between">
            
            <button wire:click="saveEtapa()" class="btn bg-green-500 hover:bg-green-800 hover:text-white">Guardar</button>
            
            
            @if ($mesage)
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ $mesage }}
            </div> 
            @endif
            <button wire:click="newEtapa()">{{$buttonNew}}</button>    
        </div>
        <livewire:proyectos.table :projectId="$tableProyecto->id" />
    </div>
</div>