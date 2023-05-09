<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Desplegable;
use App\Models\Proyecto;
use App\Models\User;
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
    public $persona;

    public $desplegableResponsables;
    public $desplegableCentro;
    public $desplegablePrioridad;
    public $desplegableTrabajo;
    public $desplegableEscala;
    public $desplegableRecompensa;
    public $desplegableEstado;

    public $desplegable;

    protected $rules =[
        'centro_costo'=> 'required',
        'proyecto'=> 'required',
        'prioridad'=> 'required',
        'trabajo'=> 'required',
        'escala'=> 'required',
        'fecha_planteamiento'=> 'required|date',
        'recompensa'=> 'required',
    ];

    public function render()
    {   
        $this->setValues();
        return view('livewire.proyectos.save');
    }


    public function submit($id = Null)
    {   
        $persona_id = auth()->user()->id;

        if($this->persona){
            $persona_id = $this->persona;
        }

        $validated = $this->validate();
        
        $project = Proyecto::updateOrCreate(['id'=>$id, 'persona_id' => $persona_id],$validated)->id;
        
        return $this->redirect(back());

        if(!$id){
            return $this->redirect(route('proyectos.show',$project));
        }
    } 

    public function setValues(){

        $this->desplegableResponsables = User::select('id','name')->get();
        $this->desplegable = Desplegable::get();
        $this->desplegableCentro = $this->desplegable->where('tipo','centro de Costo');
        $this->desplegablePrioridad = $this->desplegable->where('tipo','Prioridad');
        $this->desplegableTrabajo = $this->desplegable->where('tipo','Trabajo');
        $this->desplegableEscala = $this->desplegable->where('tipo','Escala'); 
        $this->desplegableRecompensa = $this->desplegable->where('tipo','Recompensa');
        $this->desplegableEstado = $this->desplegable->where('tipo','Estado');
    } 


}
