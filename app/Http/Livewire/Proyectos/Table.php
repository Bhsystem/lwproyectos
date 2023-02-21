<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Etapa;
use App\Models\Proyecto;
use Livewire\Component;

class Table extends Component
{   



    public $textArea;
    public $elementId = 0;
    public $modalArease = false;

    public $projectId;
    public $tableProyecto;
    public $tableEtapas;
    public $eDescription;
    public $eEstado ;
    public $ePendiente = [];
    public $eCorte = [];
    public $ePlanteam = [];
    public $efinalizacion = [];

    public $listeners = ['saveEtapa','deleteEtapa'];

    public $procesos = [
        'Nuevo',
        'Mejora',
        'Mantenimiento',
        'Reparacion',
        'Reemplazo',
        'Gobierno',
        'Indicadores',
        'Eliminar',
        '$ Cobros',   
    ];



    public $rows = [
        'Procesos',
        'Descripción de la Tarea',
        'Pendiente por realizar',
        'Fecha corte',
        'Fecha planteamiento',
        'Fecha finalizacion',
        'Eliminar'
    ];

    public function render()
    {   
    
        $this->tableProyecto = Proyecto::findorFail($this->projectId);
        return view('livewire.proyectos.table');
    } 
    public function mount(){
        $this->tableEtapas = Etapa::where('proyecto_id',$this->projectId)->get();
        $this->refresh();
        $this->ePendiente[0] = '';  
    }

    public function resetCero(){
         ($this->eDescription[0] = '');
         ($this->eEstado[0] = '');
         ($this->ePendiente[0] = '');
         ($this->eCorte[0] = '');
         ($this->ePlanteam[0] = date('Y-m-d'));
         ($this->efinalizacion[0] = '');
    }

    public function refresh(){

        $this->tableEtapas = Etapa::where('proyecto_id',$this->projectId)->get();
        foreach($this->tableEtapas as $te){
            $this->eDescription[$te->id] = $te->descripcion;
            $this->eEstado[$te->id] = $te->estado;
            $this->ePendiente[$te->id] = $te->pendiente;
            $this->eCorte[$te->id] = $te->fecha_corte;
            $this->ePlanteam[$te->id] = $te->fecha_planteamiento;
            $this->efinalizacion[$te->id] = $te->fecha_finalizacion;
        } 

        $this->resetCero(); 
    }

    public function saveEtapa(){
        
        if( $this->eDescription[0] == '' && $this->eEstado[0] == '' ){//solamente va a guardar si la columna 0 no esta vacia
            $this->unsetEtapa();
        }
        
        foreach($this->eDescription as $id => $data){
            Etapa::updateOrCreate(['id' => $id], [
                'proyecto_id' => $this->tableProyecto->id,
                'descripcion' => $this->eDescription[$id],
                'estado' => $this->eEstado[$id],
                'pendiente' => $this->ePendiente[$id],
                'fecha_corte' => (count($this->eCorte) === 0 || $this->eCorte[$id] === '' ) ? null: $this->eCorte[$id],
                'fecha_planteamiento' => (count($this->ePlanteam) === 0 || $this->ePlanteam[$id] === '' ) ? null :$this->ePlanteam[$id],
                'fecha_finalizacion' => (count($this->efinalizacion) === 0 || $this->efinalizacion[$id] === '' ) ? null :$this->efinalizacion[$id],
            ]); 
        }
        $this->emit('success','Guardado con exito');
        $this->refresh(); 
    }

    public function deleteEtapa(Etapa $etapa){
        $etapa->delete();
        $this->unsetEtapa($etapa->id);
        $this->refresh();
        $this->emit('success','Eliminado con exito');
    }   


    public function modalArea($id){
        
        $this->elementId = $id;
        $this->modalArease = true;
    }

    public function unsetEtapa($id = 0){
        unset($this->eDescription[$id]);
        unset($this->eEstado[$id]);

        //dd($this->eDescription);
    }
}      


