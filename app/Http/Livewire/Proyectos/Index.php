<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{   
    //tables
    public $tableProyectos;

    //$ordenamiento
    public $sortColumn = 'fecha_planteamiento';
    public $sortOrder;
    public $search;  
    public $status = 'Activo';
    public $manager;

    protected $queryString = [
        'manager' => ['except' => ''],
    ];

    public $columns = [
        'proyecto' => 'Proyecto',
        'persona_id' => 'Responsable',
        'centro_costo' => 'Centro de Costo',
        'trabajo' => 'Trabajo',
        'prioridad' => 'Prioridad',
        'id' => 'Fecha de Corte',
        'fecha_planteamiento' => 'Fecha Planteamiento',
        'recompensa' => 'Esfuerzo',
        'bono' => 'Magnitud',
        'estado' => 'Estado',
    ];

    //listeners
    protected $listeners = ['refreshComponent' => '$refresh', ''];

    //functions
    public function render()
    {   
        
        $proyectos = Proyecto::orderBy($this->sortColumn, $this->sortOrder ?? 'ASC');

        if($this->search){
            $proyectos =  $this->searchFilter($proyectos);
        }
        if($this->status){
            $proyectos =  $this->searchStatus($proyectos);
        }
        if($this->manager){
            $proyectos->where('persona_id',$this->manager);

        }
        if(Auth()->user()->id != 1){
            $proyectos->where('persona_id',auth()->user()->id);
        }
            
        $proyectos = $proyectos->get();

        return view('livewire.proyectos.index', compact('proyectos'));
    }


    public function getManagersProperty()
    {
        return User::select('id','name')->orderBy('name')->get();
    }

    public function viewProject($id)
    {
        $this->redirect(route('proyectos.show',$id));
    }


    public function searchFilter($table)
    {
        return $table->where(function($query){
            $query->Where('proyecto','LIKE',"%$this->search%")
            ->orWhere('centro_costo','LIKE',"%$this->search%")
            ->orWhere('prioridad','LIKE',"%$this->search%")
            ->orWhere('trabajo','LIKE',"%$this->search%")
            ->orWhere('escala','LIKE',"%$this->search%");
        });
    }    
    
    public function searchStatus($table)
    {
        return $table->where('estado',$this->status);
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortOrder =  $this->sortOrder == 'desc' ? 'asc' : 'desc';
    }
}
    