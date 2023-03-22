<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Etapa;
use App\Models\Proyecto;
use Livewire\Component;

class Table extends Component
{   
//ordenamiento de columnas
    public $sortColumn = 'id';
    public $sortOrder;

//modal de pendiente a realizar
    public $elementId;
    public $modalArease = false;
    public $newRow = false;

//campos de formulario
    public $projectId;
    public $tableEtapas;
    public $eDescription;
    public $eEstado ;
    public $ePendiente = [];
    public $eCorte = [];
    public $ePlanteam = [];
    public $efinalizacion = [];
//listeners
    public $listeners = ['saveEtapa','deleteEtapa','seeNew'];

//select multiples 
    // public $procesos = [
    //     'Nuevo',
    //     'Mejora',
    //     'Mantenimiento',
    //     'Reparacion',
    //     'Reemplazo',
    //     'Gobierno',
    //     'Indicadores',
    //     'Eliminar',
    //     '$ Cobros',   
    // ];

    public $procesos = [
        "Planteamiento",
        "Especificaciones",
        "Diseño",
        "Planeacion",
        "Cotizacion",
        "Presupuesto",
        "Compra",
        "Ejecucion",
        "Construccion",
        "Instalacion",
        "Entregado",
        "Seguimiento",
        "Revision",
        "Aplazado",
    ];

    public $rows = [
        'estado' => 'Procesos',
        'descripcion' => 'Descripción de la Tarea',
        'pendiente' => 'Pendiente por realizar',
        'fecha_corte' => 'Fecha corte',
        'fecha_planteamiento' => 'Fecha planteamiento',
        'fecha_finalizacion' => 'Fecha finalizacion',
        'delete' => 'Eliminar'
    ];

    public function render()
    {   
        $etapasTable = Etapa::orderBy($this->sortColumn, $this->sortOrder ?? 'asc')->where('proyecto_id',$this->projectId);
        $etapasTable = $etapasTable->get();    
        return view('livewire.proyectos.table',compact('etapasTable'));
    } 
    public function mount(){
        //$this->tableEtapas = Etapa::where('proyecto_id',$this->projectId)->get();
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
            $this->eEstado[$te->id] = $te->estado;
            $this->eDescription[$te->id] = $te->descripcion;
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
                'proyecto_id' => $this->projectId,
                'descripcion' => $this->eDescription[$id],
                'estado' => $this->eEstado[$id],
                'pendiente' => $this->ePendiente[$id],
                'fecha_corte' => (count($this->eCorte) === 0 || $this->eCorte[$id] === '' ) ? null: $this->eCorte[$id],
                'fecha_planteamiento' => (count($this->ePlanteam) === 0 || $this->ePlanteam[$id] === '' ) ? null :$this->ePlanteam[$id],
                'fecha_finalizacion' => (count($this->efinalizacion) === 0 || $this->efinalizacion[$id] === '' ) ? null :$this->efinalizacion[$id],
            ]); 
        }
        $this->emit('success','Guardado con exito','update');
        $this->refresh(); 
    }

    public function deleteEtapa(Etapa $etapa){
        $etapa->delete();
        $this->unsetEtapa($etapa->id);
        $this->refresh();
        $this->emit('success','Eliminado con exito','delete');
    }   


    public function modalArea($id = 0){
        
        $this->elementId = $id;
        $this->modalArease = true;
    }

    public function unsetEtapa($id = 0){
        unset($this->eDescription[$id]);
        unset($this->eEstado[$id]);

        //dd($this->eDescription);
    }

    public function seeNew($state = true){
        if($state === true){
            ($this->newRow === false) ? $this->newRow = true : $this->newRow = false ;
        }else{
            $this->newRow = false;
        }
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortOrder =  $this->sortOrder == 'desc' ? 'asc' : 'desc';
    }
}      


