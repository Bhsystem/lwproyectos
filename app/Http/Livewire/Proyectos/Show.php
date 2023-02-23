<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Etapa;
use App\Models\Proyecto;
use Livewire\Component;

class Show extends Component
{

    public $tableProyecto;
    public $mesage;
    public $buttonNew  = 'Agregar';

    public $listeners = ['success'];

    public function render()
    {
        return view('livewire.proyectos.show');
    }

    public function mount($id){
        $this->tableProyecto = Proyecto::findorFail($id);
    }

    public function newEtapa()
    {
        $this->emit('seeNew');

        ($this->buttonNew == 'Agregar') ? $this->buttonNew = 'Cancelar': $this->buttonNew = 'Agregar';
    }
    public function saveEtapa(){
        $this->emit('saveProject',$this->tableProyecto->id);
        $this->emit('saveEtapa');
        $this->emit('seeNew',false); 
    }
 
    public function success($sms){
        $this->mesage = $sms ; 
    }

    public function backTo(){
        $this->emit('saveProject',$this->tableProyecto->id);
        $this->emit('saveEtapa'); 

        $this->redirect(route('proyectos.index'));
    }

}

