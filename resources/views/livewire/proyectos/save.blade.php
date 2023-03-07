<div class="p-10">
    <div class="relative m-5 flex justify-center">
        <h1 class="text-center text-2xl">Creacion de Nuevos Proyectos</h1>
        <div class="absolute top-0 right-0">
            <a href="{{route('proyectos.index')}}" class="px-2 border-2 rounded border-red-400 hover:bg-red-400 text-2xl text-red-700 hover:text-white">X</a>
        </div>

        <hr>
    </div>
   <div class="flex justify-center">
       <form wire:submit.prevent="submit" class="bg-white shadow p-10 rounded w-1/3"> 
           @if(auth()->user()->id == 5)
           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Responsable del Proyecto</x-jet-label>
               <select class="lw-select" wire:model="persona" >
                   <option value=""></option>
                  <optgroup label="Centro de Costo">
                      @foreach($desplegableResponsables as $id => $responsable)
                      <option value="{{$id}}">{{$responsable->name}}</option>
                      @endforeach
                  </optgroup>
               </select>
                <x-jet-input-error for="persona"/>
           </div>
           @endif            

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Centro de Costo</x-jet-label>
               <select class="lw-select" wire:model="centro_costo" >
                   <option value=""></option>
                  <optgroup label="Centro de Costo">
                      @foreach($desplegableCentro as $centro)
                      <option>{{$centro->descripcion}}</option>
                      @endforeach
                  </optgroup>
               </select>
                <x-jet-input-error for="centro_costo"/>
           </div> 

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Nombre del Proyecto</x-jet-label>
               <x-jet-input type="text" class="w-full" wire:model="proyecto"/>
                <x-jet-input-error for="proyecto"/>
           </div>   

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Prioridad</x-jet-label>
               <select class="lw-select" wire:model="prioridad">
                   <option></option>
                   <optgroup label="Prioridad">
                    @foreach($desplegablePrioridad as $prioridad)
                        <option>{{$prioridad->descripcion}}</option>
                    @endforeach
                   </optgroup>
               </select>
                <x-jet-input-error for="prioridad"/>
           </div>  

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Tipo de Trabajo</x-jet-label>
               <select class="lw-select" wire:model="trabajo">
                    <option></option>
                    <optgroup label="Trabajo">
                    @foreach($desplegableTrabajo as $trabajo)
                        <option>{{$trabajo->descripcion}}</option>
                    @endforeach
                   </optgroup>
               </select>
                <x-jet-input-error for="trabajo"/>
           </div>

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Escala del Proyecto</x-jet-label>
               <select class="lw-select" wire:model="escala">
                   <option value=""></option>
                   <optgroup label="escala">
                    @foreach($desplegableEscala as $escala)
                        <option>{{$escala->descripcion}}</option>
                    @endforeach
                   </optgroup>
               </select>
                <x-jet-input-error for="escala"/>
           </div>  

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Esfuerzo Recompenza</x-jet-label>
               <select class="lw-select" wire:model="recompensa">
                   <option value=""></option>
                   <optgroup label="Trabajo">
                    @foreach($desplegableRecompensa as $recompensa)
                        <option>{{$recompensa->descripcion}}</option>
                    @endforeach
                   </optgroup>
               </select>
               <x-jet-input-error for="recompensa"/>
           </div>   

           <div class="my-5">
               <x-jet-label class="text-indigo-300 font-bold">Fecha de Planteamiento</x-jet-label>
               <x-jet-input type="date" class="w-full" wire:model="fecha_planteamiento"/>
                <x-jet-input-error for="fecha_planteamiento"/>
           </div>

           <div class="my-5">
                <x-jet-button>Crear</x-jet-button>
           </div>
       </form>
   </div>
</div>

