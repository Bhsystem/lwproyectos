<?php

namespace App\Http\Livewire\Proyectos\Etapas;

use App\Http\Livewire\Proyectos\Show;
use App\Models\Etapa;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Livewire\Component;



class Save extends Component
{   
    //campos
    public $projectId; 
    public $etapaId;
    public $trabajo;
    public $descripcion = 1;
    public $pendiente;
    public $fecha_corte;
    public $fecha_planteamiento;
    public $fecha_finalizacion;


    //listeners
    protected $listeners = ['project'];

    protected $rules = [
        'descripcion' => 'required'  
    ];

    function mount($etapa){
        $this->descripcion = $etapa->descripcion;
        $this->etapaId = $etapa->id;
    }

    public function submit($id = Null)
    {   
        $validated = $this->validate();
        //dd($validated);
        Etapa::updateOrCreate(['id'=>$id],$validated);
    }

    public function render(){
         return view('livewire.proyectos.etapas.save');
    }
}