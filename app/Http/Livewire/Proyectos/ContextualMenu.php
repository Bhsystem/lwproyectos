<?php

namespace App\Http\Livewire\Proyectos;

use Livewire\Component;

class ContextualMenu extends Component
{
    public $link;
    public $projectId;
    public $tableProject;
    
    public $listeners  = ['getTable'];

    public function render()
    {
        return view('livewire.proyectos.contextual-menu');
    }

    public function getTable($tableProject){
        
        $this->tableProject = $tableProject;
        $this->link = route('proyectos.show',$tableProject['id']);

    }
}
