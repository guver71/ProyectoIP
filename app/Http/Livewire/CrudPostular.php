<?php

namespace App\Http\Livewire;

use App\Models\Egresado;
use App\Models\Postulacion;
use App\Models\product;
use App\Models\Trabajo;
use Livewire\Component;
use Illuminate\Support\Str;

class CrudPostular extends Component{

    public $isOpen=false;
    public $search;
    public $postular;


    protected $rules=[

            'postular.ruta_cv' =>'required',
            'postular.puntaje' =>'required',
            'postular.estado' =>'required',
            'postular.egresado_id'=>'required',
            'postular.trabajo_id'=>'required',
    ];

    public function render(){
        $postulars=Postulacion::where('ruta_cv','like','%'.$this->search.'%')->paginate();

        $egresados = Egresado::all();
        $trabajos = Trabajo::all();
        return view('livewire.crud-postular',compact('postulars', 'egresados', 'trabajos'));
    }

    public function create(){
        $this->isOpen=true;
    }

    public function store(){
        $this->validate();
        //dd($this->product);

        if(!isset($this->postular['id'])){
            Postulacion::create($this->postular);
        }else{
            $postular=Postulacion::find($this->postular['id']);
            $postular->naruta_cvme=$this->postular['ruta_cv'];
            $postular->puntaje=$this->postular['puntaje'];
            $postular->estado=$this->postular['estado'];
            $postular->egresado_id=$this->postular['egresado_id'];
            $postular->trabajo_id=$this->postular['trabajo_id'];
            $postular->save();
        }
        $this->reset(['isOpen','postular']);
        $this->emitTo('CrudPostular','render');
        $this->emit('alert','Registro creado satisfactoriamente');

    }

    public function edit($postular){
        //dd($postular);
        $this->postular=$postular;
        $this->isOpen=true;
    }

    public function delete($id){
        Postulacion::find($id)->delete();
    }
}

