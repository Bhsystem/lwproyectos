<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Desplegable;
use App\Models\Proyecto;
use App\Models\User;
use Livewire\Component;

class Project extends Component
{   
    public $projectId;
    public $tableProject;
    public $tableUser;

    public $centro_costo;
    public $proyecto;
    public $prioridad;
    public $trabajo;
    public $escala;
    public $fecha_finalizacion;
    public $fecha_planteamiento;
    public $recompensa;
    public $estado;
    public $persona_id;

    public $desplegableCentro;
    public $desplegablePrioridad;
    public $desplegableTrabajo;
    public $desplegableEscala;
    public $desplegableRecompensa;
    public $desplegableEstado;

    public $desplegable;

    public $listeners = ['saveProject'];    

    public function rules(){


        if(auth()->user()->id == 5){
            return [
                'centro_costo'=> 'required',
                'proyecto'=> 'required',
                'prioridad'=> 'required',
                'trabajo'=> 'required',
                'escala'=> 'required',
                'fecha_planteamiento'=> 'required|date',
                'fecha_finalizacion'=> 'nullable|date',
                'recompensa'=> 'required', 
                'estado'=> 'nullable', 
            ];   
        }else{
            return [
                'centro_costo'=> 'required',
                'proyecto'=> 'required',
                'prioridad'=> 'required',
                'persona_id'=> 'required',
                'trabajo'=> 'required',
                'escala'=> 'required',
                'fecha_planteamiento'=> 'required|date',
                'recompensa'=> 'required', 
            ];
        }
        

    }

    public function render()
    {   
        $this->setValues();
        return view('livewire.proyectos.project');
    }

    public function mount()
    {
        $this->tableProject = Proyecto::find($this->projectId);
        $this->tableUser = User::get();
        
        $this->estado = $this->tableProject->estado;
        $this->persona_id = $this->tableProject->persona_id;
        $this->proyecto = $this->tableProject->proyecto;
        $this->prioridad = $this->tableProject->prioridad;
        $this->centro_costo = $this->tableProject->centro_costo;
        $this->trabajo = $this->tableProject->trabajo;
        $this->escala = $this->tableProject->escala;
        $this->recompensa = $this->tableProject->recompensa;
        $this->fecha_planteamiento = $this->tableProject->fecha_planteamiento;
        $this->fecha_finalizacion = $this->tableProject->fecha_finalizacion;
    }

    public function saveProject($id)
    {
        $this->submit($id);
    }

    public function submit($id = Null)
    {   

        if($this->fecha_finalizacion && auth()->user()->id == 5){
            $this->estado = 'Finalizado';
        }
        
        $validated = $this->validate();
        Proyecto::updateOrCreate(['id' => $id],$validated,[ 'estado' => $this->estado]);

    }

    public function setValues(){
        $this->desplegable = Desplegable::get();
        $this->desplegableCentro = $this->desplegable->where('tipo','centro de Costo');
        $this->desplegablePrioridad = $this->desplegable->where('tipo','Prioridad');
        $this->desplegableTrabajo = $this->desplegable->where('tipo','Trabajo');
        $this->desplegableEscala = $this->desplegable->where('tipo','Escala'); 
        $this->desplegableRecompensa = $this->desplegable->where('tipo','Recompensa');
        $this->desplegableEstado = $this->desplegable->where('tipo','Estado');
    } 
}
