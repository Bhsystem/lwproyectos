<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Compartido;
use App\Models\Etapa;
use App\Models\Proyecto;
use Livewire\Component;
use Url;

class Show extends Component
{

    public $tableProyecto;
    public $message;
    public $status;

    public $listeners = ['success'];

    public function render()
    {   

        return view('livewire.proyectos.show');
    }

    public function mount($id)
    {
        $this->setCompartidos($id);
        $this->tableProyecto = Proyecto::findorFail($id);
    }

    public function newEtapa()
    {   
         $hola = $this->emit('seeNew');
    }

    public function saveEtapa()
    {
        $this->emit('saveProject',$this->tableProyecto->id);
        $this->emit('saveEtapa');
        $this->emit('seeNew',false); 
    }
 
    public function success($sms,$status)
    {
        
        $this->message = $sms ; 
        $this->status = $status ;
        $this->emit('successAlert'); 
    }

    public function backTo()
    {
        $this->emit('saveEtapa'); 
        $this->emit('saveProject',$this->tableProyecto->id);
       
    }

        public function setCompartidos($id){
        $this->compartidos = Compartido::where('proyecto_id',$id)->pluck('usuario_id');
        
    }

}

