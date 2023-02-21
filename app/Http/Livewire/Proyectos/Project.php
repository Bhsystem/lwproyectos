<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use Livewire\Component;

class Project extends Save
{   
    public $projectId;
    public $tableProject;
    

    public $listeners = ['saveProject'];    

    public function render()
    {   
        return view('livewire.proyectos.project');
    }

    public function mount(){
        $this->tableProject = Proyecto::find($this->projectId);
        
        $this->estado = $this->tableProject->estado;
        $this->proyecto = $this->tableProject->proyecto;
        $this->prioridad = $this->tableProject->prioridad;
        $this->centro_costo = $this->tableProject->centro_costo;
        $this->trabajo = $this->tableProject->trabajo;
        $this->escala = $this->tableProject->escala;
        $this->recompenza = $this->tableProject->recompenza;
        $this->fecha_planteamiento = $this->tableProject->fecha_planteamiento;
        $this->fecha_finalizacion = $this->tableProject->fecha_finalizacion;
    }

    public function saveProject(){
        dd($this->submit($this->tableProject->id));
    }
}
