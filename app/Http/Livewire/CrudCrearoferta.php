<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Trabajo;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudCrearoferta extends Component
{
    public $isOpen=false;
    public $search;
    public $creartrabajo;
    protected $listeners=['render','delete'=>'delete'];

    protected $rules=[
        'fecha_publication' =>'required',
        'categoria' =>'required',
        'description' =>'required',
        'salario' =>'required',
        'fecha_inicio' =>'required',
        'fecha_fin' =>'required',
        'requiere_experiencia' =>'required',
        'modalidad_tiempo' =>'required',
        'beneficios' =>'required',
        'datos_contacto' =>'required',
        'titulo' =>'required',
        'antecedentes' =>'required',
        'estado' =>'required',
        'Empresa_id'=>'required',
    ];

    public function messages(){
        return [
            'creartrabajo.fecha_publication' =>'Bien hecho',
            'creartrabajo.categoria' =>'Bien hecho',
            'creartrabajo.description' =>'Bien hecho',
            'creartrabajo.salario' =>'Bien hecho',
            'creartrabajo.fecha_inicio' =>'Bien hecho',
            'creartrabajo.fecha_fin' =>'Bien hecho',
            'creartrabajo.requiere_experiencia' =>'Bien hecho',
            'creartrabajo.modalidad_tiempo' =>'Bien hecho',
            'creartrabajo.beneficios' =>'Bien hecho',
            'creartrabajo.datos_contacto' =>'Bien hecho',
            'creartrabajo.titulo' =>'Bien hecho',
            'creartrabajo.antecedentes' =>'Bien hecho',
            'creartrabajo.estado' =>'Bien hecho',
            'creartrabajo.Empresa_id'=>'Bien hecho',
        ];
    }
    public function render(){
        $creartrabajos=Trabajo::where('fecha_publication','LIKE','%'.$this->search.'%')->latest('id')->paginate(6);
        return view('livewire.crud-crearoferta',compact('creartrabajos'));
    }

    public function create(){
        $this->isOpen=true;
    }

    public function store(){
        $this->validate();
        // //dd($this->creartrabajo);
         if(!isset($this->creartrabajo['id'])){
         Trabajo::create($this->creartrabajo);
         }else{
            $creartrabajo=Trabajo::find($this->creartrabajo['id']);
            $creartrabajo->fecha_publication=$this->creartrabajo['fecha_publication'];
            $creartrabajo->categoria=$this->creartrabajo['categoria'];
            $creartrabajo->description=$this->creartrabajo['description'];
            $creartrabajo->salario=$this->creartrabajo['salario'];
            $creartrabajo->fecha_inicio=$this->creartrabajo['fecha_inicio'];
            $creartrabajo->fecha_fin=$this->creartrabajo['fecha_fin'];
            $creartrabajo->requiere_experiencia=$this->creartrabajo['requiere_experiencia'];
            $creartrabajo->modalidad_tiempo=$this->creartrabajo['modalidad_tiempo'];
            $creartrabajo->beneficios=$this->creartrabajo['beneficios'];
            $creartrabajo->datos_contacto=$this->creartrabajo['datos_contacto'];
            $creartrabajo->titulo=$this->creartrabajo['titulo'];
            $creartrabajo->antecedentes=$this->creartrabajo['antecedentes'];
            $creartrabajo->estado=$this->creartrabajo['estado'];
            $creartrabajo->Empresa_id=$this->creartrabajo['Empresa_id'];
            $creartrabajo->save();
        }
         $this->reset(['isOpen','creartrabajo']);
         $this->emitTo('CrudCreartrabajo','render');
        $this->emit('alert','Registro creado satisfactoriamente');

    }

    public function edit($creartrabajo){
        //dd($creartrabajo);
        $this->creartrabajo=$creartrabajo;
        $this->isOpen=true;
    }

    public function delete($id){
        Trabajo::find($id)->delete();
    }

    public function updatedCreartrabajoName(){
       $this->creartrabajo['slug']=Str::slug($this->creartrabajo['name']);
    }
}
