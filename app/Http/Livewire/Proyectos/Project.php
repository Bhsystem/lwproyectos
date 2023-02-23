<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use Livewire\Component;

class Project extends Component
{   
    public $projectId;
    public $tableProject; 

    public $centro_costo;
    public $proyecto;
    public $prioridad;
    public $trabajo;
    public $escala;
    public $fecha_finalizacion;
    public $fecha_planteamiento;
    public $recompensa;
    public $estado;

    public $listeners = ['saveProject'];    

    public function rules(){
        if(auth()->user()->id == 1){
            return [
                'centro_costo'=> 'required',
                'proyecto'=> 'required',
                'prioridad'=> 'required',
                'trabajo'=> 'required',
                'escala'=> 'required',
                'fecha_planteamiento'=> 'required|date',
                'recompensa'=> 'required', 
            ];   
        }else{
            return [
                'centro_costo'=> 'required',
                'proyecto'=> 'required',
                'prioridad'=> 'required',
                'trabajo'=> 'required',
                'escala'=> 'required',
                'fecha_planteamiento'=> 'required|date',
                'fecha_finalizacion'=> 'required|date',
                'recompensa'=> 'required', 
            ];
        }
        

    }
    public function render()
    {   
        return view('livewire.proyectos.project');
    }

    public function mount()
    {
        $this->tableProject = Proyecto::find($this->projectId);
        
        $this->estado = $this->tableProject->estado;
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
        $validated = $this->validate();
        //dd($validated);
        Proyecto::updateOrCreate(['id'=>$id],$validated);
    }
}
