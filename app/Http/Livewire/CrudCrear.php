<?php

namespace App\Http\Livewire;

use App\Models\Graduate;
use App\Models\Crear;
use App\Models\Trabajo;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudCrear extends Component{

    public $isOpen=false;
    public $ruteCreate=false;

    public $search,$crear;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'crear.fecha_publication' =>'required',
        'crear.categoria' =>'required',
        'crear.description' =>'required',
        'crear.salario' =>'required',
        'crear.fecha_inicio' =>'required',
        'crear.fecha_fin' =>'required',
        'crear.requiere_experiencia' =>'required',
        'crear.modalidad_tiempo' =>'required',
        'crear.beneficios' =>'required',
        'crear.datos_contacto' =>'required',
        'crear.titulo' =>'required',
        'crear.antecedentes' =>'required',
        'crear.estado' =>'required',
        'crear.Empresa_id'=>'required',


    ];

    public function render(){
        $crears=Trabajo::where('fecha_publication','LIKE','%'.$this->search.'%')->latest('id')->paginate(6);
        //$graduates = Graduate::all();
        return view('livewire.crud-crear',compact('crears'));
    }

    public function create(){
        $this->isOpen=true;
        $this->ruteCreate=true;
        $this->reset('crear');
    }

    public function store(){
        $this->validate();
        if(!isset($this->crear['id'])){
            Trabajo::create($this->crear);
        }else{
            $crear=Trabajo::find($this->crear['id']);
            $crear->fecha_publication=$this->crear['fecha_publication'];
            $crear->categoria=$this->crear['categoria'];
            $crear->description=$this->crear['description'];
            $crear->salario=$this->crear['salario'];
            $crear->fecha_inicio=$this->crear['fecha_inicio'];
            $crear->fecha_fin=$this->crear['fecha_fin'];
            $crear->requiere_experiencia=$this->crear['requiere_experiencia'];
            $crear->modalidad_tiempo=$this->crear['modalidad_tiempo'];
            $crear->beneficios=$this->crear['beneficios'];
            $crear->datos_contacto=$this->crear['datos_contacto'];
            $crear->titulo=$this->crear['titulo'];
            $crear->antecedentes=$this->crear['antecedentes'];
            $crear->estado=$this->crear['estado'];
            $crear->Empresa_id=$this->crear['Empresa_id'];
            $crear->save();
        }
        $this->reset(['isOpen','crear']);
        $this->emitTo('CrudCrear','render');
    }

    public function delete(Trabajo $item){
        $item->delete();
    }

    public function edit($crear){
        $this->crear=$crear;
        //dd($this->crear);
        $this->isOpen=true;
    }

}
