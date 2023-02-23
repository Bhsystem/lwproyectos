<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use Livewire\Component;

class Save extends Component
{
    public $centro_costo;
    public $proyecto;
    public $prioridad;
    public $trabajo;
    public $escala;
    public $fecha_finalizacion;
    public $fecha_planteamiento;
    public $recompensa;
    public $estado;

    protected $rules =[
        'centro_costo'=> 'required',
        'proyecto'=> 'required',
        'prioridad'=> 'required',
        'trabajo'=> 'required',
        'escala'=> 'required',
        'fecha_planteamiento'=> 'required|date',
        'recompensa'=> 'required',
    ];

    public function submit($id = Null)
    {
        dd($validated = $this->validate());
        $project = Proyecto::updateOrCreate(['id'=>$id, 'persona_id' => auth()->user()->id],$validated)->id;
        ($project);
        if(!$id){
            return $this->redirect(route('proyectos.show',$project));
        }
    }
}
