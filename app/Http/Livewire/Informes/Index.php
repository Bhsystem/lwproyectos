<?php

namespace App\Http\Livewire\Informes;

use Livewire\Component;
use App\Models\Proyecto;

class Index extends Component
{
    public $proyectoPendiente;
    public $proyectoFinalizado;
    public $proyectoAplazado;


    public function render()
    {
        $this->tableProyectos = Proyecto::orderBy('persona_id','asc')->orderBy('prioridad','asc')->get();
        $this->getProyectos();
        return view('livewire.informes.index');
    }

    public function getProyectos() {
        $this->proyectoPendiente = $this->tableProyectos->where('estado','Activo');
        $this->proyectoFinalizado = $this->tableProyectos->where('estado','Finalizado');
        $this->proyectoAplazado = $this->tableProyectos->where('estado','Aplazado');
    }
}
