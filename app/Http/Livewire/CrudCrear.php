<?php

namespace App\Http\Livewire;

use App\Models\Graduate;
use App\Models\Crear;
use App\Models\Empresa;
use App\Models\Trabajo;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudCrear extends Component{

    public $isOpen=false;
    public $search;
    public $crear;

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
        'crear.empresa_id'=>'required',
    ];

    public function render(){
        $crears=Trabajo::where('fecha_publication','LIKE','%'.$this->search.'%')->latest('id')->paginate(6);
        //$graduates = Graduate::all();
        $empresas = Empresa::all();
        return view('livewire.crud-crear',compact('crears', 'empresas'));
    }

    public function create(){
        $this->isOpen=true;
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
            $crear->empresa_id=$this->crear['empresa_id'];
            $crear->save();
        }
        $this->reset(['isOpen','crear']);
        $this->emitTo('CrudCrear','render');
        $this->emit('alert','Registro creado satisfactoriamente');
    }

    public function edit($crear){
        //dd($crear);
        $this->crear=$crear;
        $this->isOpen=true;
    }

    public function delete($id){
        Trabajo::find($id)->delete();
    }
}
