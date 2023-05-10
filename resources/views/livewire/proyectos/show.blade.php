<div class="p-5">
    <button wire:click="backTo()" onclick="history.back()" class="btn bg-red-600 text-white  border-red-100 border-2 p-2 rounded-md hover:text-red-800 hover:bg-red-400 hover:shadow-2xl">Regresar</button>
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
                
            </div>
            <div>
                <p class="text-xl text-center">Etapas del Proyecto</p>
            </div>
                      

            <div class="flex justify-end my-2 gap-2" x-data="buttons">
                <button x-show="open" wire:click="newEtapa()" @click="toggle" class="btn bg-blue-300 hover:bg-blue-500 hover:text-white">Agregar</button>  

                <button wire:click="saveEtapa()" @click="toggleClose" class="btn bg-green-500 hover:bg-green-800 hover:text-white">Guardar</button>
            </div>
        </div>
        <livewire:proyectos.table :projectId="$tableProyecto->id" />
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('alpine:init',() =>{
        Alpine.data('buttons',() => ({
            open:true,

            toggle(){
                this.open = ! this.open;
                
                console.log(this.open); 
            },

            toggleClose(){
                this.open = true;
                
                console.log(this.open); 
            }

        }))
    })
</script>