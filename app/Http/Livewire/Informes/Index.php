<?php

namespace App\Http\Livewire\Informes;

use App\Models\Proyecto;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $proyectoPendiente;
    public $proyectoFinalizado;
    public $proyectoAplazado;




    public function render()
    {
        $this->tableUsuarios = User::get();  
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
