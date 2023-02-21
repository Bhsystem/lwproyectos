<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Etapa;
use App\Models\Proyecto;
use Livewire\Component;

class Show extends Component
{

    public $tableProyecto;
    public $tableEtapas;
    public $mesage;

    public $listeners = ['success'];

    public function render()
    {
        return view('livewire.proyectos.show');
    }

    public function mount($id){
        $this->tableProyecto = Proyecto::findorFail($id);
        $this->tableEtapas = Etapa::where('proyecto_id',$id)->get();
    }

    public function newEtapa()
    {

    }
    public function saveEtapa(){
        $this->emit('saveProject');
        $this->emit('saveEtapa');
    }

    public function success($sms){
        $this->mesage = $sms ;
    }

}

