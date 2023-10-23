<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Compartido;
use App\Models\Proyecto;
use Livewire\Component;

class ContextualMenu extends Component
{
    public $link;
    public $tableProject;
    public $sharedProject;
    public $managers;
    public $modalShare = false;
    
    //campos
    public $usuario_id;
    

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

    public function delayProject()
    {
        $table = Proyecto::find($this->tableProject)->update(['estado'=>'Aplazado']);
        $this->emit('refreshComponent');
    }

    public function shareProject()
    {
        
        $this->sharedProject = $this->shared();
        $this->modalShare = true;

    }

    public function submitShared($id)
    {
        $shared = Compartido::where('usuario_id',$this->usuario_id)->where('proyecto_id',$id)->get();
        if(count($shared) > 0){
            $message = 'Ya se ha compartido este Proyeto';
        }else{

            Compartido::create([
                'proyecto_id' => $id,
                'usuario_id' => $this->usuario_id,
                'fecha_compartido' => date('Y-m-d')
            ]);

            $message = 'Proyecto Compartido con exito!';
            $this->emit('refreshComponent');
        } 

        $this->modalShare = false;
        session()->flash('message',$message);
    }

    public function shared(){
        return Compartido::where('proyecto_id', $this->tableProject)->get();

    }
}
