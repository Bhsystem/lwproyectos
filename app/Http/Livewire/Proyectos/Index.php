<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Compartido;
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
        'search',
        'status',
    ];

    public $columns = [
        'proyecto' => 'Proyecto',
        'persona_id' => 'Responsable',
        'trabajo' => 'Trabajo',
        'prioridad' => 'Prioridad',
        'id' => 'Fecha de Corte',
        'fecha_planteamiento' => 'Fecha Planteamiento',
        'estado' => 'Estado',
    ];

    //listeners
    protected $listeners = ['refreshComponent' => '$refresh', 'filters'];

    //functions
    public function render()
    {   
        $proyectos = Proyecto::orderBy($this->sortColumn, $this->sortOrder ?? 'ASC');
        $proyectos =  $this->searchStatus($proyectos);
        
        $shares = Compartido::where('usuario_id',\Auth::user()->id)->pluck('proyecto_id')->all();
        
        if(Auth()->user()->id != 5){
            $proyectos = $proyectos->where('persona_id',auth()->user()->id)->orwhereIn('id',$shares);    
        }
        
        if($this->search){
            $proyectos =  $this->searchFilter($proyectos);
        }        
        
        if($this->status){
            $proyectos =  $this->searchStatus($proyectos);
        }

        if($this->manager){
            $proyectos->where('persona_id',$this->manager);

        }
        


        $proyectos = $proyectos->get();
        //$proyectos = $proyectos->toSql();
        // dd($proyectos);
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
        ($this->status == 'Todos') ? $table = $table : $table = $table->where('estado',$this->status);
        return $table;
    }

    public function sort($column)
    {
        $this->sortColumn = $column;
        $this->sortOrder =  $this->sortOrder == 'desc' ? 'asc' : 'desc';
    }
}
    