<div class="p-5">
    <div>
        navigation menu
    </div>

    <div class="md:grid md:grid-cols-3 gap-5">
        <div class="col-1">
            <h3 class>Proyectos Activos ({{count($proyectoPendiente)}} )</h3>
        @foreach($tableUsuarios as $t)
            <div x-data="{open : false}" class="shadow-2xl px-2 rounded bg-white ">
                <h4  @click="open = ! open" class="hover:text-blue-700 cursor-pointer font-semibold text-xl">{{$t->name}} ({{count($proyectoPendiente->where('persona_id',$t->id))}})</h4>
                @foreach($proyectoPendiente->where('persona_id',$t->id) as $pendiente)
                <div  x-show="open" class="text-justify shadow bg-gray-200 rounded my-2 py-2 px-5">
                    <div class="flex justify-between p-5">
                        <h4 class=" text-center">{{$pendiente->proyecto}}</h4>
                        <h4 class=" text-center">{{$pendiente->prioridad}}</h4>
                    </div>
                    <hr>
                    <div>
                        <ul class="list-disc">
                            <li class="list-item">Responsable: {{$pendiente->user->name ?? 'usuario Eliminado'}}</li>
                            <li class="list-item">Tipo de Trabajo: {{$pendiente->trabajo }}</li>
                            <li class="list-item">Centro de Costo: {{$pendiente->centro_costo }}</li>
                            <li class="list-item">Escala del Proyecto {{$pendiente->centro_costo }}</li>
                        </ul>
                        <hr>
                    </div>
                    <span class="flex justify-between">
                        <p>Fecha Planteamiento : {{$pendiente->fecha_planteamiento}}</p>
                        <p>Fecha Finalizacion : {{$pendiente->fecha_finalizacion}}</p>
                    </span>
                </div>
                @endforeach

                <hr>
            </div>        
        @endforeach
        </div> 


        {{-- Finalizados --}}
        <div class="col-1">
            <h3 class=>Proyectos Finalizados ({{count($proyectoFinalizado)}} )</h3>
        @foreach($tableUsuarios as $t)
             <div x-data="{open : false}" class="shadow-2xl px-2 rounded bg-white ">
               <h4  @click="open = ! open" class="hover:text-blue-700 cursor-pointer font-semibold text-xl">{{$t->name}} ({{count($proyectoFinalizado->where('persona_id',$t->id))}})</h4>
                @foreach($proyectoFinalizado->where('persona_id',$t->id) as $finalizado)
                  <div  x-show="open" class="text-justify shadow bg-gray-200 rounded my-2 py-2 px-5">
                    <div class="flex justify-between p-5">
                        <h4 class=" text-center">{{$finalizado->proyecto}}</h4>
                        <h4 class=" text-center">{{$finalizado->prioridad}}</h4>
                    </div>
                    <hr>
                    <div>
                        <ul class="list-disc">
                            <li class="list-item">Responsable: {{$finalizado->user->name ?? 'usuario Eliminado'}}</li>
                            <li class="list-item">Tipo de Trabajo: {{$finalizado->trabajo }}</li>
                            <li class="list-item">Centro de Costo: {{$finalizado->centro_costo }}</li>
                            <li class="list-item">Escala del Proyecto {{$finalizado->centro_costo }}</li>
                        </ul>
                        <hr>
                        <span class="flex justify-between">
                            <p>Fecha Planteamiento : {{$finalizado->fecha_planteamiento}}</p>
                            <p>Fecha Finalizacion : {{$finalizado->fecha_finalizacion}}</p>
                        </span>
                        </div>
                </div>
                @endforeach
                <hr>
            </div>        
        @endforeach
        </div>        

        {{-- Aplazado --}}
        <div class="col-1">
            <h3 class=>Proyectos Aplazado ({{count($proyectoAplazado)}} )</h3>
            
            @foreach($tableUsuarios as $t)
            <div x-data="{open : false}" class="shadow-2xl px-2 rounded bg-white ">
               <h4  @click="open = ! open" class="hover:text-blue-700 cursor-pointer font-semibold text-xl">{{$t->name}} ({{count($proyectoAplazado->where('persona_id',$t->id))}})</h4>
                @foreach($proyectoAplazado->where('persona_id',$t->id) as $aplazado)
                      <div  x-show="open" class="text-justify shadow bg-gray-200 rounded my-2 py-2 px-5">
                        <div class="flex justify-between p-5">
                            <h4 class=" text-center">{{$aplazado->proyecto}}</h4>
                            <h4 class=" text-center">{{$aplazado->prioridad}}</h4>
                        </div>
                        <hr>
                        <div>
                            <ul class="list-disc">
                                <li class="list-item">Responsable: {{$aplazado->user->name ?? 'usuario Eliminado'}}</li>
                                <li class="list-item">Tipo de Trabajo: {{$aplazado->trabajo }}</li>
                                <li class="list-item">Centro de Costo: {{$aplazado->centro_costo }}</li>
                                <li class="list-item">Escala del Proyecto {{$aplazado->centro_costo }}</li>
                            </ul>
                            <hr>
                        </div>
                        <span class="flex justify-between">
                            <p>Fecha Planteamiento : {{$aplazado->fecha_planteamiento}}</p>
                            <p>Fecha Finalizacion : {{$aplazado->fecha_finalizacion}}</p>
                        </span>
                    </div>
                @endforeach
                <hr>
            </div>
            @endforeach
        </div>
    </div>


</div>
