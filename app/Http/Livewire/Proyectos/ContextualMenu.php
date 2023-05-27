<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use Livewire\Component;

class ContextualMenu extends Component
{
    public $link;
    public $tableProject;
    
    public $listeners  = ['getTable','deleteProject'];

    public function render()
    {
        return view('livewire.proyectos.contextual-menu');
    }

    public function getTable($tableProject)
    {
        $this->tableProject = $tableProject;
        $this->link = route('proyectos.show',$tableProject);
    }

    public function deleteProject()
    {   
        Proyecto::find($this->tableProject)->delete();
        $this->emit('refreshComponent');
        
    }

    public function delayProject(){
        $table = Proyecto::find($this->tableProject)->update(['estado'=>'Aplazado']);
        $this->emit('refreshComponent');
    }
}
